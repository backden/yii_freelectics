<?php
/* @var $this ExerciseCategoryController */
/* @var $model ExerciseCategory */
/* @var $form CActiveForm */

$exerciseAll = Exercise::model()->findAll();

$exercises = array();
foreach ($exerciseAll as $e) {
  $exe = $e->getAttributes(array("id", "name"));
  $exercises[$exe['id']] = $exe['name'];
}

$exercise_ids = explode(',', $model->exercises);

$categories = ExerciseCategory::model()->findAll('id <> ' . $model->id ? $model->id : '""');
?>

<div class="form">

  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'exercise-category-form',
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
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'name'); ?>
  </div>
  
  <div class="row">
    <?php echo $form->checkBox($model, 'visible', array('class' => "span-1")); ?>
    <?php echo $form->labelEx($model, 'visible', array('class' => "span-17")); ?>
    <?php echo $form->error($model, 'visible'); ?>
  </div>
  <div class="clearfix"></div>
  <div class="row"  id="exercises">
    <?php echo $form->labelEx($model, 'exercises'); ?>
    <?php echo $form->hiddenField($model, 'exercises', array('id' => 'exercises_ids')); ?>
    <?php echo $form->error($model, 'exercises'); ?>
    <?php foreach ($exercises as $id => $name) { ?>
      <div class="span-4">
        <?php echo $form->checkBox(new Exercise, $id, array('value' => $id, 'checked' => !$model->collect && in_array($id, $exercise_ids), 'class' => "span-1")); ?>
        <?php echo $form->labelEx(new Exercise, $name, array('value' => $id, "for" => 'Exercise_' . $id, 'class' => "span-3")); ?>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
  <div class="row"  id="exercisesCategory">
    <?php echo $form->labelEx(new ExerciseCategory, 'Category', array('class' => 'span-19')); ?>
    <?php echo $form->hiddenField($model, 'collect'); ?>
    <?php foreach ($categories as $cate) { ?>
      <div class="span-4">
        <?php echo $form->checkBox($cate, 'id', array('value' => $cate->id,'id' => 'ExerciseCategory_' . $cate->id, 'checked' => $model->collect && in_array($cate->id, $exercise_ids), 'class' => "span-1")); ?>
        <?php echo $form->labelEx(new ExerciseCategory, $cate->name, array('for' => 'ExerciseCategory_' . $cate->id, 'class' => "span-3")); ?>
      </div>
    <?php } ?>
  </div>
  <div class="row buttons span-19">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
  </div>

  <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
  $(function () {
    $("#exercises :checkbox, #exercisesCategory :checkbox").change(function () {
      var ckb = [];
      if ($(this).parent().parent().attr("id") == $("#exercises").attr("id")) {
        $("#exercisesCategory :checkbox").prop('checked', false);
        $("#ExerciseCategory_collect").val(0);
      } else {
        $("#exercises :checkbox").prop('checked', false);
        $("#ExerciseCategory_collect").val(1);
      }
      $(this).parent().parent().find(":checkbox").each(function (i, e) {
        if ($(e).prop("checked")) {
          ckb.push($(e).val());
        }
      });
      $("#exercises_ids").val(ckb.join(","));
    });
  });
</script>