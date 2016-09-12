<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App;
$pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);

$app->get('/', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
    require 'views/main.php';
});

$app->get('/product_info', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) use ($pdo){
    $statement = $pdo->select()->from('products');
    $res = $statement->execute();
    $data = $res->fetchAll();

    return $response->withJson($data);
});

$app->post('/vk_img', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
    //Авторизация приложения: https://oauth.vk.com/authorize?client_id=5625997&display=page&redirect_uri=https://oauth.vk.com/blank&scope=wall,photos&response_type=token&v=5.53
    $token = 'd48d5cfee372e9395ef673d22726237e20dbca940b376acf937adb44bce6730500f769f9d039ccf514556';

    $options = array(

    );

    function vkRequest($method, $options = array(), $token = '')
    {
        $params = http_build_query($options);
        $url = 'https://api.vk.com/method/'.$method.'?'.$params.'&access_token='.$token.'&v=5.53';
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
//Получаем адрес сервера для загрузки фото
    $upload_serv = vkRequest('photos.getWallUploadServer', $options, $token);
    $upload_serv = json_decode($upload_serv, true);
//    echo "<pre>";
//    print_r($upload_serv);
    $upload_url = $upload_serv['response']['upload_url'];

    $file = './img/'.basename($_FILES['picture']['name']);
    copy($_FILES['picture']['tmp_name'], $file);
    $pict = 'D:\OpenServer\domains\HW8\img\/'.$_FILES['picture']['name'];

//Собираем запрос для передачи файла на сервер
    $ch = curl_init($upload_url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'photo' => new CURLFile($pict, null, $_FILES['picture']['name'])
    ));
    $upload = curl_exec($ch);
    curl_close($ch);
    $upload = json_decode($upload);
    stripslashes($upload->photo);
/*    echo "<pre>";
    print_r($upload->photo);
    echo "<br>";*/
//Cохраняем все это дело
    $saveOptions = array(
        'server' => $upload->server,
        'photo' => $upload->photo,
        'hash' => $upload->hash
    );
    $save = vkRequest('photos.saveWallPhoto', $saveOptions, $token);
    $save = json_decode($save);
    stripslashes($save->photo);
    /*echo "<pre>";
    print_r($save);*/
// Постим на страницу
    $wallOptions = array(
        'owner_id' => $_POST['user_id'],
        'attachments' => 'photo'.$save->response[0]->owner_id.'_'.$save->response[0]->id,
        'message' => 'Не обращай внимания, это просто мое дз'
    );
    $wall = vkRequest('wall.post', $wallOptions, $token);
    $wall = json_decode($wall);
//    echo "<pre>";
//    print_r($wall);
    if ($wall->error->error_code == 214)
    {
        echo 'У этого пользователя стена закрыта для записи'."<a href='/'>назад</a>";
    }
    elseif ($wall->response)
    {
        echo 'ЦЗбс'."<a href='/'>назад</a>";
    }

});

$app->run();
