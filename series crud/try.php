<!DOCTYPE html>
<html>
<head>
    <title>Pie Charts with Labels</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .chart-section {
            display: flex;
            margin: 2rem;
        }
        .chart-container {
            width: 50%;
        }
        .custom-labels {
            width: 50%;
            padding-left: 2rem;
        }
        .label-item {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        .color-box {
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-right: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <div class="chart-section">
        <div class="chart-container">
            <h2>Gender</h2>
            <canvas id="genderChart"></canvas>
        </div>
        <div class="custom-labels" id="genderLabels"></div>
    </div>

    <div class="chart-section">
        <div class="chart-container">
            <h2>Place</h2>
            <canvas id="placeChart"></canvas>
        </div>
        <div class="custom-labels" id="placeLabels"></div>
    </div>

    <script>
        Chart.register(ChartDataLabels);

        fetch('data.php')
            .then(response => response.json())
            .then(data => {
                const genderColors = ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0'];
                const placeColors = ['blue', 'red', 'green', 'yellow', 'violet'];

                // Render Gender Chart
                new Chart(document.getElementById('genderChart').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: data.genderLabels,
                        datasets: [{
                            data: data.genderCounts,
                            backgroundColor: genderColors
                        }]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                formatter: (value, context) => {
                                    const total = context.chart.data.datasets[0].data.reduce((a, b) => a + Number(b), 0);
                                    return ((value / total) * 100).toFixed(1) + "%";
                                },
                                color: '#fff',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                }
                            },
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                // Render Place Chart
                new Chart(document.getElementById('placeChart').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: data.placeLabels,
                        datasets: [{
                            data: data.placeCounts,
                            backgroundColor: placeColors
                        }]
                    },
                    options: {
                        plugins: {
                            datalabels: {
                                formatter: (value, context) => {
                                    const total = context.chart.data.datasets[0].data.reduce((a, b) => a + Number(b), 0);
                                    return ((value / total) * 100).toFixed(1) + "%";
                                },
                                color: '#fff',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                }
                            },
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                // Custom HTML labels for Gender
                const genderLabelContainer = document.getElementById('genderLabels');
                data.genderLabels.forEach((label, index) => {
                    const item = document.createElement('div');
                    item.className = 'label-item';
                    item.innerHTML = `<span class="color-box" style="background-color:${genderColors[index]}"></span>${label}`;
                    genderLabelContainer.appendChild(item);
                });

                // Custom HTML labels for Place
                const placeLabelContainer = document.getElementById('placeLabels');
                data.placeLabels.forEach((label, index) => {
                    const item = document.createElement('div');
                    item.className = 'label-item';
                    item.innerHTML = `<span class="color-box" style="background-color:${placeColors[index]}"></span>${label}`;
                    placeLabelContainer.appendChild(item);
                });

            });
    </script>
</body>
</html>
