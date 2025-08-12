<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Performance Analytics</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f7fa;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .chart-container {
      width: 100%;
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    canvas {
      max-width: 100%;
      height: 400px;
    }
  </style>
</head>
<body>

  <h1>Performance Analytics - Student Report (Form 1 to 3)</h1>

  <div class="chart-container">
    <canvas id="performanceChart"></canvas>
  </div>

  <script>
    const labels = [
      'F1 T1', 'F1 T2', 'F1 T3',
      'F2 T1', 'F2 T2', 'F2 T3',
      'F3 T1', 'F3 T2', 'F3 T3'
    ];

    const subjects = {
      Mathematics: [68, 70, 75, 77, 85, 86, 84, 89, 91],       // mixed jump and slow rise
      English:     [60, 64, 65, 66, 68, 72, 75, 77, 80],       // slow and steady
      Kiswahili:   [72, 74, 76, 78, 75, 77, 80, 81, 82],       // plateau then rise
      Biology:     [64, 66, 67, 70, 73, 75, 76, 78, 80],       // steady
      Physics:     [55, 60, 58, 62, 65, 68, 66, 70, 73],       // ups and downs
      Chemistry:   [58, 60, 63, 65, 67, 72, 74, 76, 78],       // gradual then spike
      Geography:   [70, 72, 71, 74, 77, 78, 80, 83, 85],       // mixed growth
      History:     [75, 78, 80, 82, 81, 83, 85, 87, 88]        // steady with small dips
    };

    const datasets = Object.entries(subjects).map(([subject, data], i) => ({
      label: subject,
      data,
      borderColor: `hsl(${i * 45}, 70%, 50%)`,
      backgroundColor: `hsl(${i * 45}, 70%, 80%)`,
      fill: false,
      tension: 0.4
    }));

    new Chart(document.getElementById('performanceChart'), {
      type: 'line',
      data: {
        labels,
        datasets
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Subject Performance Over Terms'
          },
          legend: {
            position: 'bottom'
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        },
        interaction: {
          mode: 'nearest',
          axis: 'x',
          intersect: false
        },
        scales: {
          y: {
            title: {
              display: true,
              text: 'Score (%)'
            },
            min: 0,
            max: 100,
            ticks: {
              stepSize: 10
            }
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
  </script>

</body>
</html>
