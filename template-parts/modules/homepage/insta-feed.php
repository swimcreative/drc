<?php

// use this instagram access token generator http://instagram.pixelunion.net/
//$access_token="1424447528.1677ed0.2956ef96709143e89daaf30813343f23";
if(get_field('instagram_access_token', 2)) :

  $access_token = get_field('instagram_access_token', 2);

else :

  $access_token = '458323638.1677ed0.9715df8261724d1698d95be61053e382';

endif;
$photo_count = 6;

$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
$json_link.="access_token={$access_token}&count={$photo_count}";


$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
