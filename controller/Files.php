<?php
namespace app\controller;

use Basic\View;
use Basic\Auth;
use Basic\Upload;

class Files
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
        if ($method=='POST') {
            $this->post();
        } else {
            $this->get();
        }
    }
    public function get()
    {
        if (isset($_GET['create']) && $this->user) {
            $this->getCreate();
        } else {
            $this->getShowAll();
        }
    }
    public function getCreate()
    {
        /*VARs*/
        $data=[
            'view'=>$this->view,
            'user'=>$this->user
        ];
        /*RULEs*/
        $this->view->out('files/create', $data);
    }
    public function getShowAll()
    {
        /*VARs*/
        $dir=ROOT.'file';
        $ignored = [
            '.',
            '..',
            '.svn',
            '.htaccess'
        ];
        $files = array();
        /*RULEs*/
        if ($this->user) {
            foreach (scandir($dir) as $file) {
                if (in_array($file, $ignored)) {
                    continue;
                }
                $files[] = $file;
            }
            arsort($files);
            $data=[
                'files'=>$files,
                'user'=>$this->user,
                'view'=>$this->view
            ];
            $this->view->out('files/showAll', $data);
            //var_dump($files);
        } else {
            $this->view->redirect('/signin');
        }
    }
    public function post()
    {
        if (isset($_GET['create']) && $this->user) {
            $this->postCreate();
        } elseif (isset($_GET['delete'],$_GET['name'])) {
            $this->postDelete();
        }
    }
    public function postCreate()
    {
        $upload=new Upload();
        $exts=[
            'gif',
            'ico',
            'jpg',
            'pdf',
            'png',
            'svg'
        ];
        $file=$upload->upload('file', $exts);
        if (isset($file['error'])) {
            $data=[
                'url'=>$_ENV['site_url'].'/file/'.$file['name'],
                'user'=>$this->user,
                'view'=>$this->view,
                'errors'=>$file['error']
            ];
            $this->view->out('files/uploadError', $data);
        } else {
            $destination=ROOT.'file/'.$file['name'];
            $upload->move($file['temp'], $destination);
            $data=[
                'url'=>'/file/'.$file['name'],
                'user'=>$this->user,
                'view'=>$this->view,
                'file'=>$file
            ];
            $this->view->out('files/uploadOk', $data);
        }
    }
    public function postDelete()
    {
        if ($this->user) {
            $filename=ROOT.'file/'.$_GET['name'];
            unlink($filename);
            $dir=ROOT.'image/'.$_GET['name'];
            if(is_dir($dir)){
                $this->unlinkr($dir);
            }
            $this->view->json(['response'=>'ok']);
        } else {
            $this->view->json(['response'=>'error']);
        }
    }
    public function unlinkr($dir) { 
        if (is_dir($dir)) { 
         $objects = scandir($dir); 
         foreach ($objects as $object) { 
           if ($object != "." && $object != "..") { 
             if (is_dir($dir."/".$object))
               rrmdir($dir."/".$object);
             else
               unlink($dir."/".$object); 
           } 
         }
         rmdir($dir); 
        } 
    }
}
