<?php
$data['title']='Entrar';
$data['content']=$view->view('inc/signinRead', $data, false);
$view->view('layout', $data);
