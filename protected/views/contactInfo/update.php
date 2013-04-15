<?php
$this->breadcrumbs=array(
	'Contact Infos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactInfo', 'url'=>array('index')),
	array('label'=>'Create ContactInfo', 'url'=>array('create')),
	array('label'=>'View ContactInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContactInfo', 'url'=>array('admin')),
);
?>

<h1>Update ContactInfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>