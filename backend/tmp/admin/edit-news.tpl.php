<?php
$data = new Data();
$result1 = $data->checkAdmin($id);
if(!$result1){
    $stringurl1 = str_replace("/index.php", "", HTTP_PATH);

    exit("<p>Данной директории не существует. Ошибка 404</p>
<br><input class='button-warning pure-button' onclick='window.history.back();' type='button' value='Вернуться назад'/>");
}
$result = $data->showeditNews($_SESSION['ideditnews']);
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<form method="post" class="pure-form" enctype="multipart/form-data">
    <p>
        Заголовок:<br>
        <input type="text" name="title" size="35" value="<?=$result->title;?>" >
    </p>
    <p>
        Текст новости: <br>
    <div style="width: 50%;"><textarea name = "text" ><?=$result->text;?></textarea></div><br>
    <p>
        Статус новости:<br><br>
        <?php
        if($result->status == "VIP"){
            echo "
            <input name='status-news' type='radio' value='VIP' checked><a>VIP-Новость</a>
            <input name='status-news' type='radio' value='general' ><a>Общая</a>
            ";
        }
        else{
            echo "
            <input name='status-news' type='radio' value='VIP' ><a>VIP-Новость</a>
            <input name='status-news' type='radio' value='general' checked><a>Общая</a>
            ";
        }

        ?>
    </p>
    <input type="hidden" name="id" value="<?=$result->id;?>">
    <input type="hidden" name="img" value="<?=$result->img;?>" >
    <div ><img src="<?=$result->img;?>" alt = "Действующая картинка новости" style="width: 25%; height: 25%;" ></div>

    <br><input type="file" name="filename" ><br><br>


    <button type="submit" class="pure-button pure-button-primary" name="editnews"> Изменить</button>
    <br><br><input class="button-warning pure-button" onclick="window.history.back();" type="button" value="Вернуться"/>

</form>