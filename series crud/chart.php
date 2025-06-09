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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Dark background */
            color: #ffffff; /* Light text color */
            text-align: center;
            margin: 20px;
        }
        .chart-container {
            width: 50%;
            margin: 20px auto;
            background: #1e1e1e; /* Darker container background */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }
        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Gender Chart -->
    <div class="chart-container">
        <h2>Gender Distribution</h2>
        <canvas id="genderChart"></canvas>
    </div>

    <!-- Place Chart -->
    <div class="chart-container">
        <h2>Place Distribution</h2>
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
                        color: '#ffffff',  // White text color for the labels
                        font: {
                            weight: 'bold',
                            size: 12
                        }
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#ffffff', // White text color for legend
                            font: {
                                size: 12
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
                    backgroundColor: ['#4caf50', '#2196f3', '#ff9800', '#f44336', '#9c27b0']
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
                        color: '#ffffff',  // White text color for the labels
                        font: {
                            weight: 'bold',
                            size: 12
                        }
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#ffffff', // White text color for legend
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
