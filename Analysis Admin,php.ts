<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Academic Report</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f0f2f5;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    h1, h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .dashboard {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
      max-width: 1200px;
      margin: auto;
    }

    .chart-box {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    canvas {
      width: 100% !important;
      height: 400px !important;
    }
  </style>
</head>
<body>

  <h1>Admin Dashboard - Academic Report Overview</h1>

  <div class="dashboard">
    <!-- Line Chart -->
    <div class="chart-box">
      <h2>Performance Trend (Form 1 to 3)</h2>
      <canvas id="lineChart"></canvas>
    </div>

    <!-- Bar Chart -->
    <div class="chart-box">
      <h2>Average Scores Per Subject</h2>
      <canvas id="barChart"></canvas>
    </div>

    <!-- Pie Chart -->
    <div class="chart-box">
      <h2>Subject Contribution to Total Performance</h2>
      <canvas id="pieChart"></canvas>
    </div>
  </div>

  <script>
    const labels = [
      'F1 T1', 'F1 T2', 'F1 T3',
      'F2 T1', 'F2 T2', 'F2 T3',
      'F3 T1', 'F3 T2', 'F3 T3'
    ];

    const subjects = {
      Mathematics: [68, 70, 75, 77, 85, 86, 84, 89, 91],
      English:     [60, 64, 65, 66, 68, 72, 75, 77, 80],
      Kiswahili:   [72, 74, 76, 78, 75, 77, 80, 81, 82],
      Biology:     [64, 66, 67, 70, 73, 75, 76, 78, 80],
      Physics:     [55, 60, 58, 62, 65, 68, 66, 70, 73],
      Chemistry:   [58, 60, 63, 65, 67, 72, 74, 76, 78],
      Geography:   [70, 72, 71, 74, 77, 78, 80, 83, 85],
      History:     [75, 78, 80, 82, 81, 83, 85, 87, 88]
    };

    const colors = [
      'hsl(0, 70%, 50%)', 'hsl(45, 70%, 50%)', 'hsl(90, 70%, 50%)',
      'hsl(135, 70%, 50%)', 'hsl(180, 70%, 50%)', 'hsl(225, 70%, 50%)',
      'hsl(270, 70%, 50%)', 'hsl(315, 70%, 50%)'
    ];

    // Line chart dataset
    const lineDatasets = Object.entries(subjects).map(([subject, data], i) => ({
      label: subject,
      data,
      borderColor: colors[i],
      fill: false,
      tension: 0.4
    }));

    // Bar chart data (average per subject)
    const subjectNames = Object.keys(subjects);
    const subjectAverages = Object.values(subjects).map(arr =>
      Math.round(arr.reduce((a, b) => a + b, 0) / arr.length)
    );

    // Pie chart data
    const pieColors = colors;
    const totalSum = subjectAverages.reduce((a, b) => a + b, 0);
    const subjectContribution = subjectAverages.map(score =>
      Math.round((score / totalSum) * 100)
    );

    // Line Chart
    new Chart(document.getElementById('lineChart'), {
      type: 'line',
      data: {
        labels,
        datasets: lineDatasets
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Performance Trends'
          },
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          y: {
            title: {
              display: true,
              text: 'Score (%)'
            },
            min: 0,
            max: 100
          },
          x: {
            title: {
              display: true,
              text: 'Term'
            }
          }
        }
      }
    });

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: subjectNames,
        datasets: [{
          label: 'Average Score (%)',
          data: subjectAverages,
          backgroundColor: colors
        }]
      },
      options: {
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Subject Averages'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 100,
            title: {
              display: true,
              text: 'Average Score (%)'
            }
          }
        }
      }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels: subjectNames,
        datasets: [{
          data: subjectContribution,
          backgroundColor: pieColors
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Subject Contribution (%)'
          },
          legend: {
            position: 'right'
          }
        }
      }
    });
  </script>

</body>
</html>
