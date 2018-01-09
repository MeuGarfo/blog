<?php
$data['title']=$post['title'];
$updateLink='';
if ($user) {
    $url='/posts/'.$post['slug'].'/'.$post['id'].'?update';
    $updateLink='<a href="'.$url.'">Editar</a> | ';
}
$postCreatedAt=strftime("%d/%b/%Y %H:%M", $post['created_at']);
$postCreatedAt=ucfirst($postCreatedAt);
$data['content']=<<<heredoc
<p class="left"><small>{$updateLink}{$postCreatedAt}</small></p>
<h2>{$post['title']}</h2>
<div class="content">
{$post['content']}
</div>
heredoc;
$view->view('layout', $data);
