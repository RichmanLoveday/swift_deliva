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

    public function __construct()
    {
        $this->userM = $this->load_model('user');
        $this->companyM = $this->load_model('company');
        $this->packagesM = $this->load_model('package');
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
        // give access to user
        $user = Auth::logged_in();
        if(!$user) $this->redirect('login'); 

        // get user
        $user = $this->userM->get_user($user->userID);

       // show($user); die;
        $data['page_title'] = 'Dashboard';

        $data['role'] = $user->role;
        $data['userName'] = $user->fullName;
        $data['userID'] = $user->userID;
        $data['status'] = $user->status;
        $this->view("dashboard", $data);
    }

    public function change_status() {
      //  show($this->fetch); die;
        if(!isObjectEmpty($this->fetch)) {
            // check status
            if($this->fetch->status == 'offline') {
                $updateStatus = $this->userM->update_status($this->fetch->userID, OFFLINE);

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