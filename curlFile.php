<?php

$curl = curl_init();
$search_string = "pants";
$url = "https://www.amazon.com/s/field-keywords=$search_string";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
/*This will not ask for CAPTCHA verification*/
curl_setopt($curl, CURLOPT_COOKIE, true);

$result = curl_exec($curl);
/*After we get the result, which is the html file, we try to get the url of all images*/

/*This pattern is fetched by doing "Inspect Element" and finding out that images for this search keyword is in this format*/
preg_match_all('/https:\/\/images-na.ssl-images-amazon.com\/images\/I\/[^\s]*?._AC_US200_.jpg/', $result, $matches);

$images = array_values(array_unique($matches[0]));

/*Formating the images to display them in html page*/
for($i = 0; $i < count($images); $i++){
    echo "<div style='float: left; margin: 10 0 0 0; '>";
    echo "<img src='$images[$i]'><br />'";
    echo "</div>";
}

curl_close($curl);