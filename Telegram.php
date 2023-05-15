<?php
/*получаем значения полей из формы*/
$name = $_POST['name'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$text = $_POST['text'];

/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

/*собираем сообщение*/
$message .= "Новая заявка!";
$message .= "Имя: ".$name;
$message .= "Фамилия:".$fname;
$message .= "Телеграмм:".$Telegram;
$message .= "Описание заявки::".$text;

/*токен который выдаётся при регистрации бота */
$token = "5856738182:AAFNCgbjuxIWcnF_PMhgSRFbAlkead4_8jE";
/*идентификатор группы*/
$chat_id = "-929187095";
/*делаем запрос и отправляем сообщение*/
parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");

?>