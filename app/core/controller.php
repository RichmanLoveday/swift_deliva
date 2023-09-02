<?php

namespace app\core;

class Controller
{

    public function view($path, $data = [])
    {

        if (is_array($data)) {
            extract($data);
        }

        if (file_exists("../app/views/" . $path . ".php")) {
            include "../app/views/" . $path . ".php";
        } else {
            include "../app/views/" . "404.php";
        }
    }

    public function load_model($model)
    {
        if (file_exists("../app/models/" . strtolower($model) . ".model.php")) {
            include "../app/models/" . strtolower($model) . ".model.php";
            return $a = new $model();
        }
        return false;
    }

    public function redirect($link)
    {
        header('Location: ' . ROOT . strtolower($link));
        die();
    }
}