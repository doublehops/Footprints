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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/invoice.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<table>
		<tr>
			<td width="580" style="font-size: 50px;"><?php echo CHtml::encode( Yii::app()->userInfo->businessName ); ?></td>
			<td>
				<ul style="list-style-type: none;">
					<li>ABN: 50 482 990 306</li>
					<li>6/8 William St</li>
					<li>South Yarra</li>
					<li>Vic, 3141</li>
					<li>Phone: 0418 998 283</li>
					<li>Web: www.doublehops.com </li>
					<li>Email: damien@doublehops.com </li>
				</ul>
			</td>
		</tr>
	</table>

	<h1>Tax Invoice</h1>


	<?php echo $content; ?>

	<hr />
	
	<div id="paymentOptions">
		<h4>Payment options</h4>
		<table>
			<tr>
				<td>
					<h5>By post:</h5>
				</td>
				<td>
					<h5>By direct deposit:</h5>
				</td>
			</tr>
			<tr>
				<td>
					<ul>
						<li>Doublehops</li>
						<li>6/8 William St</li>
						<li>South Yarra</li>
						<li>Vic, 3141</li>
					</ul>
				</td>
				<td>
					<ul>
						<li><span>Bank:</span> ANZ</li>
						<li><span>Account name:</span> Doublehops</li>
						<li><span>BSB:</span> 013 400</li>
						<li><span>Account number:</span> 2507 40431</li>
					</ul>
				</td>

			</tr>
		</table>
	</div>

</div><!-- page -->

</body>
</html>