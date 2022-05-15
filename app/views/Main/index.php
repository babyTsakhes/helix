<h2><?__('IMT')?></h2>
<div class="row ">
    <div class = "col-md-6">
        <form method="post" action = "/main/imt">
        <div class="form-group">
                <label for="weight"><?__('weight')?></label>
                <input type="text" name="weight" class="form-control" id="weight" placeholder="weight">
            </div>
            <div class="form-group">
                <label for="height"><?__('height')?></label>
                <input type="text" name="height" class="form-control" id="height" placeholder="height">
            </div>
            <button type="submit" class="btn btn-success"><?__('send')?></button>
        </form>

    </div>

</div>