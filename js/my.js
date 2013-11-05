var myEnergy = {

    init: function init() {
        if( $("#homepage").length ) {
          this.renderDiagram();
        }

        if( $("#writePage").length ) {
            this.prefillDate();
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

            h = ((h < 10) ? "0" + h : h);
            min = ((min < 10) ? "0" + min : min);

            console.debug("H:" + h);
            console.debug("min:" + min);

            // YYYY-MM-DD HH:MM:SS.SSS
            dataInput.val(y+"-"+m+"-"+d+" "+h+":"+min);
        }
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