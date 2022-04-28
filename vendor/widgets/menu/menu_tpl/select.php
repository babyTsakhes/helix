<option value="<?=$id?>">
    <?=$tab.$category['title']?>
</option>
<?if(isset($category['childs'])):?>
    <?=$this->getMenuHtml($category['childs'],'&nbsp'.$tab.'-')?>
    <?endif;?>