<?php
namespace app\controller;

use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class Feeds
{
    public $db;
    public $auth;
    public $view;
    public function index($method)
    {
        $this->db=require_once ROOT.'db.php';
        $this->get();
    }
    public function get()
    {
        /*VARs*/
        $title=$_ENV['site_name'];
        $description=$_ENV['site_description'];
        $siteUrl=$_ENV['site_url'];
        $feedUrl=$siteUrl.'/feed';
        $siteLanguage='pt-BR';
        //https://github.com/suin/php-rss-writer
        $feed = new Feed();
        $channel = new Channel();
        $channel
        ->title($title)
        ->description($description)
        ->url($siteUrl)
        ->feedUrl($feedUrl)
        ->language($siteLanguage)
        ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
        ->ttl(60)
        ->appendTo($feed);
        $where['AND']=[
            "id[>=]" => 1,
            "online"=>1
        ];
        $where['LIMIT']=5;
        $where['ORDER']=[
            'created_at'=>'DESC'
        ];
        $posts=$this->db->select("posts", "*", $where);
        /*RULEs*/
        if ($posts) {
            foreach ($posts as $post) {
                $postUrl='/posts/'.$post['slug'].'/'.$post['id'];
                $item = new Item();
                $description=strip_tags($post['description']);
                $description=htmlentities($description);
                $item
                ->title($post['title'])
                ->description($description)
                ->url($siteUrl.$postUrl)
                ->pubDate($post['created_at'])
                ->appendTo($channel);
            }
        }
        header('Content-Type: text/xml;charset=UTF-8');
        echo $feed;
    }
}
