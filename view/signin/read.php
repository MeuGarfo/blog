<?php
$data['title']='Login';
$data['content']=$view->view('inc/signinRead', $data, false);
$view->view('layout', $data);
