<?php
/* @var $this ExerciseController */
/* @var $data Exercise */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward')); ?>:</b>
	<?php echo CHtml::encode($data->reward); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('equiments')); ?>:</b>
	<?php echo CHtml::encode($data->equiments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volumn')); ?>:</b>
	<?php echo CHtml::encode($data->volumn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('videos')); ?>:</b>
	<?php echo CHtml::encode($data->videos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rounds')); ?>:</b>
	<?php echo CHtml::encode($data->rounds); ?>
	<br />

	*/ ?>

</div>