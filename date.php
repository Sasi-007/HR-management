<html>
<head>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
<input type="text" name="date"  placeholder="date" />
<input type="text" name="date"  placeholder="date" />
<script>
$(function() {
  $('input[name="date"]').daterangepicker({
    
	timePicker: true,
    showDropdowns: true,
  //  minYear: 1901,
   // maxYear: parseInt(moment().format('YYYY'),10),
	startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
	format: ' hh:mm A'}
  });
});
</script>
</body>
</html>