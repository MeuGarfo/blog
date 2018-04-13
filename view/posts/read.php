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
<div class="center">
<h3>Compartilhe</h3>
<div class="share"></div>
</div>
<div class="content" id="post">
{$post['content']}
<p class="right"><small>{$updateLink}{$postCreatedAt}</small></p>
<div class="center">
    <a href="https://facebook.com/{$_ENV['fb_page']}" title="Ir para a Página" target="_blank">
        <img src="/images/560/curtir.png" alt="Ir para a Página" width="560" height="172" style="width:560px;height:auto;">
    </a>
<h3>Compartilhe</h3>
<div class="share"></div>
<h3>Deixe seu comentário</h3>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://hackergaucho.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Por favor, habilite o JavaScript para visualizar os <a href="https://disqus.com/?ref_noscript">comentários do Disqus</a></noscript>
                           
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
