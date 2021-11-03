<?php

session_start();
require_once('../model/Operator.php');
class LoginContoller
{
    public function Login()
    {
        $Operator = new Operator();
        if (empty($_GET['email']) || empty($_GET['password'])){
            echo 0;
            exit;
        }
        $permission = $Operator->login($_GET['email'], $_GET['password']);
        switch ($permission) {
            //no such user
            case 0: {
                echo 0;
                break;
            }
            //correct user and password
            case 1: {
                $_SESSION['role'] = 'Operator';
                $_SESSION['email'] = $_GET['email'];
                echo 1;
                break;
            }
            //wrong password
            case -1: {
                echo -1;
                break;
            }
        }
    }
    public function saveUser()
    {

    }
    public function ForgetPassword()
    {

    }
    
}

$login = new LoginContoller();
$login->Login();
?>