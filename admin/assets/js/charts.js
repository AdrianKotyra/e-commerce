google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(loadChartData);

function loadChartData() {
    fetch('../public/ajax/get_products_views.php')
        .then(response => response.json())
        .then(data => drawChart(data));
}

function drawChart(dataArray) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Product');
    data.addColumn('number', 'Views');
    data.addRows(dataArray);

    var options = {
        title: 'Product Views',
        hAxis: { title: 'Products', slantedText: true, slantedTextAngle: 45 },
        vAxis: { title: 'Number of Views' },
        bars: 'vertical',
        height: 600,
        series: {
            0: { color: '#34b5b8' },

        },

    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_views'));
    chart.draw(data, options);
}