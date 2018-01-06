<?php
if ($method=='create') {
    $data['title']='Criar post';
} else {
    $data['title']='Atualizar post';
}
$data['content']=$view->view('inc/postsCreate', $data, false);
$view->view('layout', $data);
