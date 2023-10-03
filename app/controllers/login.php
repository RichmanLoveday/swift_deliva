<?php

use app\models\Auth;
use app\core\Controller;

class Login extends Controller
{
    protected $userM;
    protected $companyM;
    protected $driverM;

    public function __construct()
    {
        $this->userM = $this->load_model('user');
        $this->companyM = $this->load_model('company');
        $this->driverM = $this->load_model('driver');
    } 

    public function index()
    {
        $data = [];
        $data['page_title'] = 'Login';

        // check if logedin
        if(Auth::logged_in()) $this->redirect('dashboard');

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $row = $this->userM->login($_POST);        // Get the row data when login

            if (is_array($row) && count($row) > 0) {
                $row = $row[0];

                // check user role 
                if ($row->role == CUSTOMER) {
                    // authenticate user and store current login user in session
                    $USER = $row;
                    Auth::authenticate($USER);       // Store user row
                }

                if ($row->role == ADMIN) {
                    // add company role to user role
                    $USER = $row;
                    $company = $this->companyM->get_company_by_owner($row->userID);
                    $row->companyID = $company[0]->companyID;

                    // authenticate user and store current login user in session
                    Auth::authenticate($USER);
                }

                if ($row->role == DRIVER) {
                    // add company role to user role
                    $company = $this->driverM->get_driver_company($row->userID);
                    $row->companyID = $company->companyName;

                    // authenticate user and store current login user in session
                    $USER = $row;

                    // check if drivr status is not disabled
                    if($USER->status == DRIVE_DISABLED) {
                        $this->redirect('login');
                    } else {
                        Auth::authenticate($USER);
                    }

                }
                
                if ($row->role == SUPER_ADMIN) {
                    die;
                }
                
                // Redirect page
                $this->redirect('dashboard');
            } else {
                // Error Data to be sent to view
                $data['errors'] = $this->userM->errors;
            }
        }

        $this->view("login", $data);
    }
}