<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');
$view=new Basic\View();
$segment=$view->segment();
$method=@$_SERVER['REQUEST_METHOD'];
switch (@$segment[0]) {
    /*feed*/
    case 'feed':
    $controller=new app\controller\Feeds();
    $controller->index($method);
    break;
    /*files*/
    case 'files':
    $controller=new app\controller\Files();
    $controller->index($method);
    break;
    /*home*/
    case '/':
    $controller=new app\controller\Home();
    $controller->index($method);
    break;
    /*images*/
    case 'images':
    $controller=new app\controller\Images();
    $controller->index($method);
    break;
    /*logout*/
    case 'logout':
    $controller=new app\controller\Logout();
    $controller->index($method);
    break;
    /*posts*/
    case 'posts':
    $controller=new app\controller\Posts();
    $controller->index($method);
    break;
    /*signin*/
    case 'signin':
    $controller=new app\controller\Signin();
    $controller->index($method);
    break;
    /*404*/
    default:
    $data['view']=$view;
    $view->view('404', $data);
    break;
}
