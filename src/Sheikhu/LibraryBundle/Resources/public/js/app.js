$(function(){

    Chart.defaults.global.responsive = true;
    Chart.defaults.global.scaleOverride = true;


    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
    var ctx = $("#chart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var chart = new Chart(ctx);
    chart.Line(data, {
        scaleSteps: 5,
        // Number - The value jump in the hard coded scale
        scaleStepWidth: 20,
        // Number - The scale starting value
        scaleStartValue: 0,
        maintainAspectRatio: true,
        showScale: true
    });
});