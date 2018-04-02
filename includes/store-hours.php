<?php
  date_default_timezone_set('Europe/Warsaw');
  $hours = array(
    'mon'=>array('00:00-00:00'),
    'tue'=>array('13:00-21:00'),
    'wed'=>array('13:00-21:00'),
    'thu'=>array('13:00-21:00'),
    'fri'=>array('16:00-23:00'),
    'sat'=>array('16:00-23:00'),
    'sun'=>array('00:00-00:00'),
  );
  $exceptions= array(
    'Christmas' => '12/25',
    'New Years Day' =>'1/1'

  );

  $open_now ="<strong><p style='color: green;'>We are open now! Today's hours are %open% until %closed%</p></strong>";
  $closed_now="<strong><p style='color: red;'>Sorry, we are closed. Today's hours are %open% until %closed%</p></strong>";
  $closed_all_day="<strong><p style='color: red;'>Sorry, we are closed on %day%</p></strong>";
  $exception="<strong><p style='color: red;'>Sorry, we are closed for %exception%</p></strong>";

  $time_format = 'g:ia';

  $days= array(
    'mon'=>'Mondays',
    'tue'=>'Thuesdays',
    'wed'=>'Wednesdays',
    'thu'=>'Thursdays',
    'fri'=>'Fridays',
    'sat'=>'Saturadays',
    'sun'=>'Sundays'
  );

 $day = strtolower(date("D"));
 $today = strtotime('today midnight');
 $now = strtotime(date("G:i"));
 $is_open = 0;
 $is_exception = false;
 $is_closed_all_day = false;

// Check if closed all day
 if($hours[$day][0] == '00:00-00:00') {
	$is_closed_all_day = true;
 }

// Check if currently open
 foreach($hours[$day] as $range) {
	 $range = explode("-", $range);
	 $start = strtotime($range[0]);
	 $end = strtotime($range[1]);
	 if (($start <= $now) && ($end >= $now)) {
		 $is_open ++;
	}
}

// Check if today is an exception
 foreach($exceptions as $ex => $ex_day) {
	 $ex_day = strtotime($ex_day);
	 if($ex_day === $today) {
		 $is_open = 0;
		 $is_exception = true;
		 $the_exception = $ex;
	 }
 }

// Output HTML
 if($is_exception) {
	 $exception = str_replace('%exception%', $the_exception, $exception);
	 echo $exception;
 } elseif($is_closed_all_day) {
	 $closed_all_day = str_replace('%day%', $days[$day], $closed_all_day);
	 echo $closed_all_day;
 } elseif($is_open > 0) {
	 $open_now = str_replace('%open%', date($time_format, $start), $open_now);
	 $open_now = str_replace('%closed%', date($time_format, $end), $open_now);
	 echo $open_now;
 } else {
	 $closed_now = str_replace('%open%', date($time_format, $start), $closed_now);
	 $closed_now = str_replace('%closed%', date($time_format, $end), $closed_now);
	 echo $closed_now;
 }

?>
