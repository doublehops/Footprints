<?php
$this->breadcrumbs=array(
	'Contact Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ContactInfo', 'url'=>array('index')),
	array('label'=>'Create ContactInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contact-info-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contact Infos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pId',
		'name',
		'address1',
		'address2',
		'city',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
