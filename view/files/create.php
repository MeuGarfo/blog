<?php
$data['title']='Enviar arquivo';
$data['content']=$view->out('inc/filesCreate', $data, false);
$view->view('layout', $data);
