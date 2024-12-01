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
        <a class="ad-index" href="list-motor"><h2>QUẢN LÝ XE MÁY</h2></a>
        <ul>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu1', this)"><i class="fa-solid fa-motorcycle"></i> Quản lý thông tin xe</a>
                <ul class="ad-submenu" id="submenu1">
                    <li><a class="ad-mini" href="vehicle-lookup">Tra cứu xe</a></li>
                    <li><a class="ad-mini" href="add-motor">Thêm thông tin xe</a></li>
                    <li><a class="ad-mini" href="list-motor">Danh sách thông tin xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu2', this)"><i class="fa-solid fa-address-book"></i> Quản lý chủ xe</a>
                <ul class="ad-submenu" id="submenu2">
                    <li><a class="ad-mini" href="search-vehicle">Tra cứu chủ xe</a></li>
                    <li><a class="ad-mini" href="list-customer">Danh sách thông tin chủ xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu3', this)"><i class="fa-solid fa-store"></i> Quản lý giao dịch</a>
                <ul class="ad-submenu" id="submenu3">
                    <li><a class="ad-mini" href="transaction-list">Mua bán</a></li>
                    <li><a class="ad-mini" href="trade-maintenance">Bảo trì/bảo dưỡng</a></li>
                </ul>
            </li>
          
            <li><a class="ad-tager" href="statistical"><i class="fa-solid fa-chart-pie"></i> Báo cáo thống kê</a></li>
            <li><a class="ad-tager" href="contact"><i class="fa-solid fa-envelope"></i> Tư vấn khách hàng</a></li> 
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu4', this)"><i class="fa-solid fa-store"></i> Quản lý Admin</a>
                <ul class="ad-submenu" id="submenu4">
                    <li><a class="ad-mini" href="add-admin">Tạo mới tài khoản nhân viên</a></li>
                    <li><a class="ad-mini" href="list-admin">Danh sách nhân viên</a></li>
                    <!-- <li><a class="ad-mini" href="edit-admin">Chỉnh sửa thông tin </a></li> -->
                </ul>
            </li>
            <!-- <li><a class="ad-tager" href="account-admin"><i class="fa-solid fa-user"></i> Quản lý tài khoản</a></li> -->
        
            <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="ad-tager" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
            </a>
            </li>
        </ul>
    </div>
    <div class="ad-content">
        <h1 class="ad-title">Mua Bán</h1>
        <div class="ad-add-vehicle-container">
            <form action="{{ route('processForm') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Laravel CSRF token -->
                
                <!-- 1. Thông tin xe -->
                <input type="hidden" id="vehicle_id" name="vehicle_id" value="{{ $sanPham->id_xe }}" required>
            
                <!-- 2. Thông tin chủ xe -->
                <div class="ad-form-group">
                    <label for="customer-name">Họ và tên khách hàng</label>
<input type="text" id="customer-name" name="owner_name" placeholder="Nhập họ và tên khách hàng" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="customer-phone">Số điện thoại</label>
                    <input type="text" id="customer-phone" name="owner_phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="ad-form-group">
                    <label for="customer-cmnd">CMND</label>
                    <input type="text" id="owner-cmnd" name="owner_cmnd" placeholder="Nhập số cmnd"></textarea>
                </div>
                <div class="ad-form-group">
                    <label for="customer-address">Địa chỉ</label>
                    <input type="text" id="customer-address" name="owner_address" placeholder="Nhập địa chỉ khách hàng" required>
                </div>
            
                <!-- 3. Cập nhật biển số -->
                <div class="ad-form-group">
                    <label for="vehicle-plate">Biển số</label>
                    <input type="text" id="vehicle-plate" name="update_plate" placeholder="Nhập biển số xe" required>
                </div>
                @error('update_plate')
                <div class="alert alert-danger" style="color: red; border: 1px solid red; background-color: #f8d7da; padding: 10px;">
                    {{ $message }}
                </div>
            @enderror            
                <!-- 4. Thông tin giao dịch -->
                <div class="ad-form-group">
                    <label for="vehicle-price">Giá Xe</label>
                    <input type="number" id="vehicle-price" name="vehicle_price" value="{{ $sanPham->gia }}" readonly placeholder="Nhập giá xe (VNĐ)" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="transaction-date">Ngày tạo giao dịch</label>
                    <input type="date" id="transaction-date" name="transaction_date" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="transaction-type">Loại giao dịch</label>
                    <input type="text" id="transaction-type" value="Mua xe" readonly name="transaction_type" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="transaction-note">Ghi chú</label>
                    <textarea rows="4" id="transaction-note" name="transaction_note" placeholder="Nhập ghi chú tại đây"></textarea>
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