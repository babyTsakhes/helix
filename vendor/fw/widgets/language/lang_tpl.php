<select name="lang" id="lang">
    <option value="<?=$this->language['code']?>"><?=$this->language['title']?></option>
    <?foreach ($this->languages as $k => $v):?>
        <?if($this->language['code'] != $k):?>
            <option value="<?=$k?>"><?=$v['title']?></option>
            <?endif;?>
        <?endforeach;?>
</select>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){
    $('#lang').change(function(){
        window.location = '/language/change?lang=' + $(this).val();
    });
});
 </script>