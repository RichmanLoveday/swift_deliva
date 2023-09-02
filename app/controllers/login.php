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
                    $company = $this->companyM->get_company_by_owner($row->userID);
                    $row->companyID = $company[0]->companyID;

                    // authenticate user and store current login user in session
                    $USER = $row;
                    Auth::authenticate($USER);
                }

                if ($row->role == DRIVER) {
                    // add company role to user role
                    $company = $this->driverM->get_driver_company($row->userID);
                    $row->companyID = $company->companyName;

                    // authenticate user and store current login user in session
                    $USER = $row;

                    Auth::authenticate($USER);
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