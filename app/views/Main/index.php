<div class="container">
    <? if (!empty($posts)):?>
        <table>
<tr><th>title</th><th>text</th></tr>
        <?foreach ($posts as $post):?>
            
<tr><td><?=$post['title']?></td><td><?=$post['text']?></td></tr> <!--ряд с ячейками тела таблицы-->

            <? endforeach?>
            </table>
        <?endif?>
</div>

<?debug(vendor\core\Db::$countSql);?>
<?debug(vendor\core\Db::$queries);?>