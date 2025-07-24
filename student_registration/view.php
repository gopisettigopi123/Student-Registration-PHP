<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>View Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            /* align-items: center; */
            padding: 40px;
            /* min-height: 100vh; */
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            /* box-shadow: 0 0 12px rgba(0, 0, 0, 0.2); */
            width: 1000px;
            box-shadow: 0 4px 8px 0 rgba(229, 62, 62, 0.2), 0 6px 20px 0 rgba(113, 190, 62, 0.19);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-update {
            background-color: #007bff;
            color: white;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #bd2130;
        }

        .back-btn {
            width: 15%;
            display: inline-block;
            padding: 10px 10px;
            background-color: #28a745;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Reg. Number</th>
                <th>Course</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM students");
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['reg_number']) ?></td>
                        <td><?= htmlspecialchars($row['course']) ?></td>
                        <td><?= htmlspecialchars($row['dob']) ?></td>
                        <td><?= htmlspecialchars($row['gender']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-update">Update</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile;
            else: ?>
                <tr>
                    <td colspan="7">No records found.</td>
                </tr>
            <?php endif; ?>
        </table>

        <a href="index.php" class="back-btn">Back to Registration</a>
        <form action="generate_pdf.php" method="post" style="text-align:right; margin-bottom: 0px;margin-top: 0px;width:20%;float:right;">
    <button type="submit" style="
        background-color: #6c63ff;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    ">
        ⬇ Download PDF
    </button>
</form>

       
        

    </div>


</body>

</html>




