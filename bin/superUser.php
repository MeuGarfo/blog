<?php
$db=require_once '../db.php';
$user['name']=$_ENV['su_name'];
$user['email']=$_ENV['su_email'];
$user['password']=$_ENV['su_password'];
$user['type']='super';
if ($db->get('users', '*', ['email'=>$user['email']])) {
    $user['password']=password_hash($user['password'], PASSWORD_DEFAULT);
    $where=[
        'email'=>$user['email']
    ];
    unset($user['email']);
    $db->update('users', $user, $where);
    print 'nome e senha atualizados com sucesso'.PHP_EOL;
} else {
    $auth=new Basic\Auth($db);
    $user=$auth->signup($user);
    if (isset($user['error'])) {
        print 'erro ao criar super usuário:'.PHP_EOL;
        var_dump($user);
    } else {
        print 'super usuário criado com sucesso.'.PHP_EOL;
    }
}
