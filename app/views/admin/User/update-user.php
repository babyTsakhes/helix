<body>
    <div class="container">

        <h2>Update user</h2>

        <div class="row">
            <div class="col-md-6">
                <form method="post" action="/admin/user/update-user"">
        <div class=" form-group">
                    <label for="id" hidden>id</label>
                    <input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?= $user->id ?>" hidden>
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= $user->login ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?= $user->name ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= $user->email ?>">
            </div>
            <div class="form-group">
                <label for="role">role</label>
                <select name="role" id="role" class="form-select" aria-label="Default select example">
                    <option value="admin" <? $sel = ($user->role == 'admin') ? 'selected' : '' ?> <?= $sel ?>>admin</option>
                    <option value="user" <? $sel = ($user->role == 'user') ? 'selected' : '' ?> <?= $sel ?>>user</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deleted">deleted</label>
                <select name="deleted" id="deleted" class="form-select" aria-label="Default select example">
                    <option value="1" <? $sel = ($user->deleted == '1') ? 'selected' : '' ?> <?= $sel ?>>1</option>
                    <option value="0" <? $sel = ($user->deleted == '0') ? 'selected' : '' ?> <?= $sel ?>>0</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">comments for deleting</label>
                <textarea type="text" name="comment" class="form-control" id="comment" placeholder="comment" value="<?= $user->comment ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Изменить пользователя</button>
            </form>
            <? if (isset($_SESSION['formData'])) unset($_SESSION['formData']) ?>
        </div>
    </div>
    </div>
</body>