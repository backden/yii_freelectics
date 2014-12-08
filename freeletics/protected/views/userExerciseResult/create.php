<?php
/* @var $this UserExerciseResultController */
/* @var $model UserExerciseResult */

$this->breadcrumbs=array(
	'User Exercise Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserExerciseResult', 'url'=>array('index')),
	array('label'=>'Manage UserExerciseResult', 'url'=>array('admin')),
);
?>

<h1>Create UserExerciseResult</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>