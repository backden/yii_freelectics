<?php
/* @var $this UserCommunityCommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Community Comments',
);

$this->menu=array(
	array('label'=>'Create UserCommunityComment', 'url'=>array('create')),
	array('label'=>'Manage UserCommunityComment', 'url'=>array('admin')),
);
?>

<h1>User Community Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
