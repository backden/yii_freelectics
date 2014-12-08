<?php
/* @var $this UserCommunityCommentController */
/* @var $model UserCommunityComment */

$this->breadcrumbs=array(
	'User Community Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCommunityComment', 'url'=>array('index')),
	array('label'=>'Create UserCommunityComment', 'url'=>array('create')),
	array('label'=>'View UserCommunityComment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCommunityComment', 'url'=>array('admin')),
);
?>

<h1>Update UserCommunityComment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>