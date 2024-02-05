<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher</title>
</head>
<body>
    <h1>Voucher</h1>
    <p>SID: {{ $data['sid'] }}</p>
    <p>Student Name: {{ $data['student_name'] }}</p>
    <p>Class: {{ $data['class'] }}</p>
    <p>Section: {{ $data['section'] }}</p>
    <p>Father Name: {{ $data['father_name'] }}</p>
    <p>Father amount: {{ $data['amount'] }}</p>
    <p>Fee Type: {{ $data['feetype'] }}</p>
    <p>Expiry Date: {{ $data['expiry_date'] }}</p>
    <p>Date Issued: {{ $data['date_issued'] }}</p>
</body>
</html>
