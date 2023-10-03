<?php

use app\core\Database;
use app\core\Models;

class Payment extends Models {

    protected $Database;

    public function __construct()
    {
        $this->Database = Database::newInstance();
    }

    public function store_payment($data, $orderID)
    {
       
        // store receiver * generate unique id
        $id = generateUniqueIDWithDateTime();

        $pay['id'] = $id;
        $pay['orderID'] = $orderID;
        $pay['referenceID'] = $data->transaction ?? '';
        $pay['amount'] = (int) str_replace([',', '.'], '', $data->amount);
        $pay['method'] = $data->paymentMethod;
        $pay['date'] = date("Y-m-d H:i:s");

        $query = "INSERT INTO payment (paymentID, orderID, referenceID, paymentAmount, paymentMethod, date) values (:id, :orderID, :referenceID, :amount, :method, :date)";
        $result = $this->Database->write($query, $pay);

        if ($result) return true;

        return false;
    }

    public function get_payment($orderID) {
        $query = "SELECT * FROM payment WHERE orderID = :id";
        $result = $this->Database->read($query, ['id' => $orderID]);

        return is_array($result) ? $result : false;
    }

    public function getUserPayments($companyID = null) {
        if($companyID != NULL) {
            $query = "SELECT * FROM orders JOIN payment ON orders.orderID = payment.orderID JOIN packages ON orders.packageID = packages.packageID JOIN users ON packages.senderID = users.userID WHERE orders.companyID = :companyID order by orders.id DESC";
            $result = $this->Database->read($query, ['companyID' => $companyID]);

            return is_array($result) ? $result : false;
            
        } else {
            $query = "SELECT * FROM orders JOIN payment ON orders.orderID = payment.orderID JOIN packages ON orders.packageID = packages.packageID JOIN users ON packages.senderID = users.userID order by orders.id DESC";
            $result = $this->Database->read($query);

            return is_array($result) ? $result : false;
        }
    }
}