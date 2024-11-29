<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\history.css">
</head>
<body>

    <div class="ad-sidebar">
        <a class="ad-index" href="index.html"><h2>QUẢN LÝ XE MÁY</h2></a>
        <ul>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu1', this)"><i class="fa-solid fa-motorcycle"></i> Quản lý thông tin xe</a>
                <ul class="ad-submenu" id="submenu1">
                    <li><a class="ad-mini" href="vehicle_lookup.html">Tra cứu xe</a></li>
                    <li><a class="ad-mini" href="add_motor.html">Thêm thông tin xe</a></li>
                    <li><a class="ad-mini" href="list_motor.html">Danh sách thông tin xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu2', this)"><i class="fa-solid fa-address-book"></i> Quản lý chủ xe</a>
                <ul class="ad-submenu" id="submenu2">
                    <li><a class="ad-mini" href="customer_lookup.html">Tra cứu chủ xe</a></li>
                    <li><a class="ad-mini" href="list_customer.html">Danh sách thông tin chủ xe</a></li>
                </ul>
            </li>
            <li><a class="ad-tager" href="transaction_list.html"><i class="fa-solid fa-store"></i> Mua Bán</a></li> 
            <li><a class="ad-tager" href="statistical.html"><i class="fa-solid fa-chart-pie"></i> Báo cáo thống kê</a></li>
            <li><a class="ad-tager" href="account_admin.html"><i class="fa-solid fa-user"></i> Quản lý tài khoản</a></li>
            <li><a class="ad-tager" href=""><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
        </ul>
    </div>

    <div class="ad-content">
        <h1>Danh sách giao dịch</h1>
        <div class="ad-buttons">
        </div>
        <table class="ad-maintenance-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Biển số</th>
                    <th>Loại</th>
                    <th>Ngày</th>
                    <th>Hạng Mục</th>
                    <th>Chi Phí (VNĐ)</th>
                    <th>Ghi Chú</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mẫu dữ liệu -->
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>0123456789</td>
                    <td>71S9 1723</td>
                    <td>Bảo dưỡng</td>
                    <td>25/11/2024</td>
                    <td>Thay nhớt, kiểm tra phanh</td>
                    <td>500,000</td>
                    <td>Hoàn thành</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Nguyễn Văn A</td>
                    <td>0123456789</td>
                    <td>71S9 1723</td>
                    <td>Bảo trì</td>
                    <td>15/10/2024</td>
                    <td>Thay lốp</td>
                    <td>1,200,000</td>
                    <td>Hoàn thành</td>
                </tr>
            </tbody>
        </table>
    </div>
    

    <script src="js\slidebar.js"></script>
</body>
</html>
