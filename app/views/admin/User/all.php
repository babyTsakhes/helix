<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>All users</h1>
 <a href="/admin/user/create-user" class="btn btn-success">Add new user</a>
<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">login</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name ?></td>
                    <td><?= $user->login ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?></td>
                    <td> <a href="/admin/user/read-user?id=<?=$user->id?>" class="btn btn-primary">Show</a>
                        <a href="/admin/user/update-user?id=<?=$user->id?>" class="btn btn-warning">Edit</a>
                        <a href="/delete.php?id=<?=$user->id?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
            </div>
            </div>
            </div>
</body>