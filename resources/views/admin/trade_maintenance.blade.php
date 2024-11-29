<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\add_motor.css">
    <link rel="stylesheet" href="css\detail.css">
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
        <h1 class="ad-title">Bảo dưỡng/Bảo trì</h1>

        <div class="ad-add-vehicle-container">
            <form action="#" method="POST" enctype="multipart/form-data">

                <div class="ad-detail-group">
                    <label>Họ tên khách hàng:</label>
                    <p>Nguyễn Thành Tuấn</p>
                </div>
        
                <div class="ad-detail-group">
                    <label>Tên Xe:</label>
                    <p>Xe đạp</p>
                </div>

                <div class="ad-detail-group">
                    <label>Biển số:</label>
                    <p>71-S9 1723</p>
                </div>

                <div class="ad-detail-group">
                    <label>Số điện thoại:</label>
                    <p>0123456789</p>
                </div>
    
                <div class="ad-form-group">
                    <label for="transaction-date">Ngày tạo giao dịch</label>
                    <input type="date" id="transaction-date" name="" required>
                </div>

                <div class="ad-form-group">
                    <label for="transaction-type">Loại giao dịch</label>
                    <select id="transaction-type" name="" class="ad-select" required>
                        <option value="">--chọn--</option>
                        <option value="">Mua bán</option>
                        <option value="">Bảo trì</option>
                        <option value="">Sửa chữa</option>
                    </select>
                </div>

                <div class="ad-form-group">
                    <label for="spare-field-1">Hạng mục</label>
                    <input type="text" id="spare-field-1" name="" placeholder="Nhập hạng mục tại đây">
                </div>

                <div class="ad-form-group">
                    <label for="transaction-note">Ghi chú</label>
                    <textarea rows="4" id="transaction-note" name="" placeholder="Nhập ghi chú tại đây"></textarea>
                </div>

                <div class="ad-form-group">
                    <label for="spare-field-1">Giá</label>
                    <input type="text" id="spare-field-1" name="" placeholder="Nhập giá tại đây">
                </div>
    
                <div class="ad-form-group">
                    <label for="spare-field-1">Dự Phòng 1</label>
                    <input type="text" id="spare-field-1" name="" placeholder="Dự phòng">
                </div>
    
                <div class="ad-form-group">
                    <label for="spare-field-2">Dự Phòng 2</label>
                    <input type="text" id="spare-field-2" name="" placeholder="Dự phòng">
                </div>
    
                <div class="ad-form-group">
                    <button type="submit" class="ad-btn-submit">Tạo</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
