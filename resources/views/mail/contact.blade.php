<!DOCTYPE html>
<html>
<head>
    <title>Liên hệ mới</title>
</head>
<body>
    <h1>Thông tin liên hệ</h1>
    <p><strong>Tên:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Chủ đề:</strong> {{ $data['subject'] }}</p>
    <p><strong>Nội dung:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
