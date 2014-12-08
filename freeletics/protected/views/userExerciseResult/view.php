<?php
/* @var $this UserExerciseResultController */
/* @var $model UserExerciseResult */

$this->breadcrumbs=array(
	'User Exercise Results'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserExerciseResult', 'url'=>array('index')),
	array('label'=>'Create UserExerciseResult', 'url'=>array('create')),
	array('label'=>'Update UserExerciseResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserExerciseResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserExerciseResult', 'url'=>array('admin')),
);
?>

<h1>View UserExerciseResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'time',
		'details',
		'comment_id',
		'points',
		'exercise_id',
	),
)); ?>
