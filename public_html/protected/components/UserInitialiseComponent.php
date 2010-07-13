<?php
/*
 * Created on 07/07/2009
 *
 * 
 */
 
	class UserInitialiseComponent
	{
		public $business;
		public $businessName;
				
		function init()
		{
			if( !Yii::app()->user->isGuest )
			{
				$result = User::model()->findbyPk( Yii::app()->user->id ); 
				$resultInfo = $result->userExtended;
				
				$business = Business::model()->findbyPk( $resultInfo->currentBusinessId );
				
				$this->business = $resultInfo->currentBusinessId;
				$this->businessName = $business->businessName;
				$this->gstEnabled = $business->gstEnabled;
				$this->gstRate = $business->gstRate;
			}
		}
	}
?>
