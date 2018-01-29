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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<p class="left"><small>{$updateLink}{$postCreatedAt}</small></p>
<h2>{$post['title']}</h2>
<div class="content" id="post">
{$post['content']}
</div>
<div id="comments" class="center desktop">
<div class="fb-comments" data-href="{$_ENV['site_url']}{$shareLink}" data-numposts="5"></div>
</div>
heredoc;
$view->view('layout', $data);
