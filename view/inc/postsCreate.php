<form action="/posts/?<?php print $method; ?>" method="post" id="postCreate">
    <?php
    if ($method=='update') {
        print '<input type="hidden" name="id" value="'.$post['id'].'" />';
    }
    ?>
    <input type="text" name="title" maxlength="60" id="title" tabindex="1" value="<?php print @$post['title']; ?>" placeholder="Titulo">
    <input type="text" name="description" maxlength="78" tabindex="1" value="<?php print @$post['description']; ?>" placeholder="Descrição">
    <input type="text" name="cover" tabindex="1" value="<?php print @$post['cover']; ?>" placeholder="Imagem de exibição">
    <input type="hidden" name="category_id" value="1">
    <div class="btn-group" id="toolbar">
        <button type="button" id="h2" onclick="editor(this.id)">h2</button>
        <button type="button" id="h3" onclick="editor(this.id)">h3</button>
        <button type="button" id="italic" onclick="editor(this.id)">i</button>
        <button type="button" id="insertOrderedList" onclick="editor(this.id)">ol</button>
        <button type="button" id="insertUnorderedList" onclick="editor(this.id)">ul</button>
        <button type="button" id="justifyCenter" onclick="editor(this.id)">center</button>
        <button type="button" id="InsertImage" onclick="editor(this.id)">img</button>
        <button type="button" id="CreateLink" onclick="editor(this.id)">a</button>
        <button type="button" id="CreateTable" onclick="editor(this.id)">table</button>
        <button type="button" id="html" onclick="editor(this.id)">html</button>
    </div>
    <div class="well content" id="editor" contenteditable="true" tabindex="2"><?php print @$post['content'];?></div>
    <input type="hidden" name="content" id="content">
    <select name="online">
        <option value="1" <?php if (@$post['online'] == '1') {
        print 'selected';
    }?>>Online</option>
        <option value="0" <?php if (@$post['online'] == '0') {
        print 'selected';
    }?>>Offline</option>
        <option value="2" <?php if (@$post['online'] == '2') {
        print 'selected';
    }?>>Oculto</option>
    </select>
    <div class="btn-group">
        <input type="submit" value="<?php print $title; ?>" tabindex="3">
    </div>
</form>
<script type="text/javascript">
$(function(){
    $('#title').focus();
    $('#postCreate').on('submit',function(){
        if(!showSource){
            editor('html');
        }
        $('#content').attr('value', $('#editor').html());
    });
});
</script>
