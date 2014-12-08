<?php
/* @var $this FaqCategoryController */
/* @var $model FaqCategory */

$this->breadcrumbs=array(
	'Faq Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FaqCategory', 'url'=>array('index')),
	array('label'=>'Manage FaqCategory', 'url'=>array('admin')),
);
?>

<h1>Create FaqCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>