 <?php
	
	//initialize the count variable
	$count=0;
	//Create an instance of now
	//This is used to determine the current month and also to calculate the first and last day of the month
	$now = new DateTime( 'now', new DateTimeZone( 'Asia/Kolkata' ) );
	//Create a DateTime representation of the first day of the current month based off of "now"
	$start = new DateTime( $now->format('m/01/Y'), new DateTimeZone( 'Asia/Kolkata' ) );
	//Create a DateTime representation of the last day of the current month based off of "now"
	$end = new DateTime( $now->format('m/t/Y'), new DateTimeZone( 'Asia/Kolkata' ) );
	//Define our interval (1 Day)
	$interval = new DateInterval('P1D');
	//Setup a DatePeriod instance to iterate between the start and end date by the interval
	$period = new DatePeriod( $start, $interval, $end );
	//Iterate over the DatePeriod instance
	foreach( $period as $date )
	{
		//Make sure the day displayed is ONLY sunday.
		if( $date->format('w') == 0 )
		{
			//echo $date->format( 'l, Y-m-d H:i:s' ).PHP_EOL;
			$count++;
		}	
	}
	$workingdays=(date("t")-$count);
	
	?>
