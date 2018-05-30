<?php
$data['title']='Erro';
$error='Erro desconhecido';//unknown_error
switch ($errors[0]) {
    case 'invalid_extension':
    $error='Extensão inválida';
    break;
    case 'invalid_size':
    $error='Este arquivo é grande demais';
    break;
}
$data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p>{$error}</p>
<p><a href="/files?create">Voltar</a></p>
heredoc;
$view->view('layout', $data);
