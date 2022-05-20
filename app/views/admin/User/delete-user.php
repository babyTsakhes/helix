<body>
    <div class="container"><?//debug($user,1)?>
        <h2>delete user</h2>

        <div class="row">
            <div class="col-md-6">
<form method="post" action="/admin/user/delete-user?id=<?=$user->id?>">
<div class="form-group">
                <label for="comment">comments for deleting</label>
                <textarea type="text" name="comment" class="form-control" id="comment" placeholder="comment" value="<?= $user->comment ?>"></textarea>
</div>
            <button type="submit" class="btn btn-success">Удалить пользователя</button>
</form>

</div>
    </div>
</body>