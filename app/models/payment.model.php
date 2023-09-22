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

    public function get_payments() {}
}