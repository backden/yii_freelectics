<?php
/* @var $this UserCommunityCommentController */
/* @var $model UserCommunityComment */

$this->breadcrumbs=array(
	'User Community Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCommunityComment', 'url'=>array('index')),
	array('label'=>'Manage UserCommunityComment', 'url'=>array('admin')),
);
?>

<h1>Create UserCommunityComment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>