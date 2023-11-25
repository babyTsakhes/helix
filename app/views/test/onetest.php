

  
<div class="container">
    <div class="px-4 py-5 my-5 text-center">
    <h3 class="display-8 fw-bold text-body-emphasis"> <p>Добро пожаловать, <?=$username?>!</p></h3>
    <h3 class="display-10 fw-bold text-body-emphasis"> <p>Пройдите "<?=$test['title']?>" .</p></h1>
    </div>
  </div>
            <form action="/test/result?id=<?=$test['id']?>" method="post">
                <input type="hidden" name="q" value="0">
                <?foreach ($questions as $q):?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        
                        <div class="text-center mt-5">
                            <p>Вопрос <?php echo $q['id'] . ' из ' . $questionCount; ?></p>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3><?php echo $q['question']; ?></h3>
                            </div>
                            <div class="card-body">
                                <?foreach ($answers as $ans): ?>
                                    
                                    
                                    <?if($ans['question_id'] == $q['id']):?>
                                    <div>
                                        <input type="radio" name="<?=$q['id']?>" required value="<?php echo $ans['score']; ?>"> <?php echo $ans['answer']; ?>
                                    </div>
                                    <?endif;?>
                                <?endforeach;?>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <?endforeach;?>
                <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success">Получить результат</button>
                        </div>
            </form>
 
           
       
    </div> 