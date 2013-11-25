<?php
/* @var $this IssueController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Issues',
);

$this->menu=array(
	array('label'=>'Create Issue', 'url'=>array('create','pid'=>$_GET['pid'])),
	array('label'=>'Manage Issue', 'url'=>array('admin','pid'=>$_GET['pid'])),
);
?>

<h1>Issues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
