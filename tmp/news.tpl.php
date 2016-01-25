<?php
$data = new data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->vipnews($id, 10);
$result1 = $data->gennews($id, 10);
if(isset($_SESSION['idnews']))
{
    $idnews = $_SESSION['idnews'];
}


?>
<?php if(route::dispatcher() == "vip-news"): ?>
<?php $result = $data->vipnews($id, 0);  ?>
    <div>VIP-Новости</div><br><br>
    <div><?=$result;?></div><br>
    <div> <a href="/main">Назад</a> </div><br>
    <div>Или</div><br>
    <br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>
<?php elseif(route::dispatcher() == "gen-news"): ?>
<?php $result = $data->gennews($id, 0);  ?>
    <div>Новости</div><br><br>
    <div><?=$result1;?></div><br>
    <div> <a href="/main">Назад</a> </div><br>
    <div>Или</div><br>
    <br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>
<?php elseif(route::dispatcher() == "view-news"): ?>
<?php $result = $data->viewnews($idnews);  ?>
    <br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>
<div><?=$result;?></div><br>
<?php else: ?>
<div>VIP-Новости</div><br><br>
<div><?=$result;?></div><br>
<div> <a href="vip-news">Читать полностью</a> </div><br><br>

<div>Новости</div><br><br>
<div><?=$result1;?></div><br>
<div> <a href="gen-news">Читать полностью</a> </div>
<?php endif; ?>








