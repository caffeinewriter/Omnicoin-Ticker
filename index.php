<?PHP
$api = file_get_contents("https://www.allcrypt.com/api?method=singlemarketdata&marketid=672");
$act = json_decode($api, TRUE);
$btc = file_get_contents("https://www.bitstamp.net/api/ticker/");
$bco = json_decode($btc, TRUE);
$lastPrice = $act["return"]["markets"]["OMC"]["lasttradeprice"];
$btcPrice = $bco["vwap"];
$omcPrice = "$".(round($lastPrice * $btcPrice,6));
$im = imagecreatefrompng(dirname(__FILE__)."/omcbg.png");
$white = imagecolorallocate($im, 245, 245, 245);
$font = dirname(__FILE__).'/DroidSansMono.ttf';

imagettftext($im, 12, 0, 34, 22, $white, $font, $omcPrice);
imagepng($im,dirname(__FILE__)."/price.png");
imagedestroy($im);
?>