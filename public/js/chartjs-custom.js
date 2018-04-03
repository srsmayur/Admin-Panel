$(document).ready(function(){

    var url = 'http://localhost/Admin-panel/public/chart';
    $.ajax({
        url: url,  //Server script to process data
        type: 'GET',
        dataType: 'json',
        success: function (response) {


        },
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });
var trace1 = {
    x: [1, 2, 3, 4],
    y: [10, 15, 13, 17],
    mode: 'markers',
    name: 'Scatter'
};

var trace2 = {
    x: [2, 3, 4, 5],
    y: [16, 5, 11, 9],
    mode: 'lines',
    name: 'Lines'
};

var data = [trace1, trace2];

var layout = {
    title: 'Title of the Graph',
    xaxis: {
        title: 'x-axis title'
    },
    yaxis: {
        title: 'y-axis title'
    }
};

Plotly.newPlot('myDiv', data, layout);
});