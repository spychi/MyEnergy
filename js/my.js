$(document).ready(function(){

    var formattedDate = new Date();
    var d = formattedDate.getDate();
    var m =  formattedDate.getMonth() + 1;
    var y = formattedDate.getFullYear();
    var h = formattedDate.getHours();
    var min = formattedDate.getMinutes();
    var ts = Math.round( formattedDate.getTime() / 1000);

    $("#date").val(d + "." + m + "." + y + " " + h + ":" + min);
    $("#date_ts").val(ts);


     options = {

         //Boolean - If we show the scale above the chart data
         scaleOverlay : true,

         //Boolean - If we want to override with a hard coded scale
         scaleOverride : true,

         //** Required if scaleOverride is true **
         //Number - The number of steps in a hard coded scale
         scaleSteps : 10,
         //Number - The value jump in the hard coded scale
         scaleStepWidth : 3,
         //Number - The scale starting value
         scaleStartValue : 0,
    }


    //Get context with jQuery - using jQuery's .get() method.
    var ctx = $("#myChart").get(0).getContext("2d");
    var myNewChart = new Chart(ctx);
    var hund = new Chart(ctx).Bar(data, options);






});