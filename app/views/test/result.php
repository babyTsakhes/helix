<div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3><?=$username?>, ваш результат:</h3>
                        </div>
                        <div class="card-body">
                            <div class="result-print">
                                <?php foreach($result as $res ) echo $res['result']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>