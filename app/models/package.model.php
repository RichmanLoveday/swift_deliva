<?php

use app\core\Database;
use app\core\Models;

class Package extends Models
{

    protected $Database;

    public function __construct()
    {
        $this->Database = Database::newInstance();
    }

    public function get_package_order_by_userID($userID)
    {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN receiver as rec ON packages.receiverID = rec.receiverID WHERE packages.senderID = :userID AND deliveryStatus != :status order by packages.senderID desc";

        $result = $this->Database->read($query, ['userID'=> $userID, 'status' => PACKAGE_DISABLED]);

        return is_array($result) ? $result : false;

    }

    public function get_all_package_order() {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN receiver as rec ON packages.receiverID = rec.receiverID WHERE packages.deliveryStatus != :status order by packages.senderID desc";

        $result = $this->Database->read($query, ['status' => PACKAGE_DISABLED]);

        return is_array($result) ? $result : false;

    }

    public function get_package_id($packageID) {
        $query = "SELECT * FROM packages JOIN receiver as rec ON packages.receiverID = rec.receiverID  JOIN orders ON packages.packageID = orders.packageID WHERE packages.packageID = :packageID";

        $result = $this->Database->read($query, ['packageID' => $packageID]);

        return is_array($result) ? $result[0] : false;

    }

    public function store_package($data, $receiverID) {
        // store receiver datas
    
      //  show($data); die;
        $package['id'] = generateUniqueIDWithDateTime();
        $package['senderID'] = $data->senderID;
        $package['packageDescription'] = $data->packageDecription;
        $package['packageItems'] = json_encode($data->items);
        $package['receiverID'] = $receiverID;
        $package['deliveryInstruction'] = $data->deliveryInstruction;
        $package['deliveryStatus'] = PENDING_PACKAGE;
        $package['method'] = $data->paymentMethod;
        $package['date'] = date("Y-m-d H:i:s");

        // show($package); die;
        $query = "INSERT INTO packages (packageID, senderID, packageDescription, packageItems, receiverID, deliveryInstruction, deliveryStatus, paymentMethod, date) values (:id, :senderID, :packageDescription, :packageItems, :receiverID, :deliveryInstruction, :deliveryStatus, :method, :date)";
        $result = $this->Database->write($query, $package);

        if ($result) return $this->get_package_by_id($package['id']);       
    
        return false;
        
    }

    public function update_tracking($trackingID, $packageID, $staus_desc) {
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO tracking (tracking_id, package_id, status_time, status_description) values (:tracking_id, :package_id, :status_time, :status_description)";

        $result = $this->Database->write($query, ['tracking_id' => $trackingID, 'package_id' => $packageID, 'status_time' => $date, 'status_description' => $staus_desc]);

        if($result) {
            return true;
        }

        return false;
    }

    public function delete_tracking($trackingID, $sta_desc) {
        $query = "DELETE FROM tracking WHERE tracking_id = :id AND status_description = :sta_dec";
        $result  = $this->Database->write($query, ['id' => $trackingID, 'sta_dec' => $sta_desc]);

        return $result ? true : false;
    }

    public function package_tracker_update($packageID, $status)
    {
        $trackingID = generateUniqueIDWithDateTime();
        $query = "UPDATE packages SET trackingID = :trackingID, deliveryStatus = :status WHERE packageID = :packageID";
        $result = $this->Database->write($query, ['trackingID' => $trackingID, 'status' => $status, 'packageID' => $packageID]);

        if ($result) {
            return $this->get_package_by_id($packageID);
        }

        return false;
    }

    public function read_tracker($packageID, $status_desc = null) {
        if(is_null($status_desc)) {
            $query = "SELECT * FROM tracking WHERE package_id = :id";
            $result = $this->Database->read($query, ['id' => $packageID]);
        } else {
            $query = "SELECT * FROM tracking WHERE package_id = :id AND status_description = :s_desc limit 1";
            $result = $this->Database->read($query, ['id' => $packageID, 's_desc' => $status_desc]);
        }
        
        if(is_array($result)) {
            return $result;
        }

        return false;
    }

    public function edit_package($data, $packageID) {
        //  show($data); die;
        $package['packageDescription'] = $data->packageDecription;
        $package['packageItems'] = json_encode($data->items);
        $package['deliveryInstruction'] = $data->deliveryInstruction;
        $package['packageID'] = $packageID;

        // show($package); die;
        $query = "UPDATE packages SET packageDescription = :packageDescription, packageItems = :packageItems, deliveryInstruction = :deliveryInstruction WHERE packageID = :packageID";
        $result = $this->Database->write($query, $package);

        if ($result) return true;       
    
        return false;
    }

    public function cancel_package($packageID, $status) {
        $query = "UPDATE packages SET deliveryStatus = :status WHERE packageID = :id";
        $result =  $this->Database->write($query, ['id' => $packageID, 'status' => $status]);

        if ($result) return true;

        return false;
    }

    public function delivered_package($packageID, $status) {
        $query = "UPDATE packages SET deliveryStatus = :status WHERE packageID = :id";
        $result =  $this->Database->write($query, ['id' => $packageID, 'status' => $status]);
        
 
        if($result) return true;
 
        return false;
    }

    public function failed_package($packageID, $status) {
        $query = "UPDATE packages SET deliveryStatus = :status WHERE packageID = :id";
        $result =  $this->Database->write($query, ['id' => $packageID, 'status' => $status]);
 
        if($result) return true;
 
        return false;
    }

    public function store_receiver($data) {
        // store receiver * generate unique id
        $id = generateUniqueIDWithDateTime();

        $receiver['id'] = $id;
        $receiver['fullName'] = $data->receiverName;
        $receiver['address'] = $data->receiverAddrs;
        $receiver['contact'] = $data->receiverNumber;

        $query = "INSERT INTO receiver (receiverID, receiverName, receiverAddress, receiverContact) values (:id, :fullName, :address, :contact)";
        $result = $this->Database->write($query, $receiver);

        if($result) return $this->read_receiver($id);

        return false;
    }

    public function edit_receiver($data, $receiverID) {
        //show($data); die;
        $receiver['fullName'] = $data->receiverName;
        $receiver['address'] = $data->receiverAddrs;
        $receiver['contact'] = $data->receiverNumber;
        $receiver['receiverID'] = $receiverID;

        $query = "UPDATE receiver SET receiverName = :fullName, receiverAddress = :address, receiverContact = :contact WHERE receiverID = :receiverID";
        $result = $this->Database->write($query, $receiver);

        if($result) return true;

        return false;
    }

    public function get_package_by_id($id)
    {
        $query = "SELECT * FROM packages WHERE packageID = :id limit 1";
        $result = $this->Database->read($query, ['id' => $id]);
        return is_array($result) ? $result[0] : false;
    }

    public function get_package_orders($packageID) {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN receiver as rec ON packages.receiverID = rec.receiverID JOIN users ON packages.senderID = users.userID WHERE packages.packageID = :packageID limit 1";

        $result = $this->Database->read($query, ['packageID' => $packageID]);
        return is_array($result) ? $result[0] : false;
    }

    public function disable_package($packageID, $status) {
        $query = "UPDATE packages SET deliveryStatus = :status WHERE packageID = :id";
        $result =  $this->Database->write($query, ['id' => $packageID, 'status' => $status]);

        if ($result) return true;

        return false;
    }

    private function read_receiver($id) {
        $query = "SELECT * FROM receiver WHERE receiverID = :id limit 1";
        $result  =  $this->Database->read($query, ['id'=>$id]);

        return is_array($result) ? $result[0] : false;
    }    

}