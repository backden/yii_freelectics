<?php
/* @var $this KnowLedgeCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Know Ledge Categories',
);

$this->menu=array(
	array('label'=>'Create KnowLedgeCategory', 'url'=>array('create')),
	array('label'=>'Manage KnowLedgeCategory', 'url'=>array('admin')),
);
?>

<h1>Know Ledge Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
