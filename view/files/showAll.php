<?php
$data['title']='Arquivos';
$data['content']=$view->view('inc/filesShowAll', $data, false);
$view->view('layout', $data);
