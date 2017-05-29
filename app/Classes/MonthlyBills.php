<?php

namespace App\Classes;

class MonthlyBills {
	// Provides the logic for building the Monthly Bills view
	private $monthBills;		// Array to store all Bills for the month
	private $repeatingBills;	// Array to store all Repeating Bills for the month
	private $manualBills;		// Array to store all the Manual Bills for the month
	private $monthDate;			// DateTime value of the date to use for the month
	private $monthInterval;		// DateInterval of a month
	
	public function __construct($date = null) {
		// MonthlyBills constructor
		// If $date is null, get current date
		if ($date === null) {
			$this->monthDate = new DateTime('now');
		}
		else {
			$this->monthDate = $date;
		}
		
		$this->monthInterval = new DateInterval('P1M');
	}
	
	public function nextMonth() {
		// Add a month to $this->monthDate and update $this->monthBills
		$this->monthDate->add($this->monthInterval);
		
		$this->buildMonthBills();
	}
	
	public function prevMonth() {
		// Subtract a month from $this->monthDate and update $this->monthBills
		$this->monthDate->sub($this->monthInterval);
		
		$this->buildMonthBills();
	}
	
	private function buildMonthBills() {
		// Build $this->monthBills
		$this->monthBills = [];
		
	}
	
	private function buildRepeatingBills() {
		// Build $this->repeatingBills
		$this->repeatingBills = [];
		
	}
	
	private function buildManualBills() {
		// Build $this->manualBills
		$this->manualBills = [];
		
	}

}