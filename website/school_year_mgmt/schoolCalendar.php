<?php require('../calendar/classes/tc_calendar.php');
//require('../model/holiday_class.php');
//require('../model/holiday_db.php');

class schoolCalendar extends tc_calendar {                              
    

    //calendar constructor
	function schoolCalendar($objname, $date_picker = false, $show_input = true){
                parent::tc_calendar($objname, $date_picker, $show_input);
		parent::setObjName($objname);
		//$this->date_picker = $date_picker;

		//set default year display from current year
		parent::setIcon("../calendar/images/iconCalendar.gif");
                parent::setDate(date('d'), date('m'), date('Y'));
                parent::disabledDay("Sat");
                parent::disabledDay("sun");
                parent::setPath("../calendar/");
                parent::setYearInterval(2010, 2025);
                parent::dateAllow('2008-05-13', '2040-03-01');
                parent::setDateFormat('j F Y');
                parent::setAlignment('left', 'bottom');     
                
	}
        
        function disableHolidays($sy_id){
           $YearHolidays = HolidayDB::getHolidaysBysYear($sy_id);
            
            //Need to change holidays as not available
                foreach ($YearHolidays as $holiday) : 
                    parent::setSpecificDate(array($holiday->getStartDate(),$holiday->getEndDate() ), 0, ''); 
                  //  parent::setSpecificDate(); 
                   // parent::disabledDay($day);
                    endforeach; 
        }
        
        function disableAllHolidays(){
           $YearHolidays = HolidayDB::getHolidays();
            
            //Need to change holidays as not available
                foreach ($YearHolidays as $holiday) : 
                   parent::setSpecificDate(array($holiday->getStartDate(),$holiday->getEndDate() ), 0, ''); 
                  //  parent::setSpecificDate(); 
                   // parent::disabledDay($day);
                    endforeach; 
        }
}
    ?> 
