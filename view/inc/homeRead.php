<p>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar post">
</p>
<?php
if (isset($posts) && is_array($posts) && count($posts)>0) {
    print '<ul class="lista" id="myUL">';
    foreach ($posts as $post) {
        $postRead='/posts/'.$post['slug'].'/'.$post['id'];
        $postCreatedAt=strftime("%d/%b/%Y %H:%M", $post['created_at']);
        $postCreatedAt=ucfirst($postCreatedAt);
        print '<li>';
        print '<a href="'.$postRead.'">';
        print '<small>'.$postCreatedAt.'';
        print '</small><br>'.$post['title'];
        print '</a></li>'.PHP_EOL;
    }
    print '</ul>';
} else {
    print 'Nenhum post encontrado';
}
?>
<script>
function myFunction() {
    //https://www.w3schools.com/howto/howto_js_filter_lists.asp
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
