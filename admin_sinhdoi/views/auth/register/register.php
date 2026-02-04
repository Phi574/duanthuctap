<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            /* Sử dụng cùng hình nền với trang login để đồng bộ */
            background: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Lớp phủ làm mờ */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .register-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 400px;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: white;
            font-size: 28px;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-weight: 500;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            font-size: 18px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background-color: #17a2b8; /* Màu xanh Teal đồng bộ */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-register:hover {
            background-color: #138496;
        }

        .login-text {
            margin-top: 20px;
            color: white;
            font-size: 14px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .login-text a {
            color: #17a2b8;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Create your account</h2>
    
    <form action="index.php?action=register" method="POST">
        <div class="input-group">
            <i class="fa-solid fa-id-card"></i>
            <input type="text" name="name" placeholder="full name" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email" placeholder="Email" required>

        </div>

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="phone" placeholder="phone" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="password" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-shield-halved"></i>
            <input type="password" name="re_password" placeholder="confirm password" required>
        </div>

        <button type="submit" class="btn-register" name="btn_register">Đăng ký</button>
    </form>

    <div class="login-text">
        Already have an account? <a href="index.php?action=login">Login here!</a>
    </div>
</div>

</body>
</html>