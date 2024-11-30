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
            <li><a class="ad-tager" href="transaction-list"><i class="fa-solid fa-store"></i> Mua Bán</a></li> 
            <li><a class="ad-tager" href="statistical"><i class="fa-solid fa-chart-pie"></i> Báo cáo thống kê</a></li>
            <li><a class="ad-tager" href="account-admin"><i class="fa-solid fa-user"></i> Quản lý tài khoản</a></li>
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
        <h1 class="ad-title">Chỉnh Sửa Thông Tin Chủ Xe</h1>

        <div class="ad-add-vehicle-container">
        <form action="{{ route('update-customer') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Bảo mật CSRF token -->
            <input type="text" value="{{$chuxe->id_xe}}" name ="id_xe">
            <div class="ad-form-group">
                <label for="add-name">Họ và tên</label>
                <input type="text" id="add-name" name="ho_ten" placeholder="Nhập họ và tên" required>
            </div>

            <div class="ad-form-group">
                <label for="add-phone">Số điện thoại</label>
                <input type="text" id="add-phone" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
            </div>

            <div class="ad-form-group">
                <label for="add-address">Địa chỉ</label>
                <input type="text" id="add-address" name="dia_chi" placeholder="Nhập địa chỉ" required>
            </div>

            <div class="ad-form-group">
                <label for="add-plate">Biển số</label>
                <input type="text" id="add-plate" name="bien_so" placeholder="Nhập biển số" required>
            </div>

            <div class="ad-form-group">
                <label for="add-type">Loại Xe</label>
                <select id="add-type" name="loai_xe" class="ad-select" required>
                    <option value="">Chọn loại xe</option>
                    <option value="2">Tay ga</option>
                    <option value="1">Xe số</option>
                    <option value="3">Xe tay côn</option>
                    <option value="4">Xe điện</option>
                </select>
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
                <label for="spare-field-1">Dòng xe</label>
                <input type="text" id="spare-field-1" name="dong_xe" class="ad-input" placeholder="Nhập dòng xe">
            </div>

           

            <div class="ad-form-group ad-btn-form">
                <button type="submit" class="ad-btn-submit">Lưu</button>
                <button type="button" class="ad-btn-close" onclick="window.history.back()">Hủy</button>
            </div>
        </form>

        </div>
    </div>
    
    
    <script src="js\slidebar.js"></script>
</body>
</html>
