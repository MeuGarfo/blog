<?php
namespace app\controller;

use Basic\Auth;
use Basic\View;

class Signin
{
    public $db;
    public $view;
    public $auth;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->view=new View();
        $this->auth=new Auth($this->db);
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        /*VARs*/
        $data['view']=$this->view;
        /*RULEs*/
        if ($this->auth->isAuth()) {
            $this->view->redirect('/posts');
        } else {
            $this->view->view('signin/read', $data);
        }
    }
    public function post()
    {
        /*VARs*/
        $data['view']=$this->view;
        /*RULEs*/
        $this->signinsRead();
        if ($this->auth->isAuth()) {
            $this->view->redirect('/posts');
        } else {
            $user=$this->auth->signin();
            if (isset($user['error'])) {
                $this->signinsCreate();
                $data['error']=array_flip($user['error']);
                $this->view->view('signin/read', $data);
            } else {
                $this->view->redirect('/posts');
            }
        }
    }
    public function signinsRead()
    {
        $dia=24*60*60;
        $dia=time()-$dia;
        $ip=@$_SERVER['REMOTE_ADDR'];
        $where['AND']=[
            'ip'=>$ip,
            'created_at[>=]'=>$dia
        ];
        $signins=$this->db->select('signins', '*', $where);
        if (count($signins)>=2) {
            header("HTTP/1.1 403 Forbidden");
            $data=[
                'view'=>$this->view
            ];
            $this->view->out('404');
        }
    }
    public function signinsCreate()
    {
        $data=[
            'ip'=>@$_SERVER['REMOTE_ADDR'],
            'created_at'=>time()
        ];
        $this->db->insert('signins', $data);
    }
}
