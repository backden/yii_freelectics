<?php
/* @var $this KnowLedgeArticleController */
/* @var $model KnowLedgeArticle */

$this->breadcrumbs=array(
	'Know Ledge Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KnowLedgeArticle', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeArticle', 'url'=>array('create')),
	array('label'=>'View KnowLedgeArticle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KnowLedgeArticle', 'url'=>array('admin')),
);
?>

<h1>Update KnowLedgeArticle <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>