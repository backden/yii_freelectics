<?php
/* @var $this FaqCategoryController */
/* @var $model FaqCategory */

$this->breadcrumbs=array(
	'Faq Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FaqCategory', 'url'=>array('index')),
	array('label'=>'Create FaqCategory', 'url'=>array('create')),
	array('label'=>'View FaqCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FaqCategory', 'url'=>array('admin')),
);
?>

<h1>Update FaqCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>