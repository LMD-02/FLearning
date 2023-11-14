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
    <h1>Lấy lại mật khẩu</h1>
    <p>
        Xin chào {{ $data['name'] }},<br>
        Chúng tôi đã nhận được yêu cầu lấy lại mật khẩu của bạn:<br>

        <br>
        Nếu đúng như vâỵ, hãy truy cập vào đường link dưới đây để đổi mật khẩu:<br>
        <br>
        {{ $data['link'] }}
    </p>
</div>
</body>
</html>
