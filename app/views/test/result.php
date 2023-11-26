<div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3><?=$username?>, ваш результат:</h3>
                        </div>
                        <div class="card-body" >
                            <div class="result-print">
                                <?php foreach($result as $r ) echo $r['result']; ?>
                            </div>
                        </div>
                        <?if($res):?>
                            <?for($i = 0; $i < 5; $i++):?>
                            <div class="card-subtitle mb-2 text-muted">
                            <h5><?=$titles[$i]?></h5>
                        </div>
                        <div class="card-body">
                            <div class="result-print">
                                <?if($res[$i]>= 14):?>
                                    Высокий
                                <?elseif($res[$i]<14 && $res[$i]>= 8):?>
                                    Средний
                                <?else:?>
                                    Низкий
                                <?endif;?>
                            </div>
                        </div>
                        <?endfor;?>
                        <?endif;?>
                    </div>
                </div>
            </div>