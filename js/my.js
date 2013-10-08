$(document).ready(function(){

    var date = $.now();
    var formattedDate = new Date(date);
    var d = formattedDate.getDate();
    var m =  formattedDate.getMonth() + 1;
    var y = formattedDate.getFullYear();
    var h = formattedDate.getHours();
    var min = formattedDate.getMinutes();

    console.debug();

    $("#date").val(d + "." + m + "." + y + " " + h + ":" + min);
    $("#date_ts").val(date);

});