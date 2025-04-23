<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="style-main.css">
    <style>
        #subjects-container {
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="content">
            <div class="left">
                <div class="logo">
                    <img src="logo.png" alt="Website Logo">
                </div>
            </div>

            <div class="body">
                <div class="form-container">
                    <h2>Student Information</h2>

                    <form action="process.php" method="POST">
                        <div class="row">
                            <input type="text" name="name" placeholder="Student Name" required>
                            <input type="number" name="age" placeholder="Age" required>
                        </div>

                        <div class="details">
                            <select id="grade" name="grade" required>
                                <option value="" disabled selected>Grade Level</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div>

                        <h3>Subjects & Scores</h3>
                        <div id="subjects-container">
                            <div class="subjects">
                                <select name="subjects[]" required>
                                    <option value="" disabled selected>Subjects</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="English">English</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Science">Science</option>
                                    <option value="Araling Panlipunan">Araling Panlipunan</option>
                                    <option value="EsP">Edukasyon sa Pagpapakatao (EsP)</option>
                                    <option value="PE">Physical Education</option>
                                    <option value="TLE">Technology and Livelihood Education (TLE)</option>
                                </select>
                                <input type="number" name="scores[]" placeholder="Score" required min="0" max="100">
                            </div>
                            


                            <div class="subjects">
                                <select name="subjects[]" required>
                                    <option value="" disabled selected>Subjects</option>
                                    <option value="Filipino">Filipino</option>
                                    <option value="English">English</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Science">Science</option>
                                    <option value="Araling Panlipunan">Araling Panlipunan</option>
                                    <option value="EsP">Edukasyon sa Pagpapakatao (EsP)</option>
                                    <option value="PE">Physical Education</option>
                                    <option value="TLE">Technology and Livelihood Education (TLE)</option>
                                </select>
                                <input type="number" name="scores[]" placeholder="Score" required min="0" max="100">
                            </div>
                        </div>
                        

                        <div class="button-container">
                            <button type="button" onclick="addSubject()">Add More Subjects</button>
                            <button type="submit">Submit</button>
                        </div>
                    </form>

                    <a href="students.php" class="view-studrec">View Student Records</a>
                </div>
            </div>

            <div class="right"></div>
        </div>
    </div>

    <script>
        let subjectCount = 1;
        function addSubject() {
            let div = document.createElement("div");
            div.classList.add("subjects");
            div.innerHTML = `
                <select name="subjects[]" required>
                    <option value="" disabled selected>Subjects</option>
                    <option value="Filipino">Filipino</option>
                    <option value="English">English</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Science">Science</option>
                    <option value="Araling Panlipunan">Araling Panlipunan</option>
                    <option value="EsP">Edukasyon sa Pagpapakatao (EsP)</option>
                    <option value="PE">Physical Education</option>
                    <option value="TLE">Technology and Livelihood Education (TLE)</option>
                </select>
                <input type="number" name="scores[]" placeholder="Score" required min="0" max="100">
            `;
            document.getElementById("subjects-container").appendChild(div);
            
            subjectCount++;
            if (subjectCount > 1) {
                document.getElementById("subjects-container").style.overflowY = "auto";
            }
        }
    </script>

</body>

</html>
