<?php

class GithubInstallModel extends CFormModel {
  public $githubAccessToken;
  public $githubClientId;
  public $githubClientSecret;

  public function attributeLabels() {
    return array(
      'githubAccessToken' => 'Access token',
      'githubClientId' => 'Client ID',
      'githubClientSecret' => 'Client secret',
    );
  }

  public function rules() {
    return array(
      array('githubClientId,githubClientSecret', 'required'),
      array('githubAccessToken', 'required', 'on' => 'step2'),
    );
  }
}