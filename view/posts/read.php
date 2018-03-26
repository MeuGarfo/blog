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
    <a href="https://facebook.com/{$_ENV['fb_page']}" title="Ir para a Página" target="_blank">
        <img src="/images/560/curtir.png" alt="Ir para a Página" width="560" height="172" style="width:560px;height:auto;">
    </a><br>
    <small>
    <a href="https://facebook.com/{$_ENV['fb_page']}" target="_blank">
        Ir para página no Facebook
    </a>
    </small>
<p>
    <a href="/">Início</a>
</p>
<h3>Compartilhe este post</h3>
</div>
</div>
<script>
$( document ).ready(function() {
    $("a.group").fancybox({
        'cyclic'    :   true,
        'titleShow' :   true
    });
});
</script>
heredoc;
$view->view('layout', $data);
