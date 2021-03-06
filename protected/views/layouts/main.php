<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> > <?php echo CHtml::encode( Yii::app()->userInfo->businessName ); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Account', 'url'=>array('/user/update', 'id'=>Yii::app()->user->id)),
				array('label'=>'Businesses', 'url'=>array('/business/admin')),
				array('label'=>'Clients', 'url'=>array('/client/admin')),
				array('label'=>'Creditors', 'url'=>array('/creditor/admin')),
				array('label'=>'Invoices', 'url'=>array('/invoice/admin'), 'items'=>array(
					array('label'=>'Payments', 'url'=>array('/invoicePayment/admin')),
					array('label'=>'Payment Types', 'url'=>array('/paymentMethod/admin')),
					array('label'=>'Invoice sent records', 'url'=>array('/invoiceSent/admin')),
					array('label'=>'Jobs', 'url'=>array('/job/admin')),
					array('label'=>'Job Types', 'url'=>array('/jobType/admin')),
					array('label'=>'Expense Types', 'url'=>array('/expenseType/admin')),
					array('label'=>'Expenses', 'url'=>array('/expense/admin')),
					array('label'=>'Expense Totals', 'url'=>array('/expense/calculateExpenses')),
					array('label'=>'BAS periods', 'url'=>array('/basPeriod/admin')),
				)),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>