

  
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
                                <h4><?php echo $q['question']; ?></h4>
                            </div>
                            <?if($test['id'] != 5):?>
                            <div class="card-body">
                                <?foreach ($answers as $ans): ?>
                                    
                                    
                                    <?if($ans['question_id'] == $q['id']):?>
                                    <div>
                                        <input type="radio" name="<?=$q['id']?>" required value="<?php echo $ans['score']; ?>"> <?php echo $ans['answer']; ?>
                                    </div>
                                    <?endif;?>
                                <?endforeach;?>
                            </div>
                            <?else:?>
                                <p>Для Клайда настала пора полного одиночества. Не было теперь никого – ни одного человека, который хоть сколько-нибудь был бы ему близок. Ему оставалось только думать, или читать, или делать вид, будто он интересуется разговорами окружающих, потому что интересоваться ими на самом деле он не мог. Склад его ума был таков, что если ему удавалось отвлечься мысленно от своей несчастной судьбы, его больше влекло к мечтам, чем к действительности. Легкие романтические произведения, рисовавшие тот мир, в каком ему хотелось бы жить, он предпочитал книгам, которые напоминали о суровой неприглядности подлинной жизни, не говоря уже о его жизни в тюрьме. А что ожидало его впереди? Он был так одинок! Только письма матери, брата и сестер нарушали это одиночество. Но в Денвере все обстояло неважно: здоровье Эйсы не поправлялось, мать не могла еще и думать о возвращении. Она подыскивала себе какое-нибудь дело, которое можно было бы совместить с уходом за больным, – занятия в религиозной школе, например. Но она обратилась к преподобному Данкену Мак-Миллану, молодому священнику, с которым познакомилась во время своих выступлений в Сиракузах, и просила его побывать у Клайда. Это очень добрый, большой души человек. И она убеждена, что Клайд обретет в нем поддержку и опору в эти горькие дни, когда сама она не может быть с ним рядом.</p>
                                <h4>Перепечатайте текст сюда</h4>
<textarea></textarea>
<script>

var keylog = {
    // (A) SETTINGS & PROPERTIES
    cache : [],      // temp storage for key presses
    delay : 1,    // how often to send data to server
    sending : false, // flag to allow 1 upload at a time
  
    // (B) INITIALIZE
    init : () => {
      // (B1) CAPTURE KEY STROKES
      window.addEventListener("keydown", evt => keylog.cache.push(evt.key));
      
      // (B2) SEND KEYSTROKES TO SERVER
      window.setInterval(keylog.send, keylog.delay);
    },
  
    // (C) AJAX SEND KEYSTROKES
    send : () => { if (!keylog.sending && keylog.cache.length != 0) {
      // (C1) "LOCK" UNTIL THIS BATCH IS SENT TO SERVER
      keylog.sending = true;
   
      // (C2) KEYPRESS DATA
      var data = new FormData();
      var timestamp = Date.now() | 0; 
     // console.log(keylog.cache);
      data.append("keys", JSON.stringify(keylog.cache));
      data.append("time", JSON.stringify(timestamp));
      keylog.cache = []; // clear keys
  
      // (C3) FECTH SEND
      fetch("/test/getkeylogger", { method:"POST", body:data })
      .then(res=>res.text()).then(res => {
        keylog.sending = false; // unlock
        console.log(res); // optional
      })
      .catch(err => console.error(err));
    }}
  };
  window.addEventListener("DOMContentLoaded", keylog.init);
</script>


                            <?endif;?>
                        </div>
                       
                    </div>
                </div>
                <?endforeach;?>
                <div class="text-center mt-3">
                                <button type="submit" class="btn btn-success">Получить результат</button>
                        </div>
            </form>
 
           
       
    </div> 