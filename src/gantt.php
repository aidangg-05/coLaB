<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $chartData = json_decode($_POST['chartData'], true);

    // Extract and save chart details
    $numberOfRows = count($chartData);
    $numberOfCols = count($chartData[0]['weeks']);

    // Save row names and other details to your database
    // Example: $mysqli->query("INSERT INTO your_table (row_name, week_number, color) VALUES ...");

    foreach ($chartData as $row) {
        $rowName = $row['task'];

        foreach ($row['weeks'] as $week) {
            $weekNumber = $week['week'];
            $color = $week['color'];

            // Save row name, week number, and color to your database
            // Example: $mysqli->query("INSERT INTO your_table (row_name, week_number, color) VALUES ('$rowName', '$weekNumber', '$color')");
        }
    }

    echo "Chart data saved successfully!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_gantt.css">
    <title>Gantt Chart Generator</title>
</head>
<body>
<h1>Gantt Chart Generator</h1>

<button class="create-chart" onclick="openChartModal()">Create Chart</button>

<div id="chartModal">
    <h2>Enter Gantt Chart Details</h2>
    <label for="rows">Number of Rows:</label>
    <input type="number" id="rows" min="1" required>
    <label for="cols">Number of Weeks:</label>
    <input type="number" id="cols" min="1" required>
    <button class="create-chart" onclick="createChart()">Create Chart</button>
</div>

<div id="chartContainer"></div>

<button onclick="saveChart()">Save Chart</button>

<script>
    function openChartModal() {
        const chartModal = document.getElementById('chartModal');
        chartModal.style.display = 'block';
    }

    function closeChartModal() {
        const chartModal = document.getElementById('chartModal');
        chartModal.style.display = 'none';
    }

    function createChart() {
        const rows = document.getElementById('rows').value;
        const cols = document.getElementById('cols').value;

        if (!rows || !cols) {
            return;
        }

        const chartModal = document.getElementById('chartModal');
        chartModal.style.display = 'none';

        const chartContainer = document.getElementById('chartContainer');
        const table = document.createElement('table');

        // Create header row
        const headerRow = table.insertRow();
        for (let i = 0; i <= cols; i++) {
            const headerCell = headerRow.insertCell();
            headerCell.textContent = i === 0 ? 'Task' : 'Week ' + i;
        }

        // Create rows and cells
        for (let i = 1; i <= rows; i++) {
            const row = table.insertRow();
            const cell = row.insertCell(0);
            cell.textContent = 'Task ' + i;
            cell.contentEditable = true; // Allow row name editing
            cell.addEventListener('blur', updateRowName);

            for (let j = 1; j <= cols; j++) {
                const cell = row.insertCell();
                cell.dataset.row = i;
                cell.dataset.col = j;
                cell.addEventListener('click', toggleColor);
            }
        }

        chartContainer.innerHTML = '';
        chartContainer.appendChild(table);
        showColorPicker();
    }

    function toggleColor(event) {
        const cell = event.target;
        const currentColor = cell.style.backgroundColor;

        if (currentColor === 'transparent' || currentColor === '') {
            cell.style.backgroundColor = getSelectedColor();
        } else {
            cell.style.backgroundColor = 'transparent';
        }
    }

    function showColorPicker() {
        const colorPicker = document.createElement('input');
        colorPicker.type = 'color';
        colorPicker.className = 'color-picker';
        document.body.appendChild(colorPicker);
    }

    function getSelectedColor() {
        const colorPicker = document.querySelector('.color-picker');
        return colorPicker.value;
    }

    function updateRowName(event) {
        const cell = event.target;
        const row = cell.parentElement;
        const taskIndex = row.rowIndex;
        const newTaskName = cell.textContent;
        // You can update the row name in your data structure here if needed
    }

    function saveChart() {
        const chartTable = document.querySelector('table');
        const rows = chartTable.rows;
        const chartData = [];

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].cells;
            const rowData = {
                task: cells[0].textContent,
                weeks: []
            };

            for (let j = 1; j < cells.length; j++) {
                rowData.weeks.push({
                    week: j,
                    color: cells[j].style.backgroundColor || 'transparent'
                });
            }

            chartData.push(rowData);
        }

        // Send chart data to the server without showing any pop-ups
        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'chartData=' + JSON.stringify(chartData),
        })
            .then(response => response.text())
            .then(data => console.log(data)) // Log the response (for debugging purposes)
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
