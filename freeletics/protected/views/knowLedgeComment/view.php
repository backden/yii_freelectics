<?php
/* @var $this KnowLedgeCommentController */
/* @var $model KnowLedgeComment */

$this->breadcrumbs=array(
	'Know Ledge Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KnowLedgeComment', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeComment', 'url'=>array('create')),
	array('label'=>'Update KnowLedgeComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KnowLedgeComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KnowLedgeComment', 'url'=>array('admin')),
);
?>

<h1>View KnowLedgeComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comments',
	),
)); ?>
