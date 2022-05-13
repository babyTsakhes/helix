<main role="main" class="container">
<?if(!empty($_SESSION['errorIMT'])):?>
    <?=$_SESSION['errorIMT']?>
    <?unset($_SESSION['errorIMT'])?>
<?else:?>
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary"><? //=$username?></strong>
            <h3 class="mb-0">
                <p class="text-dark">Ваш ИМТ равен <?= $imt ?></p>
            </h3>
            <div class="mb-1 text-muted"><?= date("Y-m-d") ?></div>
            <h4 class="mb-3">
                <p class="text-dark"><?= $message ?></p>
            </h4>
        </div>
    </div>
    <?endif;?>

</main>