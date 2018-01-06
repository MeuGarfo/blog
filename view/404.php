<?php
$data['title']='Erro 404';
$data['content']=<<<heredoc
<h1>{$data['title']}</h1>
Página não encontrada.
heredoc;
die($view->view('layout', $data));
