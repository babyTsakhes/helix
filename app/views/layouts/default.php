<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?

use fw\core\base\View;

 View::getMeta();?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <ul>
      <li><a href="/admin"><?__('Admin')?></a></li>
      <li><a href="/user/signup"><?__('Signup')?></a></li>
      <li><a href="/user/login"><?__('Login')?></a></li>
      <li><a href="/user/logout"><?__('Logout')?></a></li>
    </ul>
    
    <? if(isset($_SESSION['error'])):?>
      <div class = "alert alert-danger">

        <?=$_SESSION['error'];?>
        <? unset($_SESSION['error'])?>
       
      </div>
      <?endif;?>

      <? if(isset($_SESSION['success'])):?>
      <div class = "alert alert-success">
        <?=$_SESSION['success'];?>
        <? unset($_SESSION['success'])?>
      </div>
      <?endif;?>
    <p><?=$content?></p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <? foreach($scripts as $script)
      echo $script;?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <? new fw\widgets\language\Language()?>
  </body>
  
</html>