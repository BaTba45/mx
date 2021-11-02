<?php
//http://127.0.0.1/okru.php?id=2482049916455


$id=$_GET['id'];
$url='https://ok.ru/live/'.$id;




$m=url($url);
$r = explode('https://vsd',$m);
$r = explode('video.m3u8',$r[1]);
$m3u8=$r[0];
$m3u8='https://vsd'.$m3u8.'video.m3u8';
//echo $m3u8;
header ("Location: $m3u8");


function url($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36'
    ));
$server_output = urldecode(curl_exec($ch));
curl_close ($ch);
return $server_output;


}