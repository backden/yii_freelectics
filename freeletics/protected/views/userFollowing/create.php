<?php
/* @var $this UserFollowingController */
/* @var $model UserFollowing */

$this->breadcrumbs=array(
	'User Followings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserFollowing', 'url'=>array('index')),
	array('label'=>'Manage UserFollowing', 'url'=>array('admin')),
);
?>

<h1>Create UserFollowing</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>