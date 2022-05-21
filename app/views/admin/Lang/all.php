<body>
    <div class="container">
    <div class="row">
            <div class="col-md-6">
                <form method="post" action="/admin/lang/all"">
        <div class=" form-group">
                    <label for="role">Выберите файл какого языка вы хотите редактировать</label>
                    <select name="lang_code" id="lang_code" class="form-select" aria-label="Default select example">
                        <option value="en" >en</option>
                        <option value="ru" >ru</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
        <h2>Редактировать языковые файлы</h2>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="/admin/lang/change-word">
                <? foreach ($words as $k => $w) : ?>
                    <div class="form-group">
                        <label for="<?= $k ?>"><?= $k ?></label>
                        <input type="text" name="<?= $k ?>" class="form-control" id="<?= $k ?>" placeholder="<?= $k ?>" value="<?= $w ?>">
                    </div>
                <? endforeach; ?>
                <button type="submit" class="btn btn-success">Изменить языковые файлы</button>
            </form>

        </div>
    </div>
</body>