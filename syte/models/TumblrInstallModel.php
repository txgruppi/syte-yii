<?php

class TumblrInstallModel extends CFormModel {
  public $tumblrBlogUrl;
  public $tumblrApiKey;
  public $rssFeedEnabled = 1;

  public function attributeLabels() {
    return array(
      'tumblrBlogUrl' => 'Blog URL',
      'tumblrApiKey' => 'Consumer key',
      'rssFeedEnabled' => 'Enable RSS feed',
    );
  }

  public function rules() {
    return array(
      array('tumblrBlogUrl,tumblrApiKey', 'required'),
      array('tumblrBlogUrl', 'url'),
    );
  }
}