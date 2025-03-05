google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(loadChartData);
google.charts.setOnLoadCallback(loadChartDataStock);
google.charts.setOnLoadCallback(loadChartDataGenders);
google.charts.setOnLoadCallback(loadChartDataReviews);

function loadChartData() {
    fetch('ajax/get_products_views.php')
        .then(response => response.json())
        .then(data => drawChartviews(data))
        .catch(error => console.error('Error loading view data:', error));
}

function loadChartDataStock() {
    fetch('ajax/get_products_stock.php')
        .then(response => response.json())
        .then(data => drawChartStock(data))
        .catch(error => console.error('Error loading stock data:', error));
}

function loadChartDataGenders() {
    fetch('ajax/get_products_genders.php')
        .then(response => response.json())
        .then(data => drawChartGenders(data))
        .catch(error => console.error('Error loading gender data:', error));
}

function loadChartDataReviews() {
    fetch('ajax/get_products_reviews.php')
        .then(response => response.json())
        .then(data => drawFeedbackCharts(data))
        .catch(error => console.error('Error loading review data:', error));
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
        series: { 0: { color: '#34b5b8' } },
        animation: { "startup": true, duration: 1000, easing: 'out' }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_views'));
    chart.draw(data, options);
}

function drawChartStock(dataArray) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Product');
    data.addColumn('number', 'Stock');
    data.addRows(dataArray);

    var options = {
        title: 'Product Quantity',
        hAxis: { title: 'Products', slantedText: true, slantedTextAngle: 45 },
        vAxis: { title: 'Number of Stock' },
        bars: 'vertical',
        height: 600,
        series: { 0: { color: '#34b5b8' } },
        animation: { "startup": true, duration: 1000, easing: 'out' }
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
        animation: { "startup": true, duration: 1000, easing: 'out' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div_genders'));
    chart.draw(data, options);
}

function drawFeedbackCharts(dataArray) {
    var chartDataArray = [["Rating", "Count", { role: "style" }]];
    var colors = ["#fe0000", "#fe6506", "#e5fe06", "#a2f25d", "#008000"];

    dataArray.forEach((item, index) => {
        let stars = "★".repeat(item[0]);
        chartDataArray.push([stars, item[1], colors[index % colors.length]]);
    });

    var data = google.visualization.arrayToDataTable(chartDataArray);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1, {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation"
    }, 2]);

    var options = {
        title: "Feedback Chart",
        width: 1000,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" }
    };

    var chart = new google.visualization.BarChart(document.getElementById("barchart_feedback"));
    chart.draw(view, options);
}
