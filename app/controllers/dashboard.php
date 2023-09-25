<?php

use app\core\Controller;
use app\models\Auth;

class Dashboard extends Controller
{
    protected $userM;
    protected $companyM;
    protected $packagesM;
    protected $fetch;
    protected $orderM;
    protected $paymentM;
    protected $driverM;

    public function __construct()
    {
        $this->userM = $this->load_model('user');
        $this->companyM = $this->load_model('company');
        $this->packagesM = $this->load_model('package');
        $this->orderM = $this->load_model('orders');
        $this->paymentM = $this->load_model('payment');
        $this->driverM = $this->load_model('driver');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }
    
    public function index()
    {
        // give access to user
        $user = Auth::logged_in();
        if(!$user) $this->redirect('login'); 

        // get user
        $USER = $this->userM->get_user($user->userID);

        // check if drivr status is not disabled
        $USER = $this->userM->get_user($user->userID);
        if($USER->status == DRIVE_DISABLED) {
            $this->redirect('logout');
        }

        $deliverys = 0;
        $earnings = 0;
        $activeOrds = 0;
        $lateOrders = 0;

        // for admin
        if($user->role == ADMIN) {
            $orders = $this->orderM->get_orders_by_company_id($user->companyID);
            $drivers = $this->driverM->get_all_drivers_by_company_id($user->companyID);
            
            // loop through to get specific datas
            foreach($orders as $ord) {
                // get order payment
                $earning = $this->paymentM->get_payment($ord->orderID)[0]; 
                $earnings = $earnings + $earning->paymentAmount;
                
                // check form completed deliveries
                if($ord->order_status == ORDER_DELIVERED) {
                    $deliverys = $deliverys + 1;
                }

                // late orders
                $currentDate = strtotime(date('Y-m-d'));
                $deliveryDate = strtotime($ord->deliveryDate);
                
                // get active orders
                if($ord->order_status != ORDER_CANCELLED && $ord->order_status != ORDER_DISABLED && $ord->order_status != FAILED_ORDER && $ord->order_status != ORDER_DELIVERED) {
                    // vary time
                    if($currentDate < $deliveryDate) {
                        $lateOrders = $lateOrders + 1;
                    }
                    
                    $activeOrds = $activeOrds + 1;
                }
            }

            // get all drivers who has orders yet to deliver
            $driversWithPackage = [];
            foreach($drivers as $drive) {
                $currentOrderDrive = $this->driverM->getDriveActiveOrd($drive->driverName);
                $currentOrders = $this->driverM->get_current_orders($drive->driverName, $user->companyID);
    
                if(!empty($currentOrderDrive)) {
                    array_push($driversWithPackage, (object) ['driverName' => $currentOrderDrive[0]->fullName, 'orders' => $currentOrders]);
                }
            } //show($driversWithPackage); die;
            

            // get 
            $data['totalOrders'] = count($orders) + 1;
            $data['earnings'] = number_format($earnings);
            $data['drivers'] = count($drivers);
            $data['activeOrders'] = $activeOrds;
            $data['lateOrders'] = $lateOrders;
            $data['driverPackage'] = $driversWithPackage;

          // show($data); die;
        }

          // for admin
        if($user->role == DRIVER) {
            $deliverys = count($this->orderM->get_drive_company($user->userID, $user->companyID, ORDER_DELIVERED));
        }

        // for super admin
        if($user->role == SUPER_ADMIN) {

        }

       // show($user); die;
        $data['page_title'] = 'Dashboard';

        $data['role'] = $user->role;
        $data['userName'] = $user->fullName;
        $data['userID'] = $user->userID;
        $data['deliverys'] = $deliverys;
        $data['status'] = $USER->status;

       // show($data); die;
        $this->view("dashboard", $data);
    }

    public function change_status() {
      //  show($this->fetch); die;
        if(!isObjectEmpty($this->fetch)) {
            // check status
            if($this->fetch->status == 'offline') {
                $updateStatus = $this->userM->update_status($this->fetch->userID, OFFLINE);

              //  show($updateStatus);
                if($updateStatus) {
                    $data['message'] = 'Status updated successflly';
                    $data['status'] = 'success';
                    $data['image'] = IMAGES;
                    $data['uri'] = ROOT;

                    echo json_encode($data);
                    return;
                }

                $data['message'] = 'Unable to update status';
                $data['status'] = 'failed';

                echo json_encode($data);
            }

            if($this->fetch->status == 'online') {
                $updateStatus = $this->userM->update_status($this->fetch->userID, ONDUTY);
                //show($updateStatus);
                if($updateStatus) {
                    $data['message'] = 'Status updated successflly';
                    $data['status'] = 'success';
                    $data['image'] = IMAGES;
                    $data['uri'] = ROOT;

                    echo json_encode($data);
                    return;
                }

                $data['message'] = 'Unable to update status';
                $data['status'] = 'failed';

                echo json_encode($data);
            }
        }
    }
}