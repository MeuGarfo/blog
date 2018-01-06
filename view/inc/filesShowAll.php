<h2><?php print $title; ?></h2>
<p><a href="/files?create">Enviar arquivo</a></p>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filtrar pelo nome">
<?php
if (isset($files) && is_array($files) && count($files)>0) {
    print '<ul id="myUL">';
    foreach ($files as $key=>$file) {
        $fileRead='/file/'.$file;
        $fileDelete='javascript:postDelete(\''.$file.'\');';
        print '<li>';
        print ' <a class="fileDeleteLink" href="'.$fileDelete.'">Apagar</a> |';
        print ' <a href="'.$fileRead.'">'.$file.'</a>';
        print '</li>'.PHP_EOL;
    }
    print '</ul>';
} else {
    print 'Nenhum arquivo encontrado';
}
?>
<script type="text/javascript">
function postDelete(name){
    var url='/files?name='+name+'&delete';
    if(confirm("Apagar o arquivo \""+name+"\"?")){
        $.post(url, function(data, status){
            window.location.href = '/files';
        });
    }
}
function myFunction() {
    //https://www.w3schools.com/howto/howto_js_filter_lists.asp
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[1];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
