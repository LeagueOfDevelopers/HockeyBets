<?php
 $data = new data();
if(isset($_SESSION['idprofile'])){
    $id = $_SESSION['idprofile'];
    $_SESSION['idprofile'] =($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
}
else {
    $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
}
$result = $data->showProfile($id);


$result2 = $data->checkAdmin(($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id']);
if($result2){
    $result3 = $data->showFollow($result->id_follow);
}
$today = date('Y-m-d');
if($result->id_follow !=0){
    if($result->data_finish<=$today) {
        $status = "VIP";
    }
    else{
        $status = "Обыватель";
    }
}
else{
    $status = "Обыватель";
}
?>
<div style="background-color:  #0A455C; width:400px; height:300px; position:absolute; left:20%; top:25%;">
<H2 style="color: white; padding-left: 50px; padding-top: 30px; font-family: cursive; "><?=$result->name;?></H2>
<p style="color: white; padding-left: 50px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; " >Текущий статус: <a style="color: #53DF00;" ><?=$status?></a></p>

</div>
