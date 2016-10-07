<?php
namespace Poppy\TemplateStudy\Def;

class Gender {
    const MALE = '1';
    const FEMALE = '2';
    const UNKNOWN = '3';

    static private $genderList = [
        self::MALE => '男性',
        self::FEMALE => '女性',
        self::UNKNOWN => 'その他',
    ];
    static public function getGenderList() {
        return self::$genderList;
    }
    static public function getGenderLabel($id) {
        if(array_key_exists($id, self::$genderList)) {
            return self::$genderList[$id];
        }
        return null;
    }
}