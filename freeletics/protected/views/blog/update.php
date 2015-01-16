<?php
/* @var $this BlogArticleController */
/* @var $model BlogArticle */

$this->breadcrumbs=array(
	'Blog Articles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogArticle', 'url'=>array('index')),
	array('label'=>'Create BlogArticle', 'url'=>array('create')),
	array('label'=>'View BlogArticle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogArticle', 'url'=>array('admin')),
);
?>

<h1>Update BlogArticle <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>