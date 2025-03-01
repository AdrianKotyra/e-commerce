google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(loadChartData);
google.charts.setOnLoadCallback(loadChartDataStock);
google.charts.setOnLoadCallback(loadChartDataGenders);


function loadChartData() {
    fetch('ajax/get_products_views.php')
        .then(response => response.json())
        .then(data => drawChartviews(data));
}
function loadChartDataStock() {
    fetch('ajax/get_products_stock.php')
        .then(response => response.json())
        .then(data => drawChartStock(data));
}
function loadChartDataGenders() {
    fetch('ajax/get_products_genders.php')
        .then(response => response.json())
        .then(data => drawChartGenders(data));
}
function drawChartviews(dataArray) {
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
        animation:
        {
            "startup": true,
            duration: 1000,
            easing: 'out'
        }

    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_views'));
    chart.draw(data, options);
}
function drawChartStock(dataArray) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Product');
    data.addColumn('number', 'stock');
    data.addRows(dataArray);

    var options = {
        title: 'Product quantity',
        hAxis: { title: 'Products', slantedText: true, slantedTextAngle: 45 },
        vAxis: { title: 'Number of stock' },
        bars: 'vertical',
        height: 600,
        series: {
            0: { color: '#34b5b8' },

        },
        animation:
        {
            "startup": true,
            duration: 1000,
            easing: 'out'
        }

    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_stock'));
    chart.draw(data, options);
}

function drawChartGenders(dataArray) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Gender');
    data.addColumn('number', 'Count');
    data.addRows(dataArray);
    var options = {
        title: '',
        pieHole: 0.4,
        height: 500,
        animation:
        {
            "startup": true,
            duration: 1000,
            easing: 'out'
        }

    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div_genders'));
    chart.draw(data, options);
}