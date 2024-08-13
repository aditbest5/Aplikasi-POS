<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            background-color: #f8fafc;
            color: #636b6f;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .content {
            max-width: 600px;
            padding: 15px;
        }
        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
        .message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .link {
            font-size: 18px;
            color: #636b6f;
            text-decoration: none;
            border: 1px solid #636b6f;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .link:hover {
            background-color: #636b6f;
            color: #f8fafc;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="title">
            404
        </div>
        <div class="message">
            Page Not Found
        </div>
    </div>
</body>
</html>
