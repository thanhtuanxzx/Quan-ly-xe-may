<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\vehicle_lookup.css">
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
        <h1 class="ad-title">Tra cứu thông tin chủ xe</h1>

                <div class="ad-search-container">
                    <form action="#" method="GET">

                        <div class="ad-form-group">
                            <label for="dongxe">Biển số xe</label>
                            <input type="text" id="dongxe" name="dongxe" class="ad-input" placeholder="Nhập biển số xe">
                        </div>
                
                        <div class="ad-form-group">
                            <label for="phone">Số điện thoại khách hàng</label>
                            <input type="text" id="phone" name="phone" class="ad-input" placeholder="Nhập số điện thoại">
                        </div>
                
                        <div class="ad-form-group">
                            <button type="submit" class="ad-btn-search">Tìm Kiếm</button>
                        </div>
                </form>
            </div>

    
        <div class="ad-result-container">
            <h2 class="ad-result-title">Kết Quả Tra Cứu</h2>
            <div class="ad-result-item">
                <div class="ad-result-info">
                    <div class="ad-result-text">
                        <p><strong>Biển số: </strong> 71S91723</p>
                        <p><strong>Họ tên khách hàng: </strong>Nguyễn Văn A</p>
                        <p><strong>Số điện thoại: </strong>0123456789</p>
                        <p><strong>Địa chỉ: </strong>An Khánh, Ninh Kiều, Cần Thơ</p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-view" onclick="window.location.href='trade_customer.html';">Tạo giao dịch</button>
                        <button class="ad-btn-edit" onclick="window.location.href='history_customer.html';">Lịch sử</button>
                    </div>
                </div>
                
                <div class="ad-result-info">
                    <div class="ad-result-text">
                        <p><strong>Loại xe: </strong>Tay ga</p>
                        <p><strong>Tên xe: </strong>SH350i</p>
                        <p><strong>Dòng xe:</strong> Phiên Bản Thể Thao</p>
                        <p><strong>Màu sắc: </strong>Xám đen</p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-edit" onclick="window.location.href='edit_customer.html';">Chỉnh Sửa</button>
                        <button class="ad-btn-delete">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
