<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exercise-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reward'); ?>
		<?php echo $form->textField($model,'reward'); ?>
		<?php echo $form->error($model,'reward'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'equiments'); ?>
		<?php echo $form->textArea($model,'equiments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'equiments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'volumn'); ?>
		<?php echo $form->textField($model,'volumn'); ?>
		<?php echo $form->error($model,'volumn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
 
 <div class="row">
		<?php echo $form->labelEx($model,'video_round'); ?>
		<?php echo $form->textArea($model,'video_round',array('rows'=>6, 'cols'=>50)); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'videos'); ?>
		<?php // echo $form->textArea($model,'videos',array('rows'=>6, 'cols'=>50)); ?>
		<?php // echo $form->error($model,'videos'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'rounds'); ?>
		<?php // echo $form->textArea($model,'rounds',array('rows'=>6, 'cols'=>50)); ?>
		<?php // echo $form->error($model,'rounds'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->