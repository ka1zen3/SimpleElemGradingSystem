<?php
session_start(); // Start or resume the session

// Reset all student records by destroying the session
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: students.php"); // Redirect to refresh the page
    exit;
}

// Delete a specific student record based on the index provided in the URL
if (isset($_GET['delete'])) {
    unset($_SESSION['students'][$_GET['delete']]); // Remove the student entry
    $_SESSION['students'] = array_values($_SESSION['students']); // Re-index the array to maintain order
    header("Location: students.php"); // Redirect to refresh the page
    exit;
}

// Sort students alphabetically by name, case-insensitive
if (!empty($_SESSION['students'])   ) {
    usort($_SESSION['students'], fn($a, $b) => strcasecmp($a['name'], $b['name']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style-students.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="container"> <!-- Main container for student records -->
        <div class="content">
            <h2>Student Records</h2>
            
            <!-- Check if there are any student records to display -->
            <?php if (!empty($_SESSION['students'])): ?>
                <table>
                    <tr>
                        <th>Name</th><th>Age</th><th>Grade</th><th>Subjects</th><th>Scores</th><th>Total</th><th>Average</th><th>Performance</th><th>Action</th>
                    </tr>
                    
                    <!-- Loop through each student and display their details in a table row -->
                    <?php foreach ($_SESSION['students'] as $index => $student): ?>
                        <tr>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['age'] ?></td>
                            <td><?= $student['grade'] ?></td>
                            <td>
                                <ul>
                                    <?php foreach ($student['subjects'] as $sub) echo "<li>$sub</li>"; ?> <!-- Display subjects as a list -->
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach ($student['scores'] as $score) echo "<li>$score</li>"; ?> <!-- Display scores as a list -->
                                </ul>
                            </td>
                            <td><?= $student['total'] ?></td> <!-- Total score -->
                            <td><?= $student['average'] ?></td> <!-- Average score -->
                            <td><?= $student['performance'] ?></td> <!-- Performance evaluation -->
                            <td>
                                <a href="students.php?delete=<?= $index ?>" class="delete-btn">Delete</a> <!-- Delete button for student record -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No student records available.</p> <!-- Message if no records exist -->
            <?php endif; ?>

            <div class="buttons"> <!-- Buttons for navigation and reset -->
                <a href="main.php" class="back-btn">Back to Registration</a> <!-- Link to registration page -->
                <a href="students.php?reset=true" class="reset-btn">Reset All</a> <!-- Link to reset all student records -->
            </div>
        </div>
    </div>  
</body>
</html>
