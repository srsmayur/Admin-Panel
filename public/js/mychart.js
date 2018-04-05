$(document).ready(function() {
google.charts.load('current', {'packages':['line']});
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    $.ajax({
        type: 'GET',
        url: 'http://localhost/Admin-panel/public/chart/readdata',
        success: function (data1) {
            var data = new google.visualization.DataTable();+
                console.log( data );
            // Add legends with data type
            data.addColumn('number', 'MWAIT_BR_001_ACT');
            data.addColumn('number', 'MWAIT_DS_001_ACT');
            var jsonData = $.parseJSON(data1);

            for (var i = 0; i < jsonData.length; i++) {
                data.addRow([jsonData[i].MWAIT_BR_001_ACT, parseInt(jsonData[i].MWAIT_DS_001_ACT)]);
            }
            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Show Sales and Expense of Company'
                },
                width: 900,
                height: 500,
                axes: {
                    x: {
                        0: {side: 'bottom'}
                    }
                }

            };
            var chart = new google.charts.Line(document.getElementById('line_chart'));
            chart.draw(data, options);
        }
    });
}
});