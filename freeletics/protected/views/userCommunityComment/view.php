<?php
/* @var $this UserCommunityCommentController */
/* @var $model UserCommunityComment */

$this->breadcrumbs=array(
	'User Community Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserCommunityComment', 'url'=>array('index')),
	array('label'=>'Create UserCommunityComment', 'url'=>array('create')),
	array('label'=>'Update UserCommunityComment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserCommunityComment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCommunityComment', 'url'=>array('admin')),
);
?>

<h1>View UserCommunityComment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'comments',
	),
)); ?>
