<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>All users</h1>
 <a href="/admin/user/create-user" class="btn btn-success">Add new user</a>
 <form method="post" action="/admin/user/update-user""> 
<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">login</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col">is deleted</th>
                <th scope="col">comment for deleting</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($users as $user) : ?>
                <?//debug($user->isDelete,1)?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name ?></td>
                    <td><?= $user->login ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?></td>
                    <td><?= $user->deleted ?></td>
                    <td><?= $user->comment ?></td>
                    <td> <a href="/admin/user/read-user?id=<?=$user->id?>" class="btn btn-primary">Show</a>
                        <a href="/admin/user/update-user?id=<?=$user->id?>" class="btn btn-warning">Edit</a>
                        <a href="/admin/user/delete-user?id=<?=$user->id?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
            </div>
            </div>
            </div>
</body>