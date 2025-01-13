<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .message-container {
            text-align: center;
            padding: 30px;
            background-color: #f36a6a; /* Green color for success */
            color: #fff; /* Text color for success */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            margin-top: 20px;
            background-color: #fff; /* White color for the back button */
            color: #ea6060; /* Green color for the back button text */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-button:hover {
            background-color: #e0e0e0; /* Light gray on hover */
        }
    </style>
    <title>Success Message</title>
</head>
<body>
<div class="message-container">
    <p>ثبت اطلاعات ناموفق بود</p>
    <a href="../index.php" class="back-button">بازگشت به صفحه اصلی</a>
</div>
</body>
</html>
