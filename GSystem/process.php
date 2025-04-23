<?php
session_start(); // Start the session to store student data

// Initialize students array in session if it doesn't exist
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $subjects = $_POST['subjects'];
    $scores = $_POST['scores'];

    // Check if the student already exists in session storage
    foreach ($_SESSION['students'] as &$student) {
        if ($student['name'] === $name) { // If the student exists, update their records
            // Append new subjects and scores to existing data
            $student['subjects'] = array_merge($student['subjects'], $subjects);
            $student['scores'] = array_merge($student['scores'], $scores);
            
            // Recalculate total score and average
            $student['total'] = array_sum($student['scores']);
            $student['average'] = round($student['total'] / count($student['scores']), 2);

            // Determine performance based on average score
            if ($student['average'] >= 90) {
                $student['performance'] = "Excellent";
            } elseif ($student['average'] >= 80) {
                $student['performance'] = "Very Good";
            } elseif ($student['average'] >= 70) {
                $student['performance'] = "Good";
            } elseif ($student['average'] >= 60) {
                $student['performance'] = "Passed";
            } else {
                $student['performance'] = "Failed";
            }

            // Redirect to students.php after updating data
            header("Location: students.php");
            exit;
        }
    }

    // If student is new, calculate total score and average
    $total = array_sum($scores);
    $average = round($total / count($scores), 2);

    // Determine performance category based on average score
    if ($average >= 90) {
        $performance = "Excellent";
    } elseif ($average >= 80) { 
        $performance = "Very Good";
    } elseif ($average >= 70) {
        $performance = "Good";
    } elseif ($average >= 60) {
        $performance = "Passed";
    } else {
        $performance = "Failed";
    }

    // Store the new student record in the session
    $_SESSION['students'][] = compact('name', 'age', 'grade', 'subjects', 'scores', 'total', 'average', 'performance');

    // Redirect to students.php after adding a new student
    header("Location: students.php");
    exit;
}
?>
