<?php
/* @var $this KnowLedgeCategoryController */
/* @var $model KnowLedgeCategory */

$this->breadcrumbs=array(
	'Know Ledge Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List KnowLedgeCategory', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeCategory', 'url'=>array('create')),
	array('label'=>'Update KnowLedgeCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KnowLedgeCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KnowLedgeCategory', 'url'=>array('admin')),
);
?>

<h1>View KnowLedgeCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'knowledge_ids',
	),
)); ?>
