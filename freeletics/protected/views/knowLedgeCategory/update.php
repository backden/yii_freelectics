<?php
/* @var $this KnowLedgeCategoryController */
/* @var $model KnowLedgeCategory */

$this->breadcrumbs=array(
	'Know Ledge Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KnowLedgeCategory', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeCategory', 'url'=>array('create')),
	array('label'=>'View KnowLedgeCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KnowLedgeCategory', 'url'=>array('admin')),
);
?>

<h1>Update KnowLedgeCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>