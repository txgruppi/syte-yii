<?php

class LastFMInstallModel extends CFormModel {
  public $lastfmApiKey;
  public $lastfmUsername;

  public function attributeLabels() {
    return array(
      'lastfmApiKey' => 'API key',
      'lastfmUsername' => 'Username',
    );
  }

  public function rules() {
    return array(
      array('lastfmApiKey,lastfmUsername', 'required'),
    );
  }
}