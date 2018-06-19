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
<p><small>{$updateLink}{$postCreatedAt}</small></p>
<h2>{$post['title']}</h2>
<div class="content" id="post">
{$post['content']}
<p class="right"><small>{$updateLink}{$postCreatedAt}</small></p>
</div>
<script>
$( document ).ready(function() {
    $("a.group").fancybox({
        'cyclic'    :   true,
        'titleShow' :   true
    });
});
</script>
<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["setCookieDomain", "*.hackergaucho.com.br"]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.mushape.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
heredoc;
$view->view('layout2', $data);
