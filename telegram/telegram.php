<?php

$curl = curl_init();

$name = $_POST['name'];
$tel = $_POST['phone'];
$tel = str_replace(' ', '', $tel);

$heredoc_a = <<<HERE
*- Mesaj Başlığı -*

*Adı Soyadı:* $name
*Telefon Numarası:* $tel
HERE;

$botkey = null; //Telegram bot keyiniz
$data = [
  'chat_id' => -1001603010626,
  'text' => $heredoc_a,
  'parse_mode' => 'markdown'
];

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.telegram.org/bot' .$botkey. '/sendMessage?' .http_build_query($data),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);

curl_close($curl);
header('Location: ' . 'index.php');