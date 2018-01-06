<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;

class Logout
{
    public $db;
    public $auth;
    public $view;
    public $user;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->view=new View();
        $this->user=$this->auth->isAuth();
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $token=@$_GET['token'];
        /*RULEs*/
        if ($this->user && $this->user['token']==$token) {
            $this->auth->logout();
            $this->view->redirect('/');
        } else {
            $this->view->out('404');
        }
    }
}
