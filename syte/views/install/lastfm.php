<div class="container">
  <h1>Syte - Install</h1>
  <h2>Last.fm integration</h2>
  <div class="row">
    <div class="span12">
      <p>The Last.fm integration does not make any authenticated calls so setting it up only requires that you register an application with Lastfm and get an API key.</p>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>To get an API key simply follow the <a href="http://www.last.fm/api">Getting started instructions</a>.  You can then view your API Key from <a href="http://www.last.fm/api/account">your api account page</a>.</p>
    </div>
  </div>
  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'tubmlr-form', 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-block alert-error')); ?>

  <fieldset>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'lastfmApiKey', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'lastfmApiKey'); ?>
      </div>
    </div>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'lastfmUsername', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'lastfmUsername'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Next" class="btn btn-primary">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>