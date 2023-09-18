<?php

use app\core\Database;
use app\core\Models;

class Orders extends Models {
    protected $Database;

    public function __construct()
    {
        $this->Database = Database::newInstance();
    }


    public function store_orders($data, $packageID) {
        $id = date('YmdHis');

       // $timeStamp = (int) strtotime($data->deliveryTime);
        $timeStamp = (int) strtotime(str_replace('/', '-', $data->deliveryDate . ' ' . $data->deliveryTime));
        
       // var_dump($timeStamp);
        $order['id'] = $id;
        $order['companyID'] = $data->deliveryServiceProvider;
        $order['packageID'] = $packageID;
        $order['pay_status'] = $data->payment_status;
        $order['pickupDate'] = date('d-m-Y', (int) strtotime(str_replace('/', '-', $data->pickUpdate)));
        $order['deliveryDate'] = date('d-m-Y h:i:s',$timeStamp);
        $order['order_status'] = UNASSIGNED;
        $order['date'] = date("Y-m-d H:i:s");

        $query = "INSERT INTO orders (orderID, companyID, packageID, payment_status, pickUpDate, deliveryDate, order_status, date) values (:id, :companyID, :packageID, :pay_status, :pickupDate, :deliveryDate, :order_status, :date)";
        $result = $this->Database->write($query, $order);

        if ($result) return $this->get_orders_by_id($id);

        return false;
    }

    public function edit_orders($data, $orderID) {
       // $timeStamp = (int) strtotime($data->deliveryTime);
        $timeStamp = (int) strtotime(str_replace('/', '-', $data->deliveryDate . ' ' . $data->deliveryTime));
        
        $order['companyID'] = $data->deliveryServiceProvider;
        $order['pickupDate'] = date('d-m-Y', (int) strtotime(str_replace('/', '-', $data->pickUpdate)));
        $order['deliveryDate'] = date('d-m-Y h:i:s',$timeStamp);
        $order['orderID'] = $orderID;

      //  show($order); die;
        $query = "UPDATE orders SET companyID = :companyID, pickUpDate = :pickupDate, deliveryDate = :deliveryDate WHERE orderID = :orderID";
        $result = $this->Database->write($query, $order);

        if ($result) return true;

        return false;
    }

    public function get_orders_by_id($id) {
        $query = "SELECT * FROM orders WHERE orderID = :id limit 1";
        $result = $this->Database->read($query, ['id' => $id]);
    
        return is_array($result) ? $result[0] : false;
    }

    public function update_driver($data, $status = null) {

        $result = '';
        if(is_null($status)) {
            // update driver id and set status to waiting
            $query = "UPDATE orders SET driverID = :driverID WHERE orderID = :orderID";
            $result = $this->Database->write($query, ['driverID' => $data->driverID, 'orderID' => $data->orderID]);

        } else {
            // update only driver id
            $query = "UPDATE orders SET driverID = :driverID , order_status = :status WHERE orderID = :orderID";
            $result = $this->Database->write($query, ['driverID' => $data->driverID, 'orderID' => $data->orderID, 'status' => $status]);
        }

        return $result ? true : false;
        
    }

    public function cancel_order($orderID, $status) {
       $query = "UPDATE orders SET order_status = :status WHERE orderID = :id";
       $result =  $this->Database->write($query, ['id' => $orderID, 'status' => $status]);

       if($result) return true;

       return false;
    }

    public function get_orders_by_company_id($companyID) {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN users ON packages.senderID = users.userID JOIN receiver ON receiver.receiverID = packages.receiverID WHERE orders.companyID = :id AND orders.order_status != :cancel AND orders.order_status != :del order by orders.id desc";
        $result = $this->Database->read($query, ['id' => $companyID, 'cancel' => ORDER_CANCELLED, 'del' => ORDER_DISABLED]);

        return is_array($result) ? $result : [];
    }

    public function get_completed_orders_by_company_id($companyID)
    {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN users ON packages.senderID = users.userID JOIN receiver ON receiver.receiverID = packages.receiverID WHERE orders.companyID = :id AND orders.order_status = :completed order by orders.id desc";
        $result = $this->Database->read($query, ['id' => $companyID, 'completed' => ORDER_DELIVERED]);

        return is_array($result) ? $result : [];
    }

    public function get_incomplete_orders_by_company_id($companyID)
    {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN users ON packages.senderID = users.userID JOIN receiver ON receiver.receiverID = packages.receiverID WHERE orders.companyID = :id AND orders.order_status = :canceled OR orders.order_status = :failed OR orders.order_status = :unassigned order by orders.id desc";
        $result = $this->Database->read($query, ['id' => $companyID, 'unassigned' => UNASSIGNED, 'canceled' => ORDER_CANCELLED, 'failed' => FAILED_ORDER]);

        return is_array($result) ? $result : [];
    }


    public function get_history_orders_by_company_id($companyID)
    {
        $query = "SELECT * FROM packages JOIN orders ON packages.packageID = orders.packageID JOIN users ON packages.senderID = users.userID JOIN receiver ON receiver.receiverID = packages.receiverID WHERE orders.companyID = :id AND orders.order_status = :canceled OR orders.order_status = :failed OR orders.order_status = :delivered OR orders.order_status = :not_assigned order by orders.id desc";
        
        $result = $this->Database->read($query, ['id' => $companyID, 'canceled' => ORDER_CANCELLED, 'failed' => FAILED_ORDER, 'delivered' => ORDER_DELIVERED, 'not_assigned' => UNASSIGNED]);

        return is_array($result) ? $result : [];
    }


    public function reshedule_order($data) {
        //  show($data); die;
        // $pickUpDate = date('d-m-Y', (int) strtotime(str_replace('/', '-', $data->pickUpDate)));
        $order['pickUpDate'] = date('d-m-Y', (int) strtotime(str_replace('/', '-', $data->pickUpDate)));
        $order['deliveryDate'] = date('d-m-Y h:i:s', (int) strtotime(str_replace('/', '-', $data->deliveryDate . ' ' . $data->deliveryTime))); ;
        $order['orderID'] = $data->orderID;

      //show($order); die;

        $query = "UPDATE orders SET pickUpDate = :pickUpDate, deliveryDate = :deliveryDate WHERE orderID = :orderID";
        $result = $this->Database->write($query, $order);
        
        return $result ?? false;
    }

    public function get_drive_company($driver, $companyID, $status) {
        $query = "SELECT * FROM orders as o JOIN packages as p ON p.packageID = o.packageID JOIN receiver as r ON r.receiverID = p.receiverID JOIN users ON users.userID = p.senderID WHERE o.driverID = :driveID AND o.companyID = :companyID AND o.order_status = :status order by o.id desc";
        $result = $this->Database->read($query, ['driveID' => $driver, 'companyID' => $companyID, 'status' => $status]);

        return is_array($result) ? $result : [];
    }
}