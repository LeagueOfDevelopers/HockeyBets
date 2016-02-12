<?php
$data = new data();
$id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
$result = $data->vipnews($id, 6);
$result1 = $data->gennews($id, 6);
if(isset($_SESSION['idnews']))
{
    $idnews = $_SESSION['idnews'];
}


?>
<?php if(Route::dispatcher() == "vip-news"): ?>
<?php $result = $data->vipnews($id, 0);  ?>
    <div class = "news-page-title">VIP-Новости</div>
    <div><?=$result;?></div>
	<div class = "clear"></div>

	
<?php elseif(Route::dispatcher() == "gen-news"): ?>
<?php $result2 = $data->gennews($id, 0);  ?>
    <div class = "news-page-title">Новости</div>
    <div><?=$result2;?></div>
	<div class = "clear"></div>

	
<?php elseif(Route::dispatcher() == "view-news"): ?>
<?php $result = $data->viewnews($idnews);  ?>
<?=$result;?>

<?php else: ?>

	<a class = "read-all-news" href="vip-news"><div class = "news-page-title">VIP-Новости</div></a>
	<div><?=$result;?></div>
	<div class = "clear"></div>


	<a class = "read-all-news" href="gen-news"><div class = "news-page-title">Новости</div></a>
	<?=$result1;?>
	<div class = "clear"></div>

<?php endif; ?>








