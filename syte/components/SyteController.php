<?php

class SyteController extends CController {

  public function prepareCurl($url) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_HEADER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
    ));
    return $ch;
  }

  public function curlGet($url) {
    $ch = $this->prepareCurl($url);
    return curl_exec($ch);
  }

  public function curlPost($url, $data) {
    $ch = $this->prepareCurl($url);
    curl_setopt_array($ch, array(
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $data
    ));
    return $curl_exec($ch);
  }

}