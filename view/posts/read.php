<?php
$data['title']=$post['title'];
$updateLink='';
$shareLink='/posts/'.urlencode($post['slug']).'/'.$post['id'];
if ($user) {
    $url=$shareLink.'?update';
    $updateLink='<a href="'.$url.'">Editar</a> | ';
}
$postCreatedAt=strftime("%d/%b/%Y %H:%M:%S", $post['created_at']);
$postCreatedAt=ucfirst($postCreatedAt);
$data['content']=<<<heredoc
<p class="center"><small>{$updateLink}{$postCreatedAt}</small></p>
<h2 class="center">{$post['title']}</h2>
<div id="addshare" class="center"></div>
<div class="content" id="post">
{$post['content']}
<p class="right"><small>{$updateLink}{$postCreatedAt}</small></p>
<div class="center">
    <a href="https://facebook.com/{$_ENV['fb_page']}" title="Ir para a Página" target="_blank">
        <img src="/images/560/curtir.png" alt="Ir para a Página" width="560" height="172" style="width:560px;height:auto;">
    </a>
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
