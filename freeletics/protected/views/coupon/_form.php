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
    <?php echo $form->labelEx($model, 'start_date'); ?>
    <?php echo $form->textField($model, 'start_date', array("class" => "datepicker")); ?>
    <?php echo $form->error($model, 'start_date'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'expired_date'); ?>
    <?php echo $form->textField($model, 'expired_date', array("class" => "datepicker")); ?>
    <?php echo $form->error($model, 'expired_date'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'type'); ?>
    <?php echo $form->textField($model, 'type'); ?>
    <?php echo $form->error($model, 'type'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'region'); ?>
    <?php echo $form->textField($model, 'region'); ?>
    <?php echo $form->error($model, 'region'); ?>
  </div>

  <div class = "row">
    <?php echo $form->labelEx($model, 'age');
    ?>
    <p class="description"></p>
    <?php echo $form->textField($model, 'age', array("pattern" => $model->type_age == 2 ? '(\\d+)\\s*~\\s*(\\d+)")' : '(\\d*)')); ?>
    <?php echo $form->error($model, 'age'); ?>
    <?php
    echo CHtml::dropDownList('Coupon[type_age]', $model->type_age, array('0' => '>=', '1' => '<=', '2' => 'Range'), array('class' => "select_type"));
    ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'point'); ?>
    <p class="description"></p>
    <?php echo $form->textField($model, 'point', array("pattern" => $model->type_point == 2 ? '(\\d+)\\s*~\\s*(\\d+)")' : '(\\d*)')); ?>
    <?php echo $form->error($model, 'point'); ?>
    <?php
    echo CHtml::dropDownList('Coupon[type_point]', $model->type_point, array('0' => '>=', '1' => '<=', '2' => 'Range'), array('class' => "select_type"));
    ?>
  </div>

  <!--  <div class="row">
  <?php echo $form->labelEx($model, 'code'); ?>
  <?php echo $form->textArea($model, 'code', array('rows' => 4, 'cols' => 50, 'disabled' => true)); ?>
      <button id="btn_random_code" onclick="return false;" style="display: none;">
        Try Generate
      </button>
    </div>
    
    <div class="row">
  <?php echo $form->labelEx($model, 'code2'); ?>
  <?php echo $form->textArea($model, 'code2', array('rows' => 4, 'cols' => 50, 'disabled' => true)); ?>
      <button id="btn_random_code2" onclick="return false;">
        Try Generate
      </button>
    </div>-->

  <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
  </div>

  <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
  $(function() {
    $("#btn_random_code, #btn_random_code2").click(function() {
      $.post('randomcode', $("#coupon-form").serialize(), function(data) {
        if (data.status == '<?php echo Constant::RS_ST_OK; ?>') {
          $("#Coupon_code").text(data.code);
          $("#Coupon_code2").text(data.code2);
        } else {

        }
      },
              'json'
              );
    });
    $(".datepicker").datepicker({
      format: "mm-dd-yyyy"
    });

    $(".select_type").change(function() {
      if ($(this).val() == "2") {
        $(this).parent().find(":input").attr("pattern", "(\\d+)\\s*~\\s*(\\d+)");
        $(this).parent().find(".description").text("<?php echo Yii::t("app", "Format: A ~ B. Ex: 1 ~ 3"); ?>");
      } else {
        $(this).parent().find(":input").removeAttr("pattern");
        $(this).parent().find(".description").text("");
      }
    });

  });
</script>