
<main role="main">
<div id = "answer">hgf</div>
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Album example</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">
<button class="btn btn-default" id='send'>Кнопка</button>
    <div class="row">
    <?php if(!empty($posts)):?>
        <?foreach($posts as $post):?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
        <p class="card-text"><?=$post->title;?></p>
          <div class="card-body">
            <p class="card-text"><?=$post->text;?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>

      <?endforeach;?>
        <?endif;?>
    </div>
  </div>
</div>

</main>
<script>
     $(function(){
      $('#send').click(function(){
        $.ajax({
          url:'/main/test',
          type:'post',
          data:{'id':2},
          success:function(res){
             var data = JSON.parse(res);
            $('#answer').html('<p> Response: ' + data.answer + ' Code: '+ data.code +'</p>');
          },
          error:function(){
            console.log('Error');
          }
        });
      });
     });
    </script>
    