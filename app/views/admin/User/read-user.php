<body>
    
    <div class="container">
    <dl class="row">
  <dt class="col-sm-3">id</dt>
  <dd class="col-sm-9"><?= $user['id'] ?></dd>

  <dt class="col-sm-3">name</dt>
  <dd class="col-sm-9"><?= $user['name'] ?></dd>

  <dt class="col-sm-3">login</dt>
  <dd class="col-sm-9"><?= $user['login'] ?></dd>

  <dt class="col-sm-3 text-truncate">role</dt>
  <dd class="col-sm-9"><strong><h5><?= $user['role'] ?></h5></strong></dd>
</dl>
    </div>
</body>