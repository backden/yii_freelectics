<?php
/* @var $this KnowLedgeCommentController */
/* @var $model KnowLedgeComment */

$this->breadcrumbs=array(
	'Know Ledge Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KnowLedgeComment', 'url'=>array('index')),
	array('label'=>'Manage KnowLedgeComment', 'url'=>array('admin')),
);
?>

<h1>Create KnowLedgeComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>