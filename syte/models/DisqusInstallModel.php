<?php

class DisqusInstallModel extends CFormModel {
  public $disqusShortname;

  public function attributeLabels() {
    return array(
      'disqusShortname' => 'Shortname',
    );
  }

  public function rules() {
    return array(
      array('disqusShortname', 'required'),
    );
  }
}