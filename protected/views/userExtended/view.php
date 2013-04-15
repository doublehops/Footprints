<?php
$this->breadcrumbs=array(
	'User Extendeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserExtended', 'url'=>array('index')),
	array('label'=>'Create UserExtended', 'url'=>array('create')),
	array('label'=>'Update UserExtended', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserExtended', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserExtended', 'url'=>array('admin')),
);
?>

<h1>View UserExtended #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uId',
		'currentBusinessId',
		'timeOffset',
		'lastModified',
	),
)); ?>
