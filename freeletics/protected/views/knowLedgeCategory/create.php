<?php
/* @var $this KnowLedgeCategoryController */
/* @var $model KnowLedgeCategory */

$this->breadcrumbs=array(
	'Know Ledge Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KnowLedgeCategory', 'url'=>array('index')),
	array('label'=>'Manage KnowLedgeCategory', 'url'=>array('admin')),
);
?>

<h1>Create KnowLedgeCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>