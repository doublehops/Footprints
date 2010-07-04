<?php
$this->breadcrumbs=array(
	'Contact Infos',
);

$this->menu=array(
	array('label'=>'Create ContactInfo', 'url'=>array('create')),
	array('label'=>'Manage ContactInfo', 'url'=>array('admin')),
);
?>

<h1>Contact Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
