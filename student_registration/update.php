<?php
include 'db.php';

$id = $_GET['id'];

// Update form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reg_number = $_POST["reg_number"];
    $course = $_POST["course"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];

    $sql = "UPDATE students SET
            name='$name',
            email='$email',
            reg_number='$reg_number',
            course='$course',
            dob='$dob',
            gender='$gender'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
        exit;
    } else {
        echo "Update Error: " . $conn->error;
    }
} else {
    $data = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            /* height: 100vh; */
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            width: 400px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(40, 200, 54, 0.19);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
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
        }

        .gender-group {
            /* margin-top: 5px; */
            display: flex;
             /* display: block; */
            margin-top: 0px;
            font-weight: bold;
            color: #444;
        }

        .gender-group label {
            font-weight: normal;
            margin-right: 15px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            background-color: #007bff;
            color: white;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-align: center;
            width: 100%;
            text-decoration: none;
            color: #28a745;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Student</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

        <label>Register Number:</label>
        <input type="text" name="reg_number" value="<?= htmlspecialchars($data['reg_number']) ?>" required>

        <label>Course:</label>
        <select name="course" required>
            <option value="BTech" <?= $data['course']=='BTech'?'selected':'' ?>>BTech</option>
            <option value="BE" <?= $data['course']=='BE'?'selected':'' ?>>BE</option>
            <option value="BCom" <?= $data['course']=='BCom'?'selected':'' ?>>BCom</option>
            <option value="MSc" <?= $data['course']=='MSc'?'selected':'' ?>>MSc</option>
        </select>

        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?= $data['dob'] ?>" required>

        <label>Gender:</label>
        <div class="gender-group">
            <input type="radio" name="gender" value="Male" <?= $data['gender']=='Male'?'checked':'' ?>> <label>Male</label>
            <input type="radio" name="gender" value="Female" <?= $data['gender']=='Female'?'checked':'' ?>> <label>Female</label>
        </div>

        <button type="submit">Update</button>
        <a class="back-link" href="view.php">← Back to View</a>
    </form>
</div>
</body>
</html>
