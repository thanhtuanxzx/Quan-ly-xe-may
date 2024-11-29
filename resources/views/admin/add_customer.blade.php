<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\add_motor.css">
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
        <h1 class="ad-title">Thêm Thông Tin Chủ Xe</h1>

        <div class="ad-add-vehicle-container">
            <form action="#" method="POST" enctype="multipart/form-data">

                <div class="ad-form-group">
                    <label for="add-name">Họ và tên</label>
                    <input type="text" id="add-name" name="" placeholder="Nhập họ và tên" required>
                </div>
                
                <div class="ad-form-group">
                    <label for="add-phone">Số điện thoại</label>
                    <input type="text" id="add-phone" name="" placeholder="Nhập số điện thoại" required>
                </div>
                
                <div class="ad-form-group">
                    <label for="add-address">Địa chỉ</label>
                    <input type="text" id="add-address" name="" placeholder="Nhập địa chỉ" required>
                </div>   

                <div class="ad-form-group">
                    <label for="add-engine">Biển số</label>
                    <input type="text" id="add-engine" name="" placeholder="Nhập biển số" required>
                </div>

                <div class="ad-form-group">
                    <label for="add-engine">Dự Phòng 1</label>
                    <input type="text" id="add-engine" name="" placeholder="Dự Phòng 1" >
                </div>

                <div class="ad-form-group">
                    <label for="add-engine">Dự Phòng 2</label>
                    <input type="text" id="add-engine" name="" placeholder="Dự Phòng 2" >
                </div>
        
                <div class="ad-form-group">
                    <button type="submit" class="ad-btn-submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    
    
    <script src="js\slidebar.js"></script>
</body>
</html>
