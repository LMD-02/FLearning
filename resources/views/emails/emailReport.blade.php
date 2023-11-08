<!DOCTYPE html>
<html>
<head>
    <style>
        /* Thêm CSS tại đây */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        .email-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #777;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Phản hồi yêu cầu của bạn</h1>
    <p>
        Xin chào {{ $data['name'] }},<br>
        Chúng tôi đã nhận được yêu cầu của bạn với nội dung sau:<br>
        {{ $data['title'] }}
        <br>
        Chúng tôi xin trả lời như sau:<br>
        {{ $data['mess'] }}
        <br>
        Cảm ơn bạn đã liên hệ chúng tôi!
    </p>
</div>
</body>
</html>
