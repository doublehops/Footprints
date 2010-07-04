<?php
$this->breadcrumbs=array(
	'Contact Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactInfo', 'url'=>array('index')),
	array('label'=>'Manage ContactInfo', 'url'=>array('admin')),
);
?>

<h1>Create ContactInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>