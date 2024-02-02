<?php
// Replace these values with your actual database credentials
$hostname = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database_name';

try {
    // Connect to the MySQL database
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL code to create the gantt_chart table
    $sql = "
        CREATE TABLE IF NOT EXISTS gantt_chart (
            id INT AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(255) NOT NULL,
            week INT NOT NULL,
            color VARCHAR(20) DEFAULT 'transparent'
        );
    ";

    // Execute the SQL code
    $pdo->exec($sql);

    // If the table creation is successful, proceed with saving the chart data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $chartData = json_decode($_POST['chartData'], true);

        // Prepare and execute SQL statements to insert data
        $stmt = $pdo->prepare('INSERT INTO gantt_chart (task, week, color) VALUES (?, ?, ?)');

        foreach ($chartData as $data) {
            $task = $data['task'];
            $week = $data['week'];
            $color = $data['color'];

            $stmt->execute([$task, $week, $color]);
        }

        echo 'Data saved successfully.';
    } else {
        echo 'Invalid request.';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

