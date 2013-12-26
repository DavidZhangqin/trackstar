<?php
/* @var $this ProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'<i class="icon-plus-sign"></i> Create Project', 'url'=>array('create')),
	array('label'=>'<i class="icon-edit"></i> Manage Project', 'url'=>array('admin')),
);
?>

<?php if($sysMessage != null):?>
    <div class="sys-message">
        <?php echo $sysMessage; ?>
    </div>
<?php
    Yii::app()->clientScript->registerScript('fadeAndHideEffect', '$(".sys-message").animate({opacity:1.0},5000).fadeOut("slow");');
endif; ?>
<div class="page-header">
    <h1>List Projects</h1>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
    'itemsCssClass'=>'',
	'itemView'=>'_view',
)); ?>


