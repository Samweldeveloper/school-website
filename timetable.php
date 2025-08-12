<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>High School Timetables</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f2f2;
      margin: 20px;
      color: #333;
    }

    h2 {
      text-align: center;
      margin: 30px 0 10px;
    }

    .timetable-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .class-timetable {
      background: #fff;
      border-radius: 10px;
      overflow-x: auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      min-width: 600px;
      margin-bottom: 30px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px 10px;
      text-align: center;
    }

    th {
      background-color: #0077b6;
      color: white;
      position: sticky;
      top: 0;
    }

    td.break, td.lunch, td.prep, td.games {
      background-color: #f0f0f0;
      font-weight: bold;
    }

    caption {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 10px;
      padding-top: 10px;
    }
  </style>
</head>
<body>

  <h2>High School Class Timetables (Form 1–4, Streams A–C)</h2>

  <div class="timetable-wrapper"></div>

  <script>
    const subjects = ["Math", "English", "Kiswahili", "Biology", "Chemistry", "Physics", "History", "Geography", "CRE", "Computer", "Business"];
    const forms = [1, 2, 3, 4];
    const streams = ['A', 'B', 'C'];
    const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

    function shuffle(arr) {
      return arr.slice().sort(() => Math.random() - 0.5);
    }

    function generateRow(day) {
      const s = shuffle(subjects);
      return `
        <tr>
          <td>${day}</td>
          <td contenteditable="true">${s[0]}</td>
          <td contenteditable="true">${s[1]}</td>
          <td class="break">Break</td>
          <td contenteditable="true">${s[2]}</td>
          <td contenteditable="true">${s[3]}</td>
          <td class="break">Tea Break</td>
          <td contenteditable="true">${s[4]}</td>
          <td contenteditable="true">${s[5]}</td>
          <td class="lunch">Lunch</td>
          <td class="prep">Prep</td>
          <td contenteditable="true">${s[6]}</td>
          <td contenteditable="true">${s[7]}</td>
          <td contenteditable="true">${s[8]}</td>
          <td class="games">Games</td>
        </tr>`;
    }

    const container = document.querySelector(".timetable-wrapper");

    forms.forEach(form => {
      streams.forEach(stream => {
        const caption = `Form ${form}${stream} Timetable`;
        const table = document.createElement('div');
        table.className = "class-timetable";

        table.innerHTML = `
          <table>
            <caption>${caption}</caption>
            <thead>
              <tr>
                <th>Day</th>
                <th>8:00–8:40</th>
                <th>8:40–9:20</th>
                <th>9:20–9:40</th>
                <th>9:40–10:20</th>
                <th>10:20–11:00</th>
                <th>11:00–11:20</th>
                <th>11:20–12:00</th>
                <th>12:00–12:40</th>
                <th>12:40–1:20</th>
                <th>1:20–2:00</th>
                <th>2:00–2:40</th>
                <th>2:40–3:20</th>
                <th>3:20–4:00</th>
                <th>4:00–5:00</th>
              </tr>
            </thead>
            <tbody>
              ${days.map(generateRow).join('')}
            </tbody>
          </table>
        `;
        container.appendChild(table);
      });
    });
  </script>

</body>
</html>
