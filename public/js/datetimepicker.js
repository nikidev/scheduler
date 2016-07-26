moment.locale('en', {
  week: { dow: 1 } // Monday is the first day of the week
});



$(function () {
    $('#hour').datetimepicker({
    	 
    	format: "YYYY-MM-DD HH:mm",

    });
});