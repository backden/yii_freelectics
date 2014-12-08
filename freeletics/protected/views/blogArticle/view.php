<?php
/* @var $this BlogArticleController */
/* @var $model BlogArticle */

$this->breadcrumbs=array(
	'Blog Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BlogArticle', 'url'=>array('index')),
	array('label'=>'Create BlogArticle', 'url'=>array('create')),
	array('label'=>'Update BlogArticle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogArticle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogArticle', 'url'=>array('admin')),
);
?>

<h1>View BlogArticle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'comment_id',
		'share_details',
		'content_id',
		'create_date',
		'last_update',
	),
)); ?>
