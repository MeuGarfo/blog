<?php
$data['title']=$post['title'];
$updateLink='';
$shareLink='/posts/'.$post['slug'].'/'.$post['id'];
if ($user) {
    $url=$shareLink.'?update';
    $updateLink='<a href="'.$url.'">Editar</a> | ';
}
$postCreatedAt=strftime("%d/%b/%Y %H:%M:%S", $post['created_at']);
$postCreatedAt=ucfirst($postCreatedAt);
$data['content']=<<<heredoc
<p class="right"><small>{$updateLink}{$postCreatedAt}</small></p>
<h2>{$post['title']}</h2>
<div class="content" id="post">
{$post['content']}
<p class="right"><small>{$updateLink}{$postCreatedAt}</small></p>
<div class="center">
<h3>Dúvidas ou sugestões?</h3>
    <a href="https://facebook.com/groups/{$_ENV['fb_group']}" title="Ir para o Grupo">
        <img src="/images/560/facebook.png" alt="facebook.png">
    </a><br>
    <small>
    <a href="https://facebook.com/groups/{$_ENV['fb_group']}">
        https://facebook.com/groups/{$_ENV['fb_group']}
    </a>
    </small>
<p>
    <a href="/">Início</a>
</p>
<h3>Gostou? Compartilhe</h3>
</div>
</div>
heredoc;
$view->view('layout', $data);
