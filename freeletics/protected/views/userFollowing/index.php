<?php
/* @var $this UserFollowingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Followings',
);

$this->menu=array(
	array('label'=>'Create UserFollowing', 'url'=>array('create')),
	array('label'=>'Manage UserFollowing', 'url'=>array('admin')),
);
?>

<h1>User Followings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
