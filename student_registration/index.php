<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reg_number = $_POST["reg_number"];
    $course = $_POST["course"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO students (name, email, reg_number, course, dob, gender)
            VALUES ('$name', '$email', '$reg_number', '$course', '$dob', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
            
            /* height: 100vh; */
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            width: 400px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        h3 {
            text-align: center;
            color: #333;
            margin: 0;

        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            margin-top: 5px;
        }


        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #444;


        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            cursor: pointer;
        }

        .gender-group {

            display: flex;

        }

        .gender-group label {
            font-weight: normal;
            margin-right: 15px;
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        .view-btn {
            background-color: #007bff;
            color: white;
            text-decoration: none;
        }

        .view-btn:hover {
            background-color: #0056b3;
        }

        img {
            width: 80px;
            color: #74ebd5;
            padding: 5px;
            height: 28px;
            align-items: center;
            background-color: #acb6e5;
            border-radius: 5px;
        }

        .div {
            display: flex;
            align-items: center;
            justify-content: center;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="div">
            <a href="https://www.8queens.com/" target="_blank">
                <img src="8queens_white_logo.png" alt="logo">
            </a>
        </div>
        <h2>Student Registration</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Register Number:</label>
            <input type="text" name="reg_number" required>

            <label>Course:</label>
            <select name="course" required>
                <option value="">-- Select Course --</option>
                <option value="BTech">BTech</option>
                <option value="BE">BE</option>
                <option value="BCom">BCom</option>
                <option value="MSc">MSc</option>
            </select>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

            <label>Gender:</label>
            <div class="gender-group">
                <input type="radio" name="gender" value="Male" required> <label>Male</label>
                <input type="radio" name="gender" value="Female" required> <label>Female</label>
            </div>

            <div class="btn-group">
                <button type="submit">Submit</button>
                <a href="view.php" class="view-btn"><button type="button">View</button></a>
            </div>
        </form>
    </div>
</body>

</html>