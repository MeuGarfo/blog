<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;

class Home
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->view=new View();
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $where['AND']=[
            'id[>]'=>0,
            'online'=>1
        ];
        $where['ORDER']=[
        'created_at'=>'DESC'
        ];
        $posts=$this->db->select('posts', '*', $where);
        $data=[
            'view'=>$this->view,
            'posts'=>$posts,
            'user'=>$this->auth->isAuth()
        ];
        /*RULEs*/
        $this->view->out('home/read', $data);
    }
}
