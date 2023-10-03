<?php

use app\core\Controller;
use app\models\Auth;

class Payments extends Controller
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
        $data = [];
        $data['page_title'] = 'Payments';

        $user = Auth::logged_in();
        if(!$user) $this->redirect('login');        // check if login

        //  show($user); die;

        // redirect if not admin or customer
        if (!Auth::access('admin') && !Auth::access('super_admin')) 
        $this->redirect('dashboard');
        
        $payments = '';
        if($user->role == ADMIN) {
            $payments = $this->paymentM->getUserPayments($user->companyID);
        } 

        if($user->role == SUPER_ADMIN) {
            $payments = $this->paymentM->getUserPayments();
        }

        if(is_array($payments)) {

            foreach($payments as $pay) {
                $pay->paymentAmount = number_format($pay->paymentAmount);
            }
        
            $data['payments'] = $payments;
            // // loop through and set status
             
        $data['role'] = $user->role;
      

        $data['uri'] = ROOT;

       // show($payments); die;
            
        $this->view("payment_page", $data);
        }

        
      

       
    }
       
}