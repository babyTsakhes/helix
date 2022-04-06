<?php
namespace app\controllers;

class Main extends App{

    public $layout = 'main';

    public function indexAction(){
        $this->layout = "test";
        $name = "Ann";
        $greetings = "Hi,dear";
        $colors = ['white','green','yellow'];
        $this->set(compact('name','greetings','colors'));
        echo "Main::index";
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}