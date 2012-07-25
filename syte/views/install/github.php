<div class="container">
  <h1>Syte - Install</h1>
  <h2>Github integration</h2>
  <div class="row">
    <div class="span12">
      <p>Github has the same level of security as Twitter, but they don't provide a button that makes it easy to get the access token, so instead we have to get the access token ourselves. To get started sign in to github and go to <a href="https://github.com/settings/applications/new" target="_blank">https://github.com/settings/applications/new</a> to register your application.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Enter the <strong><em>Application Name</em></strong>, <strong><em>Main URL</em></strong> and <strong><em>Callback URL</em></strong>.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Enter the <strong><em><?php echo $model->getAttributeLabel('githubClientId'); ?></em></strong>, <strong><em><?php echo $model->getAttributeLabel('githubClientSecret'); ?></em></strong> and click <strong><em>Github auth</em></strong> to get your access token.</p>
    </div>
  </div>
  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'tubmlr-form', 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-block alert-error')); ?>

  <fieldset>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'githubAccessToken', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'githubAccessToken'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'githubClientId', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'githubClientId'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'githubClientSecret', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'githubClientSecret'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Github Auth" class="btn <?php if ($model->scenario === 'step1')  echo 'btn-primary'; ?>">
      <input type="submit" value="Next" class="btn <?php if ($model->scenario === 'step2')  echo 'btn-primary'; ?>">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>