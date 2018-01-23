<?php
$data['title']='Sucesso';
if ($file['is_image']) {
    $data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p><a href="/files/?create">Enviar outro arquivo</a></p>
<textarea rows="3">
    <a href="/images/cover/{$file['name']}" title="Ver o original">
        <img src="/images/400/{$file['name']}" alt="{$file['name']}">
    </a>
</textarea>
heredoc;
} else {
    $data['content']=<<<heredoc
<h2>{$data['title']}</h2>
<p><a href="{$url}">{$url}</a></p>
heredoc;
}
$view->view('layout', $data);
