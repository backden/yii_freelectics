<?php
/* @var $this ExerciseCategoryController */
/* @var $model ExerciseCategory */

$this->breadcrumbs=array(
	'Exercise Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ExerciseCategory', 'url'=>array('index')),
	array('label'=>'Create ExerciseCategory', 'url'=>array('create')),
	array('label'=>'Update ExerciseCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExerciseCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseCategory', 'url'=>array('admin')),
);
?>

<h1>View ExerciseCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'exercises',
	),
)); ?>
