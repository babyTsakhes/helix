<h2>Регистрация</h2>

<div class="row">
    <div class = "col-md-6">
        <form method="post" action="/user/signup">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['formData']['login']) ? h($_SESSION['formData']['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?=isset($_SESSION['formData']['name']) ? h($_SESSION['formData']['name']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['formData']['email']) ? h($_SESSION['formData']['email']) : '' ?>">
            </div>
            <button type="submit" class="btn btn-default">Зарегистрироваться</button>
        </form>
        <? if(isset($_SESSION['formData'])) unset($_SESSION['formData'])?>
    </div>
</div>