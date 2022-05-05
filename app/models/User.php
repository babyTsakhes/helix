<?
namespace app\models;
use fw\core\base\Model;

class User extends Model{
    public $attributes = [
        'login'=>'',
        'password'=>'',
        'email'=>'',
        'name'=>'',
        'role'=>'user'
    ];

    public $rules = [
        'required'=> [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email'=>[
            ['email'],
        ],
        'lengthMin'=>[
            ['password',6],
        ]
    ];
}