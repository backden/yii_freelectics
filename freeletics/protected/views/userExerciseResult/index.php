<?php
/* @var $this UserExerciseResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Exercise Results',
);

$this->menu=array(
	array('label'=>'Create UserExerciseResult', 'url'=>array('create')),
	array('label'=>'Manage UserExerciseResult', 'url'=>array('admin')),
);
?>

<h1>User Exercise Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
