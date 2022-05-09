<select name="lang" id="lang">
    <option value="<?=$this->language['code']?>"><?=$this->language['title']?></option>
    <?foreach ($this->languages as $k => $v):?>
        <?if($this->language['code'] != $k):?>
            <option value="<?=$k?>"><?=$v['title']?></option>
            <?endif;?>
        <?endforeach;?>
</select>