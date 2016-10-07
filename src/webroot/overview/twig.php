<?php
namespace Poppy\TemplateStudy;
$rootDir = realpath(__DIR__.'/../../..');
require $rootDir.'/src/vendor/autoload.php';
use Poppy\TemplateStudy\Entity\User;
use Poppy\TemplateStudy\Def;

$renderer = new \Twig_Environment(new \Twig_Loader_Filesystem($rootDir.'/src/templates'),
    [
        'debug'=>true,
        //'cache'=>$rootDir.'/tmp/cache/templates/twig',
        'cache'=>false,
    ]
);
$renderer->addExtension(new \Twig_Extension_Debug());
// クラスフィールド、クラスメソッドにアクセスするため
$renderer->addFunction('staticCall', new \Twig_SimpleFunction('staticCall', function ($class, $functionName, $args=[]) {
    return call_user_func_array([$class, $functionName], $args);
}));


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
$body = $renderer->render('overview/index.twig', $data);
echo $body;

