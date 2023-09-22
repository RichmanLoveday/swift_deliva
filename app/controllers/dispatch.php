<?php

use app\core\Controller;
use app\models\Auth;
class Dispatch extends Controller
{

    protected $driverM;
    protected $usersM;
    protected $packageM;
    protected $fetch;
    protected $orderM;
    protected $paymentM;
    public function __construct()
    {
        $this->driverM = $this->load_model('driver');
        $this->usersM = $this->load_model('user');
        $this->packageM = $this->load_model('package');
        $this->orderM = $this->load_model('orders');
        $this->paymentM = $this->load_model('payment');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }

    public function index()
    {
        $data['page_title'] = 'Manage Dispatch';

        // give access to user
        if (!Auth::access('driver')) $this->redirect('dashboard');
        $user = Auth::logged_in();

        // if ajax request is empty
        if (!isObjectEmpty($this->fetch)) {
           // show($this->fetch); 
            $currOrders = $this->driverM->get_current_orders($this->fetch->userID, $this->fetch->companyID);
       
            foreach($currOrders as $order) {
                $order->packageItems = json_decode($order->packageItems);
                $this->statusChecker($order);
            }

            $data['status'] = 'success';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;
            $data['orders'] = $currOrders;
            $data['userID'] = $user->userID;


            echo json_encode($data);

            return;
        }

        $currOrders = $this->driverM->get_current_orders($user->userID, $user->companyID);

        foreach ($currOrders as $order) {
            $order->packageItems = json_decode($order->packageItems);
            $this->statusChecker($order);
            $amount = 0;
            foreach($order->packageItems as $item) {
                $amount = $amount + $item->Price;
            }
            $order->amount = $amount;
        }

        // get all drivers in specific company
        $data['companyID'] = $user->companyID;
        $data['userID'] = $user->userID;
        $data['orders'] = $currOrders;

        // show($data);
        // die;

        $this->view("dispatch", $data);
    }

    public function waiting_orders() {
        if (!Auth::access('driver')) $this->redirect('dashboard');
        $user = Auth::logged_in(); 
        
        $waiting_orders = $this->driverM->get_waiting_orders($this->fetch->companyID, $this->fetch->userID);
        

        if(is_array($waiting_orders)) {

            $data['status'] = 'success';
            $data['orders'] = $waiting_orders;
            $data['uri'] = ROOT;
            $data['userID'] = $user->userID;
            $data['images'] = IMAGES;

        } else {

            $data['status'] = 'failed';
            $data['message'] = 'An error occured, unable to get data';
            $data['uri'] = ROOT;
            $data['images'] = IMAGES;

        }

        echo json_encode($data);
    }

