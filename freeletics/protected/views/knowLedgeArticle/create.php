<?php
/* @var $this KnowLedgeArticleController */
/* @var $model KnowLedgeArticle */

$this->breadcrumbs=array(
	'Know Ledge Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KnowLedgeArticle', 'url'=>array('index')),
	array('label'=>'Manage KnowLedgeArticle', 'url'=>array('admin')),
);
?>

<h1>Create KnowLedgeArticle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>