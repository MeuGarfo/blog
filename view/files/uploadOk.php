<?php
$data['title']='Sucesso';
if ($file['is_image']) {
    $data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p><a href="/files/?create">Enviar outro arquivo</a></p>
<textarea rows="3">
<div class="center">
    <a class="group" rel="group" href="/images/cover/{$file['name']}" title="{$file['name']}">
        <img src="/images/560/{$file['name']}" alt="{$file['name']}">
    </a><br>
    <small></small>
</div>
</textarea>
heredoc;
} else {
    $data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p><a href="{$url}">{$url}</a></p>
heredoc;
}
$view->view('layout', $data);
