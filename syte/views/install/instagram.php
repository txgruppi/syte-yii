<div class="container">
  <h1>Syte - Install</h1>
  <h2>Instagram integration</h2>
  <div class="row">
    <div class="span12">
      <p>Instagram has the same level of security as Github and similar steps on getting the access token ourselves. To get started go to <a href="http://instagram.com/developer/" target="_blank">http://instagram.com/developer/</a>, sign in and crate a new client by clicking on the <strong><em>Manage Clients</em></strong> link on the top right side.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Enter the <strong><em>Application Name</em></strong>, <strong><em>Description</em></strong>, <strong><em>Website</em></strong> and <strong><em>OAuth redirect_uri</em></strong>. For the OAuth redirect_uri enter <code><?php echo $redirect_uri; ?></code> for now since we will get the access token while running it locally. Once you are done regestering your client you will be given the <strong><em>Client ID</em></strong> and <strong><em>Client Secret</em></strong>.</p>
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
      <?php echo $form->labelEx($model, 'instagramAccessToken', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'instagramAccessToken'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'instagramUserId', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'instagramUserId'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'instagramClientId', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'instagramClientId'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'instagramClientSecret', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'instagramClientSecret'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Instagram Auth" class="btn <?php if ($model->scenario === 'step1')  echo 'btn-primary'; ?>">
      <input type="submit" value="Next" class="btn <?php if ($model->scenario === 'step2')  echo 'btn-primary'; ?>">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>