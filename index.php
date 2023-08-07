<!DOCTYPE html>
<html>
<head>
<title>Timetable</title>
</head>
<body>
<h1>Timetable</h1>
<form action="index.php" method="post">
<table>
<tr>
<td>Subject</td>
<td><input type="text" name="subject"></td>
</tr>
<tr>
<td>Section</td>
<td><input type="text" name="section"></td>
</tr>
<tr>
<td>From</td>
<td><input type="time" name="from"></td>
</tr>
<tr>
<td>To</td>
<td><input type="time" name="to"></td>
</tr>
<tr>
<td>Room</td>
<td><input type="text" name="room"></td>
</tr>
</table>
<input type="submit" value="Submit">
</form>

<?php
if (isset($_POST['subject']) && isset($_POST['section']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['room'])) {
// Get the values from the form
$subject = $_POST['subject'];
$section = $_POST['section'];
$from = $_POST['from'];
$to = $_POST['to'];
$room = $_POST['room'];

// Create a new PDF document
$pdf = new PDF();

// Add a new page
$pdf->AddPage();

// Set the font
$pdf->SetFont('Arial', 'B', 16);

// Write the title
$pdf->Write(50, 50, 'Timetable');

// Set the font back to normal
$pdf->SetFont('Arial', '', 12);

// Write the subject
$pdf->Write(50, 80, $subject);

// Write the section
$pdf->Write(50, 100, $section);

// Write the time
$pdf->Write(50, 120, $from . ' - ' . $to);

// Write the room
$pdf->Write(50, 140, $room);

// Save the PDF document
$pdf->Output('timetable.pdf', 'I');
}
?>
</body>
</html>

