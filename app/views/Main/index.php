<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Framework</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Categories</a></li>
      <?foreach ($menu as $category):?>
      <li><a href="#"><?=$category->title?></a></li>
      <?endforeach;?>
    </ul>
  </div>
</nav>

<div class="container>
<?php if(!empty($posts)):?>
        <?foreach($posts as $post):?>
                <div class = "panel panel-default">
                        <div class="panel-heading"><?=$post->title;?></div>
                        <div class="penel-body"><?=$post->text;?></div>
                </div>
                <?endforeach;?>
        <?endif;?>

</div>


