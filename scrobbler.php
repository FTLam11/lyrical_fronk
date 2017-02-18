<?php

class Scrobbler
{
  public static function scrobbleTrack($artist, $title) {
    $_synoNas = "http://localhost:3000";
    $url = sprintf("%s/scrobbles/q?artist=%s&title=%s", 
      $_synoNas, 
      urlencode($artist), 
      urlencode($title)
    );

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($curl, CURLOPT_VERBOSE, true);

    curl_setopt($curl, CURLOPT_URL, $url);

    curl_exec($curl);
    curl_close($curl);

    return true;
  }
}

?>