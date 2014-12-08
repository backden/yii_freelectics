<?php
/* @var $this ExerciseCategoryController */
/* @var $model ExerciseCategory */

$this->breadcrumbs=array(
	'Exercise Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExerciseCategory', 'url'=>array('index')),
	array('label'=>'Manage ExerciseCategory', 'url'=>array('admin')),
);
?>

<h1>Create ExerciseCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>