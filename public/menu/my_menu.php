<li class="test" style="background-color:coral; color:brown">
    <a href="?id=<?=$id?>"><?=$category['title']?></a>
    <?if(isset($category['childs'])):?>
        <ul class="test">
            <?=$this->getMenuHtml($category['childs'])?>
        </ul>
        <?endif;?>
</li>