<h2><?php print $title; ?></h2>
<form action="/files?create" enctype="multipart/form-data" method="post">
    <input name="file" type="file">
    <button type="submit"><?php print $title; ?></button>
</form>
