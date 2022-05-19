<?foreach($users as $user):?>
    <?=$user->name?>
    <?=$user->login?>
    <?=$user->email?>
    <?=$user->role?>
    <?endforeach;?>