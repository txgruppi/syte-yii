<?php

class AnalyticsInstallModel extends CFormModel {
  public $analyticsTrackingId;

  public function attributeLabels() {
    return array(
      'analyticsTrackingId' => 'Tracking ID',
    );
  }

  public function rules() {
    return array(
      array('analyticsTrackingId', 'required'),
    );
  }
}