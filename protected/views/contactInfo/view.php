<?php
$this->breadcrumbs=array(
	'Contact Infos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ContactInfo', 'url'=>array('index')),
	array('label'=>'Create ContactInfo', 'url'=>array('create')),
	array('label'=>'Update ContactInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContactInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactInfo', 'url'=>array('admin')),
);
?>

<h1>View ContactInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pId',
		'name',
		'address1',
		'address2',
		'city',
		'state',
		'postcode',
		'mailAddress1',
		'MailAddress2',
		'mailCity',
		'mailState',
		'mailPostcode',
		'abn',
		'contactName',
		'contactNumber',
		'contactMobile',
		'contactFax',
		'contactEmail',
		'accountEmail',
		'notes',
		'created',
		'lastModified',
		'lastUpdatedBy',
	),
)); ?>
