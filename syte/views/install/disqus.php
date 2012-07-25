<div class="container">
  <h1>Syte - Install</h1>
  <h2>Disqus integration</h2>
  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'tubmlr-form', 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

  <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-block alert-error')); ?>

  <fieldset>
    <div class="control-group">
      <?php echo $form->labelEx($model, 'disqusShortname', array('class' => 'control-label')); ?>
      <div class="controls">
        <?php echo $form->textField($model, 'disqusShortname'); ?>
      </div>
    </div>
    <div class="form-actions">
      <input type="submit" value="Next" class="btn btn-primary">
    </div>
  </fieldset>

  <?php $this->endWidget(); ?>
</div>