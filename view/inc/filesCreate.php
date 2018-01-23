<h2><?php print $title; ?></h2>
<form action="/files?create" enctype="multipart/form-data" method="post">
    <input id="file" name="file" type="file">
    <button type="submit"><?php print $title; ?></button>
</form>
<script type="text/javascript">
function send_data() {
    document.forms[0].submit();
}
window.onload = function(){
    var input = document.getElementById('file');
    input.onchange = send_data;
}
</script>
