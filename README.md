# Student-Registration-PHP
A simple registrtion form using php to submit the form details to mysql server.
📘 Student Registration System - PHP + MySQL
A simple and clean Student Registration System built using PHP, MySQL, and DOMPDF. The system allows you to register students, view all records, update/delete entries, and download all data as a PDF.

📌 Features
✅ Student Registration Form

📋 View all submitted records

📝 Update/Delete student details

📄 Export all student data as a PDF

🖥️ Works locally on XAMPP server

📂 Folder Structure
pgsql
Copy
Edit
student_registration/
├── index.php               # Registration form
├── view.php                # View all registered students
├── update.php              # Update student info
├── delete.php              # Delete student record
├── generate_pdf.php        # Generate PDF of all records
├── db.php                  # Database connection file
├── dompdf/                 # DOMPDF library (for PDF export)
└── style.css               # CSS styles
🛠️ Installation & Setup
1️⃣ Prerequisites
PHP installed (via XAMPP)

Web browser

Basic knowledge of PHP & MySQL

2️⃣ Run XAMPP
Start Apache and MySQL from XAMPP Control Panel.

3️⃣ Create MySQL Database
Open http://localhost/phpmyadmin

Create a database named: student_registration

Import or run this SQL:

sql
Copy
Edit
CREATE TABLE `students` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100),
  `email` VARCHAR(100),
  `regno` VARCHAR(50),
  `course` VARCHAR(50),
  `dob` DATE,
  `gender` VARCHAR(10)
);
4️⃣ Clone or Download Project
bash
Copy
Edit
git clone https://github.com/your-username/student_registration.git
5️⃣ Configure Database Connection
Update db.php with your database credentials:

php
Copy
Edit
$host = "localhost";
$user = "root";
$password = "";
$database = "student_registration";
6️⃣ Install DOMPDF
Download from: https://github.com/dompdf/dompdf/releases

Extract dompdf folder and place inside your project directory.

🚀 How It Works
🔸 Registration
Users fill out form in index.php

On Submit → Data is inserted into MySQL DB using db.php

🔸 View Records
view.php displays all records from the DB

Buttons to Update, Delete, and Generate PDF

🔸 Update/Delete
update.php → Fetch existing data in form and update it

delete.php → Deletes record based on ID

🔸 Download PDF
generate_pdf.php pulls all data and formats it using DOMPDF

Outputs the file for download

📸 Screenshot

🙌 Contributing
Have suggestions or ideas? Feel free to fork this repo and raise a pull request!