    public function view_order() {
        //show($this->fetch); die;
        //show($this->fetch); die;
        if (!isObjectEmpty($this->fetch)) {
            $order = $this->driverM->get_orders_by_id($this->fetch->orderID, $this->fetch->userID);
            if ($order) {
               
                // check status 
                $this->statusChecker($order);

                // create current date format
                $DateTimeArr = explode(' ', $order->date);
                $DateArr = explode('-', $DateTimeArr[0]);
                $TimeArr = explode(':', $DateTimeArr[1]);
                $order->placement_date = date("F j Y, h:i A", mktime($TimeArr[0], $TimeArr[1], $TimeArr[2], $DateArr[1], $DateArr[2], $DateArr[0]));
                $order->packageItems = json_decode($order->packageItems);
                
                $data['orders'] = $order;
                $data['status'] = 'success';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function accept_order() {
        $updateTrackingID = $this->packageM->package_tracker_update($this->fetch->packageID, APPROVED_PACKAGE);     // update package tracking id
        $read_tracker = $this->packageM->read_tracker($this->fetch->packageID, START); // check if tracking already has value, if not add to it
        $update_order = $this->driverM->update_order($this->fetch->driverID, $this->fetch->orderID, STARTING);           // update package status
        
        // echo $read_tracker;
        if (!$read_tracker) {
            $tracker = $this->packageM->update_tracking($updateTrackingID->trackingID, $this->fetch->packageID, START);
        }


        if($update_order && $updateTrackingID) {
            $data['status'] = 'success';
            $data['message'] = 'Order accepted successfully';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;

            echo json_encode($data);
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'An error occured';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;

            echo json_encode($data);
        }
        
        
        // return a json response
    }


    public function reject_order()
    {
        // update orders status
        $update_order = $this->driverM->update_order($this->fetch->driverID, $this->fetch->orderID, UNASSIGNED, NULL);
        $update_package = $this->packageM->cancel_package($this->fetch->packageID, PENDING_PACKAGE);  // update package status

        if ($update_order && $update_package) {
            $data['status'] = 'success';
            $data['message'] = 'Order rejected successfully';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;

            echo json_encode($data);
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'An error occured';
            $data['images'] = IMAGES;
            $data['uri'] = ROOT;

            echo json_encode($data);
        }


        // return a json response
    }

    private function statusChecker($order)
    {
        // fix statuses
        $order->orderStatus = '';
        if ($order->order_status == STARTING) {
            $order->orderStatus = 'picked up';
        }

        if ($order->order_status == PICKED_UP) {
            $order->orderStatus = 'on the way';
        }

        if ($order->order_status == ONWAY) {
            $order->orderStatus = 'done';
        }

        // if ($order->order_status == ORDER_DELIVERED) {
        //     $order->orderStatus = 'done';
        // }
    }


    public function update_status() {
        if(!isObjectEmpty($this->fetch)) {
          // show($this->fetch);die;
           if($this->fetch->method == 'update') {
                if ($this->fetch->type == 'pick up') {
                    // update orders status
                    $update_order = $this->driverM->update_order($this->fetch->userID, $this->fetch->orderID, PICKED_UP);
                    $trackingID = $this->packageM->get_package_by_id($this->fetch->packageID);
                    $read_tracker = $this->packageM->read_tracker($this->fetch->packageID, DRIVED_PICKED_UP);
                    //   echo $read_tracker;
                    if (!$read_tracker) {
                        $this->packageM->update_tracking($trackingID->trackingID, $this->fetch->packageID, DRIVED_PICKED_UP);
                    }

                    if ($update_order) {
                        $data['status'] = 'success';
                        $data['message'] = 'status changed successfully';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    } else {
                        $data['status'] = 'failed';
                        $data['message'] = 'unabled to update status';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    }
                }


                if ($this->fetch->type == 'on the way') {
                    // show($this->fetch); die;

                    // update orders status
                    $update_order = $this->driverM->update_order($this->fetch->userID, $this->fetch->orderID, ONWAY);
                    $trackingID = $this->packageM->get_package_by_id($this->fetch->packageID);
                    $read_tracker = $this->packageM->read_tracker($this->fetch->packageID, ONTHEWAY);
                    //   echo $read_tracker;
                    if (!$read_tracker) {
                        $this->packageM->update_tracking($trackingID->trackingID, $this->fetch->packageID, ONTHEWAY);
                    }

                    if ($update_order) {
                        $data['status'] = 'success';
                        $data['message'] = 'status changed successfully';
                        $data['payment_method'] = $this->driverM->get_orders_by_id($this->fetch->orderID, $this->fetch->userID)->payment_status;
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    } else {
                        $data['status'] = 'failed';
                        $data['message'] = 'unabled to update status';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    }
                }

                if ($this->fetch->type == 'done') {
                
                    // update orders status
                    $update_order = $this->driverM->update_order($this->fetch->userID, $this->fetch->orderID, ORDER_DELIVERED);
                    $trackingID = $this->packageM->get_package_by_id($this->fetch->packageID);
                    $update_package = $this->packageM->cancel_package($this->fetch->packageID, DELIEVRED_PACAKGES);
                    $read_tracker = $this->packageM->read_tracker($this->fetch->packageID, ITEMDELIVERED);

                    // store payment by driver
                    if($this->fetch->payment) {
                        $this->fetch->paymentMethod = 'Cash on delivery';
                        $this->store_payment($this->fetch);
                    }

                    //   echo $read_tracker;
                    if (!$read_tracker) {
                        $this->packageM->update_tracking($trackingID->trackingID, $this->fetch->packageID, ITEMDELIVERED);
                    } else {
                        $this->packageM->delete_tracking($read_tracker->trackingID, ITEMDELIVERED);
                    }

                    if ($update_order && $update_package) {
                        $data['status'] = 'success';
                        $data['message'] = 'Item delivered successfully';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    } else {
                        $data['status'] = 'failed';
                        $data['message'] = 'unabled to update status';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    }
                }
           }

            if ($this->fetch->method == 'roll_back') {
              // show($this->fetch); die;
                if ($this->fetch->type == 'pick up') {
                    // update orders status
                    $update_order = $this->driverM->update_order($this->fetch->userID, $this->fetch->orderID, STARTING);
                    $package = $this->packageM->get_package_by_id($this->fetch->packageID);
                    $remove_track = $this->packageM->delete_tracking($package->trackingID, DRIVED_PICKED_UP);
                   // show($package); die;
                    //   echo $read_tracker;
                    
                    if ($update_order && $package && $remove_track) {
                        $data['status'] = 'success';
                        $data['message'] = 'status changed successfully';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    } else {
                        $data['status'] = 'failed';
                        $data['message'] = 'unabled to update status';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    }
                }

                if ($this->fetch->type == 'on the way') {
                    // update orders status
                    $update_order = $this->driverM->update_order($this->fetch->userID, $this->fetch->orderID, PICKED_UP);
                    $package = $this->packageM->get_package_by_id($this->fetch->packageID);
                    $remove_track = $this->packageM->delete_tracking($package->trackingID, ONTHEWAY);
                    //   echo $read_tracker;


                    if ($update_order && $package && $remove_track) {
                        $data['status'] = 'success';
                        $data['message'] = 'status changed successfully';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    } else {
                        $data['status'] = 'failed';
                        $data['message'] = 'unabled to update status';
                        $data['images'] = IMAGES;
                        $data['uri'] = ROOT;

                        echo json_encode($data);
                    }
                }
            }
            
        }
    }

    public function completed_orders()
    {

        // give access to user
        if (!Auth::access('driver')) $this->redirect('dashboard');
        $user = Auth::logged_in();

        //show($this->fetch);
        $orders = $this->orderM->get_drive_company($this->fetch->userID, $this->fetch->companyID, ORDER_DELIVERED);
        
        foreach($orders as $ord) {
            $DateTimeArr = explode(' ', $ord->deliveryDate);
            $DateArr = explode('-', $DateTimeArr[0]);
            $TimeArr = explode(':', $DateTimeArr[1]);
            
            
            $pickupDate = explode('-', $ord->pickUpDate);
            $ord->deliveryDate = date("F j", mktime($TimeArr[0], $TimeArr[1], $TimeArr[2], $DateArr[1], $DateArr[0], $DateArr[2]));
            
            $ord->pickUpDate = date('F j', mktime(0, 0, 0, $pickupDate[1], $pickupDate[0], $pickupDate[2]));
            // $order->packageItems = json_decode($order->packageItems);
        }

        $data['status'] = 'success';
        $data['images'] = IMAGES;
        $data['orders'] = $orders;
        $data['userID'] = $user->userID;
        $data['uri'] = ROOT;

        //show($data); 
        echo json_encode($data);
       // show($orders); die;
    }

    public function store_payment($fetch): bool
    {
      $payment = $this->paymentM->store_payment($fetch, $fetch->orderID);
      return $payment;
        
    }

    public function product_amount() {
        $package = $this->packageM->get_package_by_id($this->fetch->packageID);
        $packageItem = json_decode($package->packageItems);
        // loop throught and make amount
        $amount = 0;
        foreach($packageItem as $item) {
            $amount = $amount + $item->Price;
        }
        $package->amount = number_format($amount, 2);
        //show($package);
        echo json_encode(['package' => $package, 'status' => 'success']);
    }
    
    
}