<h2>Вход в аккаунт</h2>
<div class="row ">
    <div class = "col-md-6">
        <form method="post" action = "/user/login">
        <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['formData']['login']) ? ($_SESSION['formData']['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Вход</button>
        </form>

    </div>

</div>