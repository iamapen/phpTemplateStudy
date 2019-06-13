<?php
namespace Poppy\TemplateStudy;
$rootDir = realpath(__DIR__.'/../../..');
require $rootDir.'/src/vendor/autoload.php';
use Poppy\TemplateStudy\Entity\User;
use Poppy\TemplateStudy\Def;

$view = new \Poppy\TemplateStudy\PurePhp\View($rootDir.'/src/templates');

$stringVar = '文字列の変数です。';
$htmlString = '<b>太字</b>';
$arr1 = ['A', 'B', 'C', 'D' ,'E'];
$arr2 = ['key1'=>'val1', 'key2'=>'val2', 'key3'=>'val3'];
$user = new User('アラレ', '則巻', 'ペンギン村モモンガ1番地', Def\Gender::FEMALE);

$data = [
    'var' => $stringVar,
    'htmlString' => $htmlString,
    'arr1' => $arr1,
    'arr2' => $arr2,
    'user'=>$user,
];
$body = $view->render('overview/pure.php', $data, 'layouts/default.php');
echo $body;
