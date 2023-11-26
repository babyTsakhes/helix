
<div class="container">

    <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
        <h2 class="text-center">Список тестов</h2>
   <div>
    <ul class="list">
   <?foreach ($tests as $test):?>
  
        <li><a href="onetest/?id=<?=$test['id']?>"><?=$test['title']?></a></li>
       
    <?endforeach?>
    <ul>
        </div>
        </div>
    </div>
        </div>
</div>
</body>