<?php
/* @var $this KnowLedgeCategoryController */
/* @var $data KnowLedgeCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('knowledge_ids')); ?>:</b>
	<?php echo CHtml::encode($data->knowledge_ids); ?>
	<br />


</div>