<?php
require 'dompdf/autoload.inc.php';
require 'db.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Fetch records
$result = $conn->query("SELECT * FROM students");

$html = '
<h2 style="text-align:center;">Registered Students</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Reg. No</th>
    <th>Course</th>
    <th>DOB</th>
    <th>Gender</th>
</tr>';

while($row = $result->fetch_assoc()) {
    $html .= '<tr>
        <td>' . htmlspecialchars($row["name"]) . '</td>
        <td>' . htmlspecialchars($row["email"]) . '</td>
        <td>' . htmlspecialchars($row["reg_number"]) . '</td>
        <td>' . htmlspecialchars($row["course"]) . '</td>
        <td>' . htmlspecialchars($row["dob"]) . '</td>
        <td>' . htmlspecialchars($row["gender"]) . '</td>
    </tr>';
}

$html .= '</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("students_list.pdf", ["Attachment" => 1]); // 1 for download
?>
