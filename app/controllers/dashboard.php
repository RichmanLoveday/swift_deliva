<?php

use app\core\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        $this->view("dashboard", $data);
    }
}