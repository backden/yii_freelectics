<?php
/* @var $this KnowLedgeArticleController */
/* @var $model KnowLedgeArticle */

$this->breadcrumbs=array(
	'Know Ledge Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List KnowLedgeArticle', 'url'=>array('index')),
	array('label'=>'Create KnowLedgeArticle', 'url'=>array('create')),
	array('label'=>'Update KnowLedgeArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KnowLedgeArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KnowLedgeArticle', 'url'=>array('admin')),
);
?>

<h1>View KnowLedgeArticle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'create_date',
		'last_update',
		'content',
		'tags',
		'shared',
		'comment_ids',
	),
)); ?>
