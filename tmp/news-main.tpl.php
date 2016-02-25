<?php
$data = new data();


if(isset($_SESSION['idnews']))
{
    $idnews = $_SESSION['idnews'];
}
?>


<?php if(Route::dispatcher() == "gen-news"): ?>
    <?php $result1 = $data->gennews(0);  ?>
    <div class = "news-page-title">Новости</div>
    <div><?=$result1;?></div>
	<div class = "clear"></div>
    
<?php elseif(Route::dispatcher() == "view-news"): ?>
	<?php $result = $data->viewnews($idnews);  ?>
	<?=$result;?>

<?php else: ?>
    <?php $result1 = $data->gennews(6);  ?>
    <a class = "read-all-news" href="gen-news"><div class = "news-page-title">Новости</div></a>
	<?=$result1;?>
	<div class = "clear"></div>
<?php endif; ?>