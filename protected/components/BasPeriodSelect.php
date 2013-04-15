<?php 

	class BasPeriodSelect extends CWidget
	{
		private $_periods;
		private $_selectedPeriod;
		
		public function init()
		{
			$this->_periods = BasPeriod::model()->findAll();
			$this->_periods = CHtml::listData($this->_periods, 'id', 'title');

			$this->_selectedPeriod = isset($_POST['period']) ? $_POST['period'] : null;
		}
		
		public function run()
		{
			$this->render('renderBasPeriodForm', array('selectedPeriod', $this->_selectedPeriod,
								'periods'=>$this->_periods));
		}
	}