<?php

class Animal {

    public $name;
    public $age;
    public $sex;

    function run() {
        echo 'run';
    }

}

$dog = new Animal();
$dog->name = 'dog';
var_dump($dog);
var_dump($dog->name);
$dog->run();


