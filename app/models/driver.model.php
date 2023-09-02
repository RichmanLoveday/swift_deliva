<?php

use app\core\Database;
use app\core\Models;

class Driver extends Models
{
    protected $DB;

    public function __construct()
    {
        $this->DB = Database::newInstance();
    }

    public function get_all_drivers()
    {
    }

    public function get_all_drivers_by_company_id($companyID)
    {
        $query = "SELECT * FROM driver as dri JOIN company as com ON dri.companyName = com.companyID JOIN users as u ON  dri.driverName = u.userID WHERE dri.companyName = :companyId ORDER BY dri.id DESC";
        $result = $this->DB->read($query, ['companyId' => $companyID]);

        return is_array($result) ? $result : false;
    }


    public function get_driver_by_user_id($userID)
    {
        $query = "SELECT * FROM users JOIN driver ON users.userID = driver.driverName WHERE users.userID = :userID AND users.status != :status limit 1";
        $result = $this->DB->read($query, ['userID' => $userID, 'status' => DRIVE_DISABLED]);

        return is_array($result) ? $result[0] : false;
    }


    public function company_driver($companyID, $userID)
    {
        $query = "INSERT INTO driver (companyName, driverName) values (:companyName, :driverName)";
        $result = $this->DB->write($query, ['companyName' => $companyID, 'driverName' => $userID]);

        if ($result) return true;

        return false;
    }

    public function get_driver_company($driverID)
    {
        $query = "SELECT * FROM driver WHERE driverName = :driverName limit 1";
        $result = $this->DB->read($query, ['driverName' => $driverID]);

        return is_array($result) ? $result[0] : false;
    }

