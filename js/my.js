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

});