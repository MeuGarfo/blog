<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;
use League\Glide\ServerFactory;

class Images
{
    public $db;
    public $auth;
    public $view;
    public $user;
    public $segment;
    public $server;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->auth=new Auth($this->db);
        $this->user=$this->auth->isAuth();
        $this->view=new View();
        $this->segment=$this->view->segment();
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $type=@$this->segment[1];
        $path=@$this->segment[2];
        $data=[
            'user'=>$this->user
        ];
        $server = ServerFactory::create([
            'source' => ROOT.'file',
            'cache' => ROOT.'image',
        ]);
        /*RULEs*/
        if ($server->sourceFileExists($path)) {
            switch ($type) {
                case 400:
                $server->outputImage($path, ['w' => 400,'h'=>400, 'fit'=>'max']);
                break;
                case 'cover':
                $server->outputImage($path, ['w' => 1200,'h'=>1200, 'fit'=>'max']);
                break;
                case 'original':
                $this->view->redirect('/file/'.$path);
                break;
                default:
                $this->view->out('404', $data);
                break;
            }
        } else {
            $this->view->out('404', $data);
        }
    }
}
