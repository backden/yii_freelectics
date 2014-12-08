<?php
/* @var $this KnowLedgeCommentController */
/* @var $model KnowLedgeComment */

$this->breadcrumbs=array(
	'Know Ledge Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KnowLedgeComment', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeComment', 'url'=>array('create')),
	array('label'=>'View KnowLedgeComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KnowLedgeComment', 'url'=>array('admin')),
);
?>

<h1>Update KnowLedgeComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>