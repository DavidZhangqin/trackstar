<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	<?php if(Yii::app()->controller->id == 'project' && (Yii::app()->controller->action->id == 'index' || Yii::app()->controller->action->id == 'view')): ?>
	<?php 
		$key="TrackStar.ProjectListing.RecentComments";
		if($this->beginCache($key, array('duration'=>120))) {
			$this->beginWidget('zii.widgets.CPortlet', array('title'=>'Recent Comments'));
		    isset($_GET['id']) ? $this->widget('RecentComments', array('projectId'=>$_GET['id'])) : $this->widget('RecentComments');
		    $this->endWidget();
		    $this->endCache();
		}
	?>
	<?php endif; ?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>