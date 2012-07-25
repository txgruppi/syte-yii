<?php

class TwitterInstallModel extends CFormModel {
  public $twitterConsumerKey;
  public $twitterConsumerSecret;
  public $twitterUserKey;
  public $twitterUserSecret;

  public function attributeLabels() {
    return array(
      'twitterConsumerKey' => 'Consumer key',
      'twitterConsumerSecret' => 'Consumer secret',
      'twitterUserKey' => 'Access token',
      'twitterUserSecret' => 'Access token secret',
    );
  }

  public function rules() {
    return array(
      array('twitterConsumerKey,twitterConsumerSecret,twitterUserKey,twitterUserSecret', 'required'),
    );
  }
}