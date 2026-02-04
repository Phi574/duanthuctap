<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản Trị</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';

// Đảm bảo các biến không bị null để tránh lỗi JavaScript
$total = $total ?? 0;
$total_choduyet = $total_choduyet ?? 0;
$total_tuvan = $total_tuvan ?? 0;
$total_tuvan_daduyet = $total_tuvan_daduyet ?? 0;
?>

<div class="main">
    <div class="dashboard-cards">
        <div class="card">
            <h4>Tổng bài đăng</h4>
            <p><?php echo number_format($total) ?></p>
        </div>
        <div class="card">
            <h4>Bài đăng chờ duyệt</h4>
            <p style="color: #f59e0b;"><?php echo number_format($total_choduyet) ?></p>
        </div>
        <div class="card">
            <h4>Tư vấn chưa xử lý</h4>
            <p style="color: #ef4444;"><?php echo number_format($total_tuvan) ?></p>
        </div>
        <div class="card">
            <h4>Tư vấn đã xử lý</h4>
            <p style="color: #10b981;"><?php echo number_format($total_tuvan_daduyet) ?></p>
        </div>
    </div>

    <div class="dashboard-charts">
        <div class="chart-box">
            <h3>Bài đăng 7 ngày gần nhất</h3> <canvas id="chartBaiDangNgay"></canvas>
        </div>

        <div class="chart-box">
            <h3>Bài đăng theo tháng</h3>
            <canvas id="chartBaiDangThang"></canvas>
        </div>

        <div class="chart-box">
            <h3>Tư vấn theo ngày</h3>
            <canvas id="chartTuVanNgay"></canvas>
        </div>

        <div class="chart-box">
            <h3>Tư vấn theo tháng</h3>
            <canvas id="chartTuVanThang"></canvas>
        </div>

        
    </div>
</div>

<?php include __DIR__ . '/../../layout/html/footer.php'; ?>

<script>
// Cấu hình chung cho Chart
const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: { y: { beginAtZero: true } }
};

/* ===================== BÀI ĐĂNG 7 NGÀY GẦN NHẤT ===================== */
// Chuyển sang type: 'bar' để hiện cột rõ ràng khi chỉ có 1 ngày dữ liệu
new Chart(document.getElementById('chartBaiDangNgay'), {
    type: 'bar', 
    data: {
        labels: <?= json_encode(array_column($tk_baidang_ngay ?? [], 'label')) ?>,
        datasets: [{
            label: 'Số lượng bài',
            data: <?= json_encode(array_column($tk_baidang_ngay ?? [], 'total')) ?>,
            backgroundColor: '#3b82f6',
            borderRadius: 5
        }]
    },
    options: chartOptions
});

/* ===================== BÀI ĐĂNG THEO THÁNG ===================== */
new Chart(document.getElementById('chartBaiDangThang'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($tk_baidang_thang ?? [], 'label')) ?>,
        datasets: [{
            label: 'Bài đăng',
            data: <?= json_encode(array_column($tk_baidang_thang ?? [], 'total')) ?>,
            backgroundColor: '#6366f1'
        }]
    },
    options: chartOptions
});

/* ===================== TƯ VẤN THEO NGÀY ===================== */
new Chart(document.getElementById('chartTuVanNgay'), {
    type: 'line',
    data: {
        labels: <?= json_encode(array_column($tk_tuvan_ngay ?? [], 'label')) ?>,
        datasets: [{
            label: 'Tư vấn',
            data: <?= json_encode(array_column($tk_tuvan_ngay ?? [], 'total')) ?>,
            borderColor: '#ec4899',
            tension: 0.4,
            fill: false
        }]
    },
    options: chartOptions
});

/* ===================== TƯ VẤN THEO THÁNG ===================== */
new Chart(document.getElementById('chartTuVanThang'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($tk_tuvan_thang ?? [], 'label')) ?>,
        datasets: [{
            label: 'Tư vấn',
            data: <?= json_encode(array_column($tk_tuvan_thang ?? [], 'total')) ?>,
            backgroundColor: '#f43f5e'
        }]
    },
    options: chartOptions
});


</script>

</body>
</html>