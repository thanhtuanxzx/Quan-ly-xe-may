<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/slidebar.css">
    <link rel="stylesheet" href="css/add_motor.css">
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
    <h1 class="ad-title">Thêm Thông Tin Xe</h1>

    <div class="ad-add-vehicle-container">
        <form action="{{ route('admin.store_motor') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="ad-form-group">
                <label for="add-type">Loại Xe</label>
                <select id="add-type" name="loai_xe" class="ad-select" required>
                    <option value="">Chọn loại xe</option>
                    <option value="1">Xe số</option>
                    <option value="2">Tay ga</option>
                    <option value="3">Xe tay côn</option>
                    <option value="4">Xe điện</option>
                </select>
            </div>
            <div class="ad-form-group">
                <label for="add-model">Dòng Xe</label>
                <input type="text" id="add-model" name="dong_xe" placeholder="Nhập dòng xe" required>
            </div>
            <div class="ad-form-group">
                <label for="add-model">Tên Xe</label>
                <input type="text" id="add-model" name="ten_xe" placeholder="Nhập tên xe" required>
            </div>

            <div class="ad-form-group">
                <label for="add-color">Màu Sắc</label>
                <input type="text" id="add-color" name="mau_sac" placeholder="Nhập màu sắc xe" required>
            </div>
            <div class="ad-form-group">
                <label for="add-model">Biển Số</label>
                <input type="text" id="add-model" name="bien_so" placeholder="Nhập biển số" disabled>
            </div>
            <div class="ad-form-group">
                <label for="add-engine">Động cơ và Công nghệ</label>
                <input type="text" id="add-engine" name="cong_nghe" placeholder="Nhập thông tin động cơ" required>
            </div>

            <div class="ad-form-group">
                <label for="add-price">Giá Xe</label>
                <input type="number" id="add-price" name="gia" placeholder="Nhập giá xe (VNĐ)" required>
            </div>

            <div class="ad-form-group">
                <label for="add-feature">Tính năng Nổi bật</label>
                <input type="text" id="add-feature" name="tinh_nang" placeholder="Nhập tính năng nổi bật" required>
            </div>

            <div class="ad-form-group">
                <label for="add-design">Thiết Kế</label>
                <input type="text" id="add-design" name="thiet_ke" placeholder="Nhập thiết kế xe" required>
            </div>

            <div class="ad-form-group">
                <label for="add-utility">Tiện ích và An toàn</label>
                <input type="text" id="add-utility" name="tienich_antoan" placeholder="Nhập tiện ích và an toàn" required>
            </div>

            <div class="ad-form-group">
                <label for="add-image">Ảnh Xe</label>
                <input type="url" id="add-image" name="hinh_anh" placeholder="Nhập đường link ảnh" required>
            </div>

            <div class="ad-form-group">
                <button type="submit" class="ad-btn-submit">Thêm</button>
            </div>
        </form>
    </div>
</div>

    
    
    <script src="js/slidebar.js"></script>
</body>
</html>
