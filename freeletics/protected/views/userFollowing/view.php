<?php
/* @var $this UserFollowingController */
/* @var $model UserFollowing */

$this->breadcrumbs=array(
	'User Followings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserFollowing', 'url'=>array('index')),
	array('label'=>'Create UserFollowing', 'url'=>array('create')),
	array('label'=>'Update UserFollowing', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserFollowing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserFollowing', 'url'=>array('admin')),
);
?>

<h1>View UserFollowing #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'following',
	),
)); ?>
