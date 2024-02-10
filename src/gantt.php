<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_gantt.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>Gantt Chart Generator</title>
</head>
<body>
<nav class="navbar">
    <ul>
        <li><span class="material-symbols-outlined" onclick="window.location.href='index.php'" style="font-size: 20px">arrow_back</span></li>
        <li onclick="goProjects()">Projects</li>
        <li style="background-color: white;color: black">Gantt Chart</li>
    </ul>
</nav>
<section class="mainbody">
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

</section>

<script>
    let rows;

    function openChartModal() {
        const chartModal = document.getElementById('chartModal');
        chartModal.style.display = 'block';
    }

    function closeChartModal() {
        const chartModal = document.getElementById('chartModal');
        chartModal.style.display = 'none';
    }

    function createChart() {
        rows = document.getElementById('rows').value;
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
            // Set a cool color gradient based on row index
            const rowIndex = cell.parentElement.rowIndex - 1; // Subtract 1 to exclude the header row
            const coolColor = getCoolColor(rowIndex);
            cell.style.backgroundColor = coolColor;
        } else {
            cell.style.backgroundColor = 'transparent';
        }
    }

    // Function to get a cool color based on the row index
    function getCoolColor(rowIndex) {
        // You can adjust the color gradient as needed
        const startColor = [0, 128, 255]; // Blue
        const endColor = [0, 255, 128]; // Green

        const coolColor = startColor.map((start, i) =>
            Math.round(start + (endColor[i] - start) * (rowIndex / (rows - 1)))
        );

        return `rgb(${coolColor.join(',')})`;
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

        const formData = new FormData();
        formData.append('chartData', JSON.stringify(chartData));

        fetch('save_chart.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
    }

    function goProjects() {
        window.location.href = "projectpage.php";
    }
</script>
</body>
</html>
-->