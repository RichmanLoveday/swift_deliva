<?php

use app\core\Database;
use app\core\Models;

class User extends Models
{
    public function sign_up($POST)
    {
        // connection
        $db = Database::newInstance();

        // show($POST);
        $userDetails = (array) $POST->userDetails;
        $userData['email']      = clean($userDetails['email']);
        $userData['state']      = clean($userDetails['state']);
        $userData['lga']        = clean($userDetails['lga']);
        $userData['password']   = clean($userDetails['password']);
        $conPass            = clean($userDetails['confirmPassword']);
        //$userData['type']       = clean($POST['type']);

        // Vaidate email/ remove harmful things in email
        if (!empty($userData['email']) || filter_var($userData['email'], FILTER_SANITIZE_EMAIL)) {
            if (filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                // check if email exist
                $sql = "SELECT * FROM users WHERE email = :email limit 1";
                $check = $db->read($sql, ['email' => $userData['email']]);
                // show($check);

                if (is_array($check)) {
                    $this->errors['email'] = "That email is already in use";
                }
            }
        } else {
            $this->errors['email'] = "Please enter a valid email <br>";
        }

        // validate firstname
        if (empty($userDetails['firstName']) || !preg_match("/^[a-zA-Z]+$/", $userDetails['firstName'])) {
            $this->errors['firstName'] = "First name is required <br>";
        }

        // validate lastname
        if (empty($userDetails['lastName']) || !preg_match("/^[a-zA-Z]+$/", $userDetails['lastName'])) {
            $this->errors['lastName'] = "Last name is required <br>";
        }

        // Validate password
        if (empty($userData['password'])) {
            $this->errors['password'] = "Please enter this field <br>";
        } elseif (strlen($userData['password']) < 5) {
            $this->errors['password'] = "Passwod must be atleat 4 character long <br>";
        } elseif ($userData['password'] !== $conPass) {
            $this->errors['conpass'] = "Password do not match <br>";
        } else {
            echo '';
        }


        // Check URL
        $userData['userID'] = get_random_string(60);
        $sql = "SELECT * FROM users WHERE userID = :userID limit 1";
        $check = $db->read($sql, ['userID' => $userData['userID']]);

        if (is_array($check)) {
            $userData['userID'] = get_random_string(60);
        }

        // Save to userDatabase
        if (empty($this->errors)) {
            $userData['fullName'] = clean($userDetails['firstName']) . ' ' . clean($userDetails['lastName']);
            $userData['password'] = hash('sha1', $userData['password']);
            $userData['date'] = date("Y-m-d H:i:s");

            if ($POST->type == 'business') {
                $userData['role'] = "admin";
                $businessData['companyName'] = ucfirst($POST->businessDetails->companyName);
                $businessData['owner'] = $userData['userID'];
                $businessData['state'] = $POST->businessDetails->companyState;
              //  $businessData['lga'] = $POST->businessDetails->companyLga;
                $businessData['date'] = $userData['date'];
                $businessData['companyID'] = get_random_string(60);

                $result = $this->new_user($userData);
                if ($result) {
                    $newCompany = $this->new_company($businessData);
                    if ($newCompany) {
                        $this->success_message = 'Account created successfully';
                        return true;
                    }
                } else {
                    return false;
                }
            }

            if ($POST->type == 'customer' || $POST->type == 'driver') {
                $userData['role'] = $POST->type;
                $result = $this->new_user($userData);

                if ($result) {
                    $this->success_message = 'Account created successfully';
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    private function new_user($data)
    {
        // connection
        $db = Database::newInstance();

        $query = "INSERT INTO users (userID, fullName, email, state, lga, password, role, date) values (:userID, :fullName, :email, :state, :lga, :password, :role, :date)";
        $db->write($query, $data);

        return ($query) ? true : false;
    }

    private function new_company($data)
    {
        // connection
        $db = Database::newInstance();

        $query = "INSERT INTO company (companyID, companyName, owner, state, date) values (:companyID, :companyName, :owner, :state, :date)";
        $db->write($query, $data);

        return ($query) ? true : false;
    }

    public function get_user($id) 
    {
        // connection
        $db = Database::newInstance();
        
        $sql = "SELECT * FROM users WHERE userID = :id";
        $row = $db->read($sql, ['id' => $id]);   

        return is_array($row) ? $row[0] : false;
    }

    public function login($POST)
    {
        // connection
        $db = Database::newInstance();

        // show($POST);
        $data = [];

        $data['email']      = $POST['email'];
        $data['password']   = $POST['password'];

        // Vaidate email
        if (empty($data['email'])) {
            $this->errors['email'] = "Please fill in this field <br>";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Please fill in this field <br>";
        }


        if (empty($this->errors)) {

            // check if details exist
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password limit 1";
            $row = $db->read($sql, ['email' => $data['email'], 'password' => hash("sha1", $data['password'])]);

            if (is_array($row)) {
                return $row;
            } else {
                $this->errors['email/password'] = "Password / Email is incorrect";
            }
        }
        return false;
    }
}