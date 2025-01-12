<?php
//turns first two url components into controller method
namespace App\Core;
defined('ROOTPATH') OR die();
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    exit('No direct script access allowed');
}

class App
{
    private $controller = 'Home';
    private $method 	= 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", filter_var(rtrim($URL,"/"),FILTER_SANITIZE_URL));
        return $URL;	
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        /** select controller **/
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        if(file_exists($filename))
        {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }else{

            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controllerClass = 'App\\Controller\\'.$this->controller;
        $controller = new $controllerClass();

        /** select method **/
        if(!empty($URL[1]))
        {
            if(method_exists($controller, $URL[1]))
            {
                $this->method = $URL[1];
                unset($URL[1]);
            }	
            else
            {
                // Redirect to the index method if the method does not exist
                header("Location: /" . strtolower($this->controller));
                exit();
            }
        }

        call_user_func_array([$controller,$this->method], $URL);

    }	

}