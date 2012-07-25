<div class="container">
  <h1>Syte - Install</h1>
  <h2>Twitter integration</h2>
  <div class="row">
    <div class="span12">
      <p>Twitter has another level of security, therefore we need more information instead of just an api_key like tumblr. To get started create a new application on twitter for your website by going to <a href="https://dev.twitter.com/apps/new" target="_blank">https://dev.twitter.com/apps/new</a>. Once you are done creating your application you will be taken to your application page on twitter, there you already have two pieces of the puzzle, the <code>Consumer key</code> and the <code>Consumer secret</code> make sure you save those.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Next you will need your access tokens, on the bottom of that page there is a link called <strong>Create my access token</strong> click on that. Once you are done you will be given the other two pieces of the puzzle, the <code>Access token</code> and the <code>Access token secret</code> make sure you save those as well.</p>
    </div>
  </div>
  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'tubmlr-form', 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-block alert-error')); ?>

  <fieldset>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'twitterConsumerKey', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'twitterConsumerKey'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'twitterConsumerSecret', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'twitterConsumerSecret'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'twitterUserKey', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'twitterUserKey'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'twitterUserSecret', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'twitterUserSecret'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Next" class="btn btn-primary">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>