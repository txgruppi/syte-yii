<?php

class SyteModule extends CWebModule {
	public function init() {
    $this->layout = 'main';
		$this->setImport(array(
      'syte.models.*',
			'syte.components.*',
		));
	}

  public function beforeControllerAction($controller, $action) {
    if(parent::beforeControllerAction($controller,$action)) {
      if ($controller->id === 'install') {
        if (Yii::app()->syte->installed)
          $controller->redirect(array('/'));
        $this->layout = 'install';
      } else {
        if (!Yii::app()->syte->installed)
          $controller->redirect(array('/syte/install'));
        $this->layout = 'main';
      }
      return true;
    } else
      return false;
  }
}
