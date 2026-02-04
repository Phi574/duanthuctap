<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            /* Hình nền phong cảnh núi non */
            background: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Lớp phủ làm mờ nhẹ để chữ dễ đọc hơn */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .login-container {
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

        /* Icon bên trong ô input */
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

        .options {
            display: flex;
            align-items: center;
            color: white;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .options input {
            margin-right: 8px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background-color: #17a2b8; /* Màu xanh teal như trong hình */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background-color: #138496;
        }

        .register-text {
            margin-top: 15px;
            color: white;
            font-size: 14px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .register-text a {
            color: #17a2b8;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login to your account</h2>

    <?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-error">
        <?= $_SESSION['error'] ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

    
    <form action="/duanthuctap/admin_sinhdoi/index.php?action=login" method="POST">
        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="email" placeholder="email" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="pass" placeholder="password" required>
        </div>

        <div class="options">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn-login" name="btn_login">Login</button>
    </form>

    <div class="register-text">
        Just login, <a href="index.php?action=register">register automatically!</a>
    </div>
</div>

</body>
</html>