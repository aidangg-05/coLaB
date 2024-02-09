<!DOCTYPE html>
<?php include 'projectpage_backend.php'?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_gantt.css">
    <!--For icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!--For gantt chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Gantt Chart Generator</title>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['gantt']});
        google.charts.setOnLoadCallback(drawChart);

        function daysToMilliseconds(days) {
            return days * 24 * 60 * 60 * 1000;
        }

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');

            // Fetch data from PHP and populate the chart
            var taskData = [
                <?php
                while ($task = mysqli_fetch_assoc($tasks_result)) {
                    $task_name = $task['task_name'];
                    $due = $task['due_date'];
                    $status = $task['status'];
                    $dateParts = explode('-', $due);
                    $year = intval($dateParts[0]);
                    $month = intval($dateParts[1]) - 1; // JavaScript months are 0-based
                    $day = intval($dateParts[2]);

                    $percentage = 0;
                    if ($status === 'In Progress') {
                        $percentage = 50;
                    } else if ($status === 'Finished') {
                        $percentage = 100;
                    }

                    echo "['$task_name', '$task_name', new Date(2024, 1, 9), new Date($year, $month, $day), null, $percentage, null],";
                }
                ?>
            ];

            data.addRows(taskData);

            var options = {
                'height': 275,
                gantt: {
                    barCornerRadius: 5, // Rounded corners for task bars
                    innerGridTrack: { fill: '#f2f2f2' }, // Color for grid lines
                    labelStyle: {
                        fontSize: 16,
                        fontName: 'Roboto', // Modern font
                        color: '#333' // Font color
                    },
                    percentEnabled: true, // Show percentage complete
                    percentStyle: 'fill', // Percentage bar style
                    percentPosition: 'inside', // Percentage position
                    barHeight: 20

                }
            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
            // Adjust chart height after drawing
            adjustChartHeight();
        }
        // Adjust chart height based on content
        function adjustChartHeight() {
            var chartDiv = document.getElementById('chart_div');
            var chartHeight = chartDiv.scrollHeight; // Get the scroll height of the chart container
            chartDiv.style.height = chartHeight + 'px'; // Set the height of the chart container
        }
    </script>
    <style>
        #chart_div{
            margin: 20px auto; /* Center the chart horizontally */
            background-color: white; /* Chart background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Subtle shadow effect */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            min-height: 200px; /* Minimum height to ensure visibility */
            overflow: auto; /* Add overflow */
        }
    </style>
</head>
<body>
<nav class="navbar">
    <ul>
        <li><span class="material-symbols-outlined" onclick="window.location.href='index.php'" style="font-size: 20px">arrow_back</span></li>
        <li onclick="window.location.href='projectpage.php'">Projects</li>
        <li style="background-color: white;color: black">Gantt Chart</li>
    </ul>
</nav>
<h1 style="text-align: center;">Project's Gantt Chart</h1>
<div id="chart_div" style="margin: 10px"></div>


</body>
</html>

