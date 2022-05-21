<body>
    <div class="container">
    <div class="row">
            <div class="col-md-6">
                <form method="post" action="/admin/template/index"">
        <div class=" form-group">
                    <label for="role">Выберите шаблон который хотите установить</label>
                    <select name="temp_code" id="temp_code" class="form-select" aria-label="Default select example">
                    <?foreach($lays as $k => $l):?>    
                    <option value="<?=$l?>" >  <?=$l?></option>
                    <?endforeach;?>
                    </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
