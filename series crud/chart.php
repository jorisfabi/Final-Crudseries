<?php
include 'connect.php';

$sql = "SELECT gender, COUNT(*) AS count FROM `seriescrud` GROUP BY gender";
$result = mysqli_query($con, $sql);
$genderLabels = [];
$genderCounts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $genderLabels[] = ucfirst($row['gender']); 
    $genderCounts[] = $row['count'];
}

$sql = "SELECT place, COUNT(*) AS count FROM `seriescrud` GROUP BY place";
$result = mysqli_query($con, $sql);

$placeLabels = [];
$placeCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $placeLabels[] = ucwords($row['place']);
    $placeCounts[] = $row['count'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pie Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .chart-container {
            width: 40%;
            float: left;
            margin: 2rem;
        }
        h2 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <!-- Gender Chart -->
    <div class="chart-container">
        <h2>Gender: </h2>
        <canvas id="genderChart"></canvas>
    </div>

    <!-- Place Chart -->
    <div class="chart-container">
        <h2>Place: </h2>
        <canvas id="placeChart"></canvas>
    </div>

    <script>
        Chart.register(ChartDataLabels);

        // Gender Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($genderLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($genderCounts); ?>,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data.map(v => Number(v));
                            const total = data.reduce((a, b) => a + b, 0);
                            const percentage = ((Number(value) / total) * 100);
                            return percentage.toFixed(1) + "%";
                        },
                        color: '#000',  // Text color for the labels
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        // Position the labels outside of the pie chart
                        align: 'start',
                        anchor: 'end',
                        offset: 20  // Move the labels outside the pie
                    },
                    legend: {
                        position: 'right',  // Position the legend to the right of the pie
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        // Place Chart
        const placeCtx = document.getElementById('placeChart').getContext('2d');
        new Chart(placeCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($placeLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($placeCounts); ?>,
                    backgroundColor: ['blue', 'red', 'green', 'yellow', 'violet']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            const data = context.chart.data.datasets[0].data.map(v => Number(v));
                            const total = data.reduce((a, b) => a + b, 0);
                            const percentage = ((Number(value) / total) * 100);
                            return percentage.toFixed(1) + "%";
                        },
                        color: '#000',  // Text color for the labels
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        // Position the labels outside of the pie chart
                        align: 'start',
                        anchor: 'end',
                        offset: 20  // Move the labels outside the pie
                    },
                    legend: {
                        position: 'right',  // Position the legend to the right of the pie
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
