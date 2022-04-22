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