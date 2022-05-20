<body>
    <div class="container">
        <h2>All languages</h2>

        <div class="row">
            <div class="col-md-6">
<form method="post" action="/admin/lang/change-word">
    <?foreach ($words as $k => $w):?>
<div class="form-group">
                <label for="<?=$k?>"><?=$k?></label>
                <input type="text" name="<?=$k?>" class="form-control" id="<?=$k?>" placeholder="<?=$k?>" value="<?=$w?>">
</div>
<?endforeach;?>
            <button type="submit" class="btn btn-success">Изменить языковые файлы</button>
</form>

</div>
    </div>
</body>