<?php
$this->breadcrumbs=array(
	'User Extendeds',
);

$this->menu=array(
	array('label'=>'Create UserExtended', 'url'=>array('create')),
	array('label'=>'Manage UserExtended', 'url'=>array('admin')),
);
?>

<h1>User Extendeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
