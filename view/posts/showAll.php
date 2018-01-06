<?php
$data['title']='Posts';
$data['content']=$view->view('inc/postsShowAll', $data, false);
$view->view('layout', $data);
