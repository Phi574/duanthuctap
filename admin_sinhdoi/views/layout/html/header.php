<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị hệ thống - SinhDoiLand</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/admin.css?v=<?= time() ?>">
    
    <style>
        /* CSS bổ sung nhanh để đảm bảo layout không vỡ */
        body { margin: 0; font-family: sans-serif; background: #f5f7fb; }
        .admin-wrapper { display: flex; min-height: 100vh; position: relative; }
        .main-content { flex: 1; display: flex; flex-direction: column; width: 100%; transition: all 0.3s; }
        
        /* Ẩn hiện sidebar trên mobile */
        @media (max-width: 1024px) {
            .admin-wrapper { display: block; }
            .sidebar { position: fixed; left: -280px; top: 0; height: 100%; z-index: 1000; transition: 0.3s; }
            .sidebar.active { left: 0; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    
    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <div class="main-content">
        <header style="background: #fff; height: 60px; padding: 0 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 99;">
            
            <div style="display: flex; align-items: center; gap: 15px;">
                <button id="sidebar-toggle" style="background: none; border: none; font-size: 20px; cursor: pointer; color: #555;">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h3 style="margin: 0; font-size: 18px; color: #ff5722; font-weight: bold; text-transform: uppercase;">Quản Trị</h3>
            </div>

            <div style="display: flex; align-items: center; gap: 15px;">
                <div class="user-info" style="text-align: right; display: none; margin-right: 10px;">
                    <span style="display: block; font-weight: bold; font-size: 14px;">
                        <?= $_SESSION['user']['name'] ?? 'Admin' ?>
                    </span>
                    <span style="font-size: 12px; color: #777;">Quản trị viên</span>
                </div>
                
                <a href="index.php?action=logout" title="Đăng xuất" 
                   style="width: 35px; height: 35px; background: #fee2e2; color: #ef4444; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </header>