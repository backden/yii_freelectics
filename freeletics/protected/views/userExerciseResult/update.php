<?php
/* @var $this UserExerciseResultController */
/* @var $model UserExerciseResult */

$this->breadcrumbs=array(
	'User Exercise Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserExerciseResult', 'url'=>array('index')),
	array('label'=>'Create UserExerciseResult', 'url'=>array('create')),
	array('label'=>'View UserExerciseResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserExerciseResult', 'url'=>array('admin')),
);
?>

<h1>Update UserExerciseResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>