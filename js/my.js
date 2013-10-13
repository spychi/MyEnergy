var myEnergy = {

    init: function init() {
        if( $("#homepage").length ) {
          this.renderDiagram();
        }

        if( $("#writePage").length ) {
            this.prefillDate();
            this.handeWriteSubmit();
        }
    },


    prefillDate: function prefillDate () {
        var dataInput = $("#date");

        if (dataInput.val() == ""){
            var formattedDate = new Date();
            var d = formattedDate.getDate();
            var m =  formattedDate.getMonth() + 1;
            var y = formattedDate.getFullYear();
            var h = formattedDate.getHours();
            var min = formattedDate.getMinutes();

            dataInput.val(d + "." + m + "." + y + " " + h + ":" + min);
        }
    },


    handeWriteSubmit: function handeWriteSubmit () {
        $("#write").submit(function(event){
            event.preventDefault();

            var value = $("#date").val().split(" ");

            //date
            if(value[0] != undefined) {
                var date = value[0].split(".");
                var day = date[0];
                var month = date[1];
                var year = date[2];
                if(year.length == 2 ) {year = "20" + date[2];}
            }

            //time
            if(value[1] != undefined) {
               var time = value[1].split(":");
               var min = time[0];
               var hours = time[1];
            } else {
                var min = 0;
                var hours = 0;
            }

            var formattedDate = new Date(year, month-1, day, min, hours);
            var ts = Math.round( formattedDate.getTime() / 1000);

            console.debug(formattedDate);
            console.debug(ts);
            $("#date_ts").val(ts);

            this.submit();
        })
    },


    renderDiagram: function renderDiagram () {
        //Get context with jQuery - using jQuery's .get() method.
        var ctx = $("#myChart").get(0).getContext("2d");
        var myNewChart = new Chart(ctx);
        new Chart(ctx).Bar(data, {
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
                scaleStartValue : 0
         });
    }
};


$(document).ready(function(){
    myEnergy.init();
});