<?php
/* @var $this ExerciseCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exercise Categories',
);

$this->menu=array(
	array('label'=>'Create ExerciseCategory', 'url'=>array('create')),
	array('label'=>'Manage ExerciseCategory', 'url'=>array('admin')),
);
?>

<h1>Exercise Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
