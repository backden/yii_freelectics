<?php
/* @var $this ExerciseCategoryController */
/* @var $model ExerciseCategory */

$this->breadcrumbs=array(
	'Exercise Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExerciseCategory', 'url'=>array('index')),
	array('label'=>'Create ExerciseCategory', 'url'=>array('create')),
	array('label'=>'View ExerciseCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExerciseCategory', 'url'=>array('admin')),
);
?>

<h1>Update ExerciseCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>