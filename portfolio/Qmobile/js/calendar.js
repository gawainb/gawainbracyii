$("#view-calendar").live('pageinit', function(event, ui) {
   $("#calendar").jqmCalendar({
      events : [ { "summary" : "Test event", "begin" : new Date("2013-02-05 00:00:00"), "end" : new Date("2013-02-07 00:00:00") }, { "summary" : "Test event", "begin" : new Date(), "end" : new Date() }, { "summary" : "Test event", "begin" : new Date(), "end" : new Date() } ],
      months : ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      days : ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
      startOfWeek : 0
   });
})


$(document).ready(function() {

}); // End Ready