<?php
/* @var $this KnowLedgeCommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Know Ledge Comments',
);

$this->menu=array(
	array('label'=>'Create KnowLedgeComment', 'url'=>array('create')),
	array('label'=>'Manage KnowLedgeComment', 'url'=>array('admin')),
);
?>

<h1>Know Ledge Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