    public function sign_up_driver($POST)
    {
        // connection
        $db = Database::newInstance();

        // show($POST);
        $userDetails = (array) $POST->userDetails;
        $userData['email']      = clean($userDetails['email']);
        $userData['password']   = clean($userDetails['password']);
        $userData['phone']      = clean($userDetails['phn']);
        $userData['state']      = $userDetails['state'];
        $userData['lga']        = $userDetails['lga'];
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

        // validate lastname
        if (empty($userDetails['fullName']) || !preg_match("/^[a-zA-Z ]+$/", $userDetails['fullName'])) {
            $this->errors['fullName'] = "Full name is required <br>";
        }

        // Validate password
        if (empty($userData['password'])) {
            $this->errors['password'] = "Please enter this field <br>";
        } elseif (strlen($userData['password']) < 5) {
            $this->errors['password'] = "Passwod must be atleat 4 character long <br>";
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
        // show($this->errors);
        if (empty($this->errors)) {
            $userData['fullName'] = clean($userDetails['fullName']);
            $userData['password'] = hash('sha1', $userData['password']);
            $userData['status'] = OFFLINE;
            $userData['date'] = date("Y-m-d H:i:s");

            if ($POST->type == 'driver') {
                $userData['role'] = $POST->type;
                // show($userData);

                $query = "INSERT INTO users (userID, fullName, email, state, lga, phone, password, role, status, date) values (:userID, :fullName, :email, :state, :lga, :phone, :password, :role, :status, :date)";
                $result = $this->DB->write($query, $userData);

                if ($result) {
                    $comDri = $this->company_driver($userDetails['companyID'], $userData['userID']);
                    if ($comDri) {
                        $this->success_message = 'Account created successfully';
                        return true;
                    }
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public function edit_driver($POST)
    {
        // connection
        $db = Database::newInstance();

        $userData['email']      = clean($POST->email);
        $userData['phone']      = clean($POST->phone);

        $sql = "SELECT * FROM users WHERE userID = :userID limit 1";
        $check = $db->read($sql, ['userID' => $POST->id]);
        
        $existingEmail = '';
        if (is_array($check)) {
            $existingEmail = $check[0]->email;
        }

       // echo $existingEmail; die;

        // Vaidate email/ remove harmful things in email
        if (!empty($userData['email']) || filter_var($userData['email'], FILTER_SANITIZE_EMAIL)) {
            if (filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {    
                // check new mail
                $sql = "SELECT * FROM users WHERE email = :email limit 1";
                $newMail = $db->read($sql, ['email' => $userData['email']]);

                if (is_array($newMail)) {
                    if ($existingEmail != $newMail[0]->email) {
                        // check if email exist
                        if (is_array($check)) {
                            $sql = "SELECT * FROM users WHERE email != :email limit 1";
                            $newMail = $db->read($sql, ['email' => $newMail[0]->email]);
                            $this->errors['email'] = "That email is already in use";
                        }
                    }
                }
            }
        } else {
            $this->errors['email'] = "Please enter a valid email <br>";
        }

        // validate lastname
        if (empty($POST->fullName) || !preg_match("/^[a-zA-Z ]+$/", $POST->fullName)) {
            $this->errors['fullName'] = "Full name is required <br>";
        }

        if (empty($this->errors)) {
            $userData['fullName'] = clean($POST->fullName);
            $userData['userID'] = $POST->id;

            $query = "UPDATE users SET fullName = :fullName, email = :email, phone = :phone WHERE userID = :userID";
            $result = $this->DB->write($query, $userData);

            return $result ? true : false;
        }

        return false;
    }

    public function reset_password($POST)
    {
        // show($POST); die;
        // connection
        $db = Database::newInstance();

        $userData['password']      = clean($POST->newPass);
        $conPass                   = clean($POST->conPass);

        // Validate password
        if (empty($userData['password'])) {
            $this->errors['password'] = "Please enter new password <br>";
        } elseif (strlen($userData['password']) < 5) {
            $this->errors['password'] = "Passwod must be atleat 4 character long <br>";
        } elseif ($userData['password'] !== $conPass) {
            $this->errors['conpass'] = "Password do not match <br>";
        } else {
            echo '';
        }

        if (empty($this->errors)) {
            $userData['password'] = hash('sha1', $userData['password']);
            $userData['userID'] = $POST->id;

            $query = "UPDATE users SET password = :password WHERE userID = :userID";
            $result = $this->DB->write($query, $userData);

            return $result ? true : false;
        }

        return false;
    }

    public function delete_driver($id) {
        
        $data['userID'] = $id;
        $data['status'] = DRIVE_DISABLED;

        $query = "UPDATE users SET status = :status WHERE userID = :userID";
        $result = $this->DB->write($query, $data);

        return $result ? true : false;
    }

    public function get_get_drivers($driverID) {
        $query = "SELECT * FROM users WHERE userID = :id AND role = :driver";
        $result = $this->DB->read($query, ['id' => $driverID, 'driver' => DRIVER]);

        return is_array($result) ? $result[0] : false;
    }

    public function get_all_current_dispatch($companyID, $driverID) {
        $query = "SELECT * FROM orders as o JOIN packages AS p ON o.packageID = p.packageID WHERE o.companyID = :companyID AND o.driverID = :driverID AND o.order_status = :onway OR o.order_status = :picked order by p.id desc";

        $result = $this->DB->read($query, ['driverID' => $driverID, 'companyID' => $companyID, 'onway' => STARTING, 'picked' => PICKED_UP]);

      //  show($result); die;

        return is_array($result) ? $result : [];
    }


    public function get_waiting_orders($companyID, $driverID)
    {
        $query = "SELECT * FROM orders as o JOIN packages AS p ON o.packageID = p.packageID JOIN receiver ON receiver.receiverID = p.receiverID JOIN users as u ON p.senderID = u.userID WHERE o.companyID = :companyID AND o.driverID = :driverID AND o.order_status = :waiting order by p.id desc";

        $result = $this->DB->read($query, ['driverID' => $driverID, 'companyID' => $companyID, 'waiting' => WAITING]);

        return is_array($result) ? $result : [];
    }


    public function get_orders_by_id($orderId, $driverID) {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN users ON packages.senderID = users.userID JOIN receiver ON receiver.receiverID = packages.receiverID WHERE orders.driverID = :driverID AND orders.orderID = :orderID order by orders.id desc";

        $result = $this->DB->read($query, ['orderID' => $orderId, 'driverID' => $driverID]);
        return is_array($result) ? $result[0] : false;
    }

    public function update_order($driverID, $orderId, $status, $reject_order = '') {

        if(is_null($reject_order)) {
            $query = "UPDATE orders SET order_status = :status, driverID = :null WHERE orderID = :orderID AND driverID = :driverID";
            $result = $this->DB->write($query, ['orderID' => $orderId, 'driverID' => $driverID, 'status' => $status, 'null' => $reject_order]);
            
        } else {
            $query = "UPDATE orders SET order_status = :status WHERE orderID = :orderID AND driverID = :driverID";
            $result = $this->DB->write($query, ['orderID' => $orderId, 'driverID' => $driverID, 'status' => $status]);
        }
        
        if($result) {
            return true;
        } 

        return false;
    }


    public function get_current_orders($driverID, $companyID) {
        $query = "SELECT * FROM orders as o JOIN packages p ON p.packageID = o.packageID JOIN receiver as r ON r.receiverID = p.receiverID JOIN users as u ON u.userID = p.senderID WHERE o.driverID = :driverID AND o.companyID = :companyID AND o.order_status = :started OR o.order_status = :pickup OR o.order_status = :onway";

        $result = $this->DB->read($query, ['driverID' => $driverID, 'companyID' => $companyID, 'started' => STARTING, 'pickup' => PICKED_UP, 'onway' => ONWAY]);

        return is_array($result) ? $result : [];
    }

}