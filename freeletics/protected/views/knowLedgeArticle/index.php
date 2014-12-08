<?php
/* @var $this KnowLedgeArticleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Know Ledge Articles',
);

$this->menu=array(
	array('label'=>'Create KnowLedgeArticle', 'url'=>array('create')),
	array('label'=>'Manage KnowLedgeArticle', 'url'=>array('admin')),
);
?>

<h1>Know Ledge Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
