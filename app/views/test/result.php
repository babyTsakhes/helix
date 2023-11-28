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
                            <?$count = ($testid == 3) ? 5 : 3;
                            ?>
                            <?for($i = 0; $i < $count; $i++):?>
                            <div class="card-subtitle mb-2 text-muted">
                            <h5><?=$titles[$i]?></h5>
                        </div>
                        <div class="card-body">
                            <div class="result-print">
                                <?if($testid == 3):?>
                                    <?if($res[$i]>= 14 && $i == 1):?>
                                        Высокий
                                    <?elseif($res[$i]<14 && $res[$i]>= 8):?>
                                        Средний
                                    <?else:?>
                                        Низкий
                                    <?endif;?>
                                <?elseif($testid == 4):?>
                                    <?if($i == 0):?>
                                        <?if($res[$i]>= 65):?>
                                        Высокий
                                        <?elseif($res[$i]<65 && $res[$i]>= 40):?>
                                        Cредний показатель с тенденцией к высокому
                                        <?elseif($res[$i]<40 && $res[$i]>= 25):?>
                                        Cредний показатель с тенденцией к низкому
                                        <?else:?>
                                        Низкий
                                        <?endif;?>
                                

                                    <?elseif($i == 1):?>
                                        <?if($res[$i]>= 45):?>
                                        Высокий
                                        <?elseif($res[$i]<45 && $res[$i]>= 30):?>
                                        Cредний показатель с тенденцией к высокому
                                        <?elseif($res[$i]<30 && $res[$i]>= 15):?>
                                        Cредний показатель с тенденцией к низкому
                                        <?else:?>
                                        Низкий
                                        <?endif;?>

                                    <?elseif($i == 2):?>
                                        <?if($res[$i]>= 25):?>
                                        Высокий
                                        <?elseif($res[$i]<25 && $res[$i]>= 18):?>
                                        Cредний показатель с тенденцией к высокому
                                        <?elseif($res[$i]<18 && $res[$i]>= 10):?>
                                        Cредний показатель с тенденцией к низкому
                                        <?else:?>
                                        Низкий
                                        <?endif;?>
                                    <?endif;?>

                                
                                <?endif;?>
                            </div>
                        </div>
                        <?endfor;?>
                        <?endif;?>
                    </div>
                </div>
            </div>