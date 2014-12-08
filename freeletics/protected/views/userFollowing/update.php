<?php
/* @var $this UserFollowingController */
/* @var $model UserFollowing */

$this->breadcrumbs=array(
	'User Followings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserFollowing', 'url'=>array('index')),
	array('label'=>'Create UserFollowing', 'url'=>array('create')),
	array('label'=>'View UserFollowing', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserFollowing', 'url'=>array('admin')),
);
?>

<h1>Update UserFollowing <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>