<?php
$data['title']=$_ENV['site_name'];
$data['content']=$view->out('inc/homeRead', $data, false);
$view->view('layout', $data);
