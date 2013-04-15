<?php
$this->breadcrumbs=array(
	'User Extendeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserExtended', 'url'=>array('index')),
	array('label'=>'Create UserExtended', 'url'=>array('create')),
	array('label'=>'View UserExtended', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserExtended', 'url'=>array('admin')),
);
?>

<h1>Update UserExtended <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>