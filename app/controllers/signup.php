<?php

use app\core\Controller;

class Signup extends Controller
{
    protected $fetch;
    protected $usersM;

    public function __construct()
    {
        $this->usersM = $this->load_model('user');

        $this->fetch = file_get_contents("php://input");
        $this->fetch = json_decode($this->fetch);

        if (!(is_object($this->fetch))) {
            $this->fetch = (object) $_POST;
        }
    }

    public function index()
    {

        $data = [];
        $data['page_title'] = 'Signup';

        if (!isObjectEmpty($this->fetch)) {
            $new_user = $this->usersM->sign_up($this->fetch);
            // check boolean
            if ($new_user) {
                $data['status'] = 'success';
                $data['message'] = $this->usersM->success_message;
                $data['redirect'] = ROOT . 'login';
                $data['uri'] = ROOT;

                // send data to ajax
                echo json_encode($data);
            } elseif (count($this->usersM->errors) > 0) {

                $data['errors'] = $this->usersM->errors;
                $data['status'] = 'error';
                $data['uri'] = ROOT;

                echo json_encode($data);
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Unable to perform action';
                $data['uri'] = ROOT;

                echo json_encode($data);
            }
            return;
        }

        $this->view("signup", $data);
    }

    public function business()
    {
      //show($this->fetch); die;
        $new_user = $this->usersM->sign_up($this->fetch);
        if ($new_user) {
            $data['status'] = 'success';
            $data['message'] = $this->usersM->success_message;
            $data['redirect'] = ROOT . 'login';
            $data['uri'] = ROOT;
            // send data to ajax
            echo json_encode($data);
        } elseif (count($this->usersM->errors) > 0) {

            $data['errors'] = $this->usersM->errors;
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