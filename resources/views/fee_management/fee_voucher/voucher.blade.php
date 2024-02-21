<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .voucher-details {
            margin-top: 20px;
        }
        .voucher-details p {
            margin-bottom: 10px;
            color: #555;
        }
        .voucher-details p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Voucher</h1>
        <div class="voucher-details">
            <p>SID: {{ $data['sid'] ?? 'SID Not Found' }}</p>
            <p>Student Name: {{ $data['student_name'] ?? 'Student Name Not Found' }}</p>
            <p>Class: {{ $data['class'] ?? 'Class Not Found' }}</p>
            <p>Section: {{ $data['section'] ?? 'Section Not Found' }}</p>
            <p>Father Name: {{ $data['father_name'] ?? 'Father Name Not Found' }}</p>
            <p>Amount: {{ $data['amount'] ?? 'Amount Not Found' }}</p>
            <p>Fee Type: {{ $data['feetype'] ?? 'Fee Type Not Found' }}</p>
            <p>Expiry Date: {{ $data['expiry_date'] ?? 'Expiry Date Not Found' }}</p>
            <p>Date Issued: {{ $data['date_issued'] ?? 'Date Issued Not Found' }}</p>
        </div>
    </div>
</body>
</html>

