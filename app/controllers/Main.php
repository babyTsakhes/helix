<?php
namespace app\controllers;

class Main extends App{

    public $layout = 'main';

    public function indexAction(){
        
        echo "Main::index";
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}