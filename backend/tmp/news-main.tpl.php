<?php
$data = new data();


if(isset($_SESSION['idnews']))
{
    $idnews = $_SESSION['idnews'];
}
?>


<?php if(Route::dispatcher() == "gen-news"): ?>
    <?php $result1 = $data->gennews(0);  ?>
    <div>Новости</div><br><br>
    <div><?=$result1;?></div><br>
    <div> <a href="/main">Назад</a> </div><br>
    <div>Или</div><br>
    <br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>
<?php elseif(Route::dispatcher() == "view-news"): ?>
    <?php $result = $data->viewnews($idnews);  ?>
    <br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>
    <div><?=$result;?></div><br>
<?php else: ?>
    <?php $result1 = $data->gennews(10);  ?>
    <div>Новости</div><br><br>
    <div><?=$result1;?></div><br>
    <div> <a href="gen-news">Читать полностью</a> </div>
<?php endif; ?>