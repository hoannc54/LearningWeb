<?php

/**
 * Created by PhpStorm.
 * User: conghoan
 * Date: 07/06/2016
 * Time: 22:54
 */
class classA
{
    public $ta = 'Khuong Van Ngo';

    private static $tb;

    public function __construct(){}

    public static function getInstance(){

        if(!self::$tb){

            self::$tb = new classA();
        }

        return self::$tb;

    }

}

$s = classA::getInstance();
echo $s->ta;
$s->ta = 'VanKhuong777';

unset($s);

$s2 = classA::getInstance();

echo $s2->ta; // vankhuong777


$s3 = classA::getInstance();
echo $s3->ta;

$s4 = new ClassA();
echo '1';
echo $s4->ta;