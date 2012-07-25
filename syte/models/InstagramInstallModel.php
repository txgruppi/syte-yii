<?php

class InstagramInstallModel extends CFormModel {
  public $instagramAccessToken;
  public $instagramClientId;
  public $instagramClientSecret;
  public $instagramUserId;

  public function attributeLabels() {
    return array(
      'instagramAccessToken' => 'Access token',
      'instagramClientId' => 'Client ID',
      'instagramClientSecret' => 'Client secret',
      'instagramUserId' => 'User ID',
    );
  }

  public function rules() {
    return array(
      array('instagramClientId,instagramClientSecret', 'required'),
      array('instagramAccessToken,instagramUserId', 'required', 'on' => 'step2'),
    );
  }
}