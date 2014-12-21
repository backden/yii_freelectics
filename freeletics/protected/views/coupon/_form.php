<?php
/* @var $this CouponController */
/* @var $model Coupon */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'coupon-form',
      // Please note: When you enable ajax validation, make sure the corresponding
      // controller action is handling ajax validation correctly.
      // There is a call to performAjaxValidation() commented in generated controller code.
      // See class documentation of CActiveForm for details on this.
      'enableAjaxValidation' => false,
  ));
  ?>

  <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

  <div class="row">
    <?php echo $form->labelEx($model, 'value'); ?>
<?php echo $form->textField($model, 'value'); ?>
<?php echo $form->error($model, 'value'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'status'); ?>
<?php echo $form->textField($model, 'status'); ?>
<?php echo $form->error($model, 'status'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'create_date'); ?>
<?php echo $form->textField($model, 'create_date'); ?>
<?php echo $form->error($model, 'create_date'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'expired_date'); ?>
<?php echo $form->textField($model, 'expired_date'); ?>
<?php echo $form->error($model, 'expired_date'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'last_update'); ?>
<?php echo $form->textField($model, 'last_update'); ?>
<?php echo $form->error($model, 'last_update'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'type'); ?>
<?php echo $form->textField($model, 'type'); ?>
<?php echo $form->error($model, 'type'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'code'); ?>
<?php echo $form->textArea($model, 'code', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'code'); ?>
    <button id="btn_random_code" onclick="return false;">
      Try Generate
    </button>
  </div>

  <div class="row buttons">
  <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
  $(function () {
    $("#btn_random_code").click(function () {
      $.post('randomcode', $("#coupon-form").serialize(), function (data) {
        if (data.status == '<?php echo Constant::RS_ST_OK; ?>') {
          $("#Coupon_code").text(data.code);
        } else {
          
        }
      },
      'json'
      );
    });
  });
</script>