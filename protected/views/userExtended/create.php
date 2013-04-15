<?php
$this->breadcrumbs=array(
	'User Extendeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserExtended', 'url'=>array('index')),
	array('label'=>'Manage UserExtended', 'url'=>array('admin')),
);
?>

<h1>Create UserExtended</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>