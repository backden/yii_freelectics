<?php
/* @var $this BlogArticleController */
/* @var $model BlogArticle */

$this->breadcrumbs=array(
	'Blog Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogArticle', 'url'=>array('index')),
	array('label'=>'Manage BlogArticle', 'url'=>array('admin')),
);
?>

<h1>Create BlogArticle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>