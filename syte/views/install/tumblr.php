<div class="container">
  <h1>Syte - Install</h1>
  <h2>Tumblr integration</h2>
  <div class="row">
    <div class="span12">
      <p>If you already have a tumblr blog good! If you don't <a href="https://www.tumblr.com/" target="_blank">signup for one here</a> it's really easy! I might eventually make Syte integrate with wordpress as well, if you beat me to it please send a pull request.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Once you have your tumblr blog you will need to get the <code>api_key</code> needed to call their APIs. In order to do that <strong>register your site</strong> with them by going to <a href="http://www.tumblr.com/oauth/register" target="_blank">http://www.tumblr.com/oauth/register</a>, fill in the information about your site, there is no need to enter a default callback url or an icon. Once you are done your website will be listed under <a href="http://www.tumblr.com/oauth/apps" target="_blank">http://www.tumblr.com/oauth/apps</a>, save the <code>OAuth Consumer Key</code> value that's the <code>api_key</code> we need for Syte.</p>
    </div>
  </div>
  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'tubmlr-form', 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-block alert-error')); ?>

  <fieldset>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'tumblrBlogUrl', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'tumblrBlogUrl'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'tumblrApiKey', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'tumblrApiKey'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'rssFeedEnabled', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->checkBox($model, 'rssFeedEnabled'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Next" class="btn btn-primary">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>