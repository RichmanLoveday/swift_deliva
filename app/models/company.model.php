<?php

use app\core\Database;
use app\core\Models;

class Company extends Models
{

    protected $Database;

    public function __construct()
    {
        $this->Database = Database::newInstance();
    }

    public function get_all_company()
    {
    }

    public function getPackageCompany($trackingID)
    {
        $query = "SELECT * FROM company JOIN orders ON orders.companyID = company.companyID JOIN packages ON packages.packageID = orders.packageID WHERE packages.trackingID = :trackingID limit 1";
        $result = $this->Database->read($query, ['trackingID' => $trackingID]);
        
        return is_array($result) ? $result[0] : false;
    }

    public function get_company_by_owner($owner)
    {
        $query = "SELECT * FROM company WHERE owner = :owner limit 1";
        $result = $this->Database->read($query, ['owner' => $owner]);
        return $result ?? false;
    }

    public function get_delivery_company_by_location($state, $lga) {
        $query = "SELECT * FROM company WHERE state = :state AND lga = :lga";
        $result = $this->Database->read($query, ['state' => $state, 'lga' => $lga]);

        return is_array($result) ? $result : false;
    }

}