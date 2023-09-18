<?php

use app\core\Controller;
use app\models\Auth;

class Drivers extends Controller
{
    protected $driverM;
    protected $usersM;
    protected $fetch;
    public function __construct()
    {
        $this->driverM = $this->load_model('driver');
        $this->usersM = $this->load_model('user');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }

    public function index()
    {
        $data['page_title'] = 'Manage Drivers';

        // give access to user
        if (!Auth::access('admin')) $this->redirect('dashboard');
        $user = Auth::logged_in();

        // get all drivers in specific company
        $data['companyID'] = $user->companyID;
        $data['drivers'] = $this->driverM->get_all_drivers_by_company_id($user->companyID);

        // show($data);
        // die;

        $this->view("manage_driver", $data);
    }

    public function register()
    {
        if (!isObjectEmpty($this->fetch)) {
           // show($this->fetch);

            // add state and lga to current driver
            $this->fetch->userDetails->state = $_SESSION['USER']->state;
            $this->fetch->userDetails->lga = $_SESSION['USER']->lga;

            $new_driver = $this->driverM->sign_up_driver($this->fetch);
            $lastInsertedDriver = $this->driverM->get_all_drivers_by_company_id($this->fetch->userDetails->companyID)[0] ?? null;

            if ($new_driver) {
                $data['status'] = 'success';
                $data['message'] = $this->driverM->success_message;
                $data['last_updated'] = $lastInsertedDriver;
                $data['uri'] = ROOT;
                $data['images'] = IMAGES;


                //show($data); die;
                // send data to ajax
                echo json_encode($data);
            } elseif (count($this->driverM->errors) > 0 && !$new_driver) {
                $data['errors'] = $this->driverM->errors;
                $data['status'] = 'error';
                $data['uri'] = ROOT;
                $data['images'] = IMAGES;

                echo json_encode($data);
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to perform action';
                $data['uri'] = ROOT;
                $data['images'] = IMAGES;

                echo json_encode($data);
            }
            return;
        }
    }

    public function view_details()
    {
        if (!isObjectEmpty($this->fetch)) {

            // get company id
            // get user id
            $driver = $this->driverM->get_driver_by_user_id($this->fetch->id);

            if (is_object($driver)) {
                $data['status'] = 'success';
                $data['fullName'] = $driver->fullName;
                $data['email'] = $driver->email;
                $data['area'] = $driver->state . ', ' . $driver->lga;
                $data['phone'] = $driver->phone;
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {
            }
        }
    }

    public function edit()
    {
        if (!isObjectEmpty($this->fetch)) {
            $driver = $this->driverM->edit_driver($this->fetch);

            if ($driver) {
                $driver = $this->driverM->get_driver_by_user_id($this->fetch->id);
                
                $data['status'] = 'success';
                $data['message'] = 'Driver Edited Successfully';
                $data['fullName'] = $driver->fullName;
                $data['email'] = $driver->email;
                $data['area'] = $driver->state . ', ' . $driver->lga;
                $data['phone'] = $driver->phone;
                $data['uri'] = ROOT;

                echo json_encode($data);
            } elseif (count($this->driverM->errors) > 0) {
                $data['errors'] = $this->driverM->errors;
                $data['status'] = 'error';
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to perform action';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function reset_password() {
        if (!isObjectEmpty($this->fetch)) {
            // check if password is same with an admin
            $password = hash('sha1', $this->fetch->adminPass);
           // show($this->fetch);
           
            if ($password !== $_SESSION['USER']->password) {

                $data['status'] = 'error';
                $data['message'] = 'Password do not match';
                $data['uri'] = ROOT;

                echo json_encode($data);
                return;
            }

          
            // reset driver password
            $resetPass = $this->driverM->reset_password($this->fetch);

            if ($resetPass) {
                $data['status'] = 'success';
                $data['message'] = 'Driver password reset successfully';
                $data['uri'] = ROOT;

                echo json_encode($data);
            } elseif (count($this->driverM->errors) > 0) {
                $data['errors'] = $this->driverM->errors;
                $data['status'] = 'error';
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {

                $data['status'] = 'failed';
                $data['message'] = 'Unable to perform action';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function delete_driver() {
        if (!isObjectEmpty($this->fetch)) {
            $driverDel = $this->driverM->delete_driver($this->fetch->id);

            if($driverDel) {
                $data['status'] = 'success';
                $data['message'] = 'Driver delete sucessfully';
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {
                $data['status'] = 'error';
                $data['message'] = 'Unable to delete driver';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function disable_driver() {
        if(!isObjectEmpty($this->fetch)) {
            $disableDri = $this->driverM->disable_driver($this->fetch->id);

            if($disableDri) {
                $data['status'] = 'success';
              //  $data['message'] = 'Driver delete sucessfully';
                $data['images'] = IMAGES;
                $data['driverID'] = $this->fetch->id;
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }

    public function enable_driver() {
        if(!isObjectEmpty($this->fetch)) {
            $disableDri = $this->driverM->enable_driver($this->fetch->id);

            if($disableDri) {
                $data['status'] = 'success';
              //  $data['message'] = 'Driver delete sucessfully';
                $data['images'] = IMAGES;
                $data['driverID'] = $this->fetch->id;
                $data['images'] = IMAGES;
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
        }
    }
}