<?php
if (!isset($_ENV['site_name'])) {
    $filename=ROOT."app/.env";
    if (file_exists($filename)) {
        $dotenv = new Dotenv\Dotenv(ROOT."app");
        $dotenv->load();
        $dbConfig=require_once ROOT."db.php";
        $Migration=new Basic\Migration($dbConfig);
    } else {
        die("cp example.env app/.env");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/bower_components/1k/dist/1k.min.css">
    <link rel="stylesheet" href="/asset/css/main.css">
    <script src="/asset/js/main.js"></script>
    <script src="/asset/js/zepto.min.js"></script>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed/" />
    <meta property="og:site_name" content="<?php print $_ENV['site_name']; ?>">
    <meta property="og:title" content="<?php print $title; ?>">
    <link rel="apple-touch-icon" href="/file/logo180.png" sizes="180x180">
    <link rel="icon" href="/file/logo32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/file/logo16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="<?php print $_ENV['site_url'];?>/favicon.ico" type="image/x-icon">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@<?php print $_ENV['twitter_site'];?>" />
    <meta name="twitter:creator" content="@<?php print $_ENV['twitter_creator'];?>" />
    <meta name="twitter:title" content="<?php print $title; ?>" />
    <meta property="og:url" content="<?php
    if (isset($post)) {
        $url=$_ENV['site_url'].'/posts/'.$post['slug'].'/'.$post['id'];
    } else {
        $url=$_ENV['site_url'];
    }
    print $url;
    ?>">
    <?php
    if (isset($post)) {
        $description=$post['description'];
    } else {
        $description=$_ENV['site_description'];
    }?><meta property="og:description" content="<?php print $description;?>">
    <meta name="twitter:description" content="<?php print $description;?>" />
    <?php
    if (isset($post['cover']) && !empty($post['cover'])) {
        $cover=$_ENV['site_url'].$post['cover'];
    } else {
        $cover=$_ENV['site_url'].$_ENV['site_logo'];
    }?><meta property="og:image" content="<?php print $cover;?>">
    <meta name="twitter:image" content="<?php print $cover;?>" />
</head>
<body>
    <div class="c">
        <div class="r">
            <div class="g12 center">
                <h1><?php print $_ENV['site_name'];?></h1>
            </div>
        </div>
        <div class="r">
            <div class="g2 center">
                <script type="text/javascript">
                var hide=true;
                function showMenu(){
                    if(hide){
                        hide=false;
                        $('.hamburguer').html('X Menu');
                    }else{
                        hide=true;
                        $('.hamburguer').html('&#x2630; Menu');
                    }
                    $('#menuPrincipal').toggle();
                }
                </script>
                <small>
                    <a href="javascript:showMenu();" class="hamburguer">
                        &#x2630; Menu
                    </a>
                </small>
                <ul id="menuPrincipal" class="lista">
                    <li><a href="/">Início</a></li>
                    <li><a href="https://facebook.com/<?php print $_ENV['facebook'];?>">Facebook</a></li>
                    <li><a href="https://github.com/<?php print $_ENV['github'];?>">Github</a></li>
                    <li><a href="https://twitter.com/<?php print $_ENV['twitter_site'];?>">Twitter</a></li>
                    <li><a href="https://pinterest.com/<?php print $_ENV['pinterest'];?>">Pinterest</a></li>
                    <li><a href="/feed">RSS</a></li>
                    <?php
                    if (isset($user) && is_array($user)) {
                        $view->out('inc/leftAuthPrivate', $data);
                    } else {
                        $view->out('inc/leftAuthPublic', $data);
                    }
                    ?>
                </ul>
            </div>
            <div class="g10">
                <?php print $content; ?>
            </div>
        </div>
    </div>
</body>
</html>
