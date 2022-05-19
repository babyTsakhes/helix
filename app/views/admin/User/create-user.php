<body>
        <div class="container">

<h2>Create new user</h2>

<div class="row">
    <div class = "col-md-6">
        <form method="post" action="/admin/user/create-user"">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['formData']['login']) ? h($_SESSION['formData']['login']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?=isset($_SESSION['formData']['name']) ? h($_SESSION['formData']['name']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['formData']['email']) ? h($_SESSION['formData']['email']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="role">role</label>
                <select name="role" id="role" class="form-select" aria-label="Default select example">
  <option selected>Выбери роль своего пользователя: </option>
  <option value="admin">admin</option>
  <option value="user">user</option>
</select>

            </div>
            <button type="submit" class="btn btn-success">Зарегистрироваться</button>
        </form>
        <? if(isset($_SESSION['formData'])) unset($_SESSION['formData'])?>
    </div>
</div>
        </div>
</body>