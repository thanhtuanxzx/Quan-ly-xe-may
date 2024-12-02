<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css/account_admin.css">
    
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
        <h1>Quản Lý Tài Khoản</h1>
        <div class="account-management">
            <section class="user-info" id="userInfoSection">
                <h2 class="ad-tit">Thông Tin Cá Nhân</h2>
<form id="userInfoForm" method="POST" action="{{ route('admin.update') }}">
                    @csrf
                    @method('PUT')
                    <input class="form-control" type="hidden" name="id_nguoi_dung" value="{{ old('id_nguoi_dung', $xeMay->id_nguoi_dung) }}">
                    <div class="form-group">
                        <label for="fullName">Họ và tên</label>
                        <input type="text" id="fullName" name="fullName" value="{{ old('fullName', $xeMay->ho_ten) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $xeMay->email) }}" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $xeMay->so_dien_thoai) }}" />
                    </div>
                    <div class="form-group">
                        <label for="role">Vai trò</label>
                        <input type="text" id="role" name="" value="Nhân viên" readonly />
                    </div>
                    <div class="form-group">
                        <label for="role">Trạng thái</label>
                        <select id="add-type" name="trang_thai" class="ad-select">
                            <option value="Hoạt động" {{ $xeMay->trang_thai == 'Hoạt động' ? 'selected' : '' }}>Hoạt Động</option>
                            <option value="Tạm khóa" {{ $xeMay->trang_thai == 'Tạm khóa' ? 'selected' : '' }}>Tạm Khóa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="currentPassword">Mật khẩu</label>
                        <input type="text" id="currentPassword" name="mat_khau" value="{{ old('mat_khau', $xeMay->mat_khau) }}" />
                    </div>
                    <div class="ad-btn_in4">
                        <button type="submit" class="btn">Cập nhật thông tin</button>
                        <button type="button" class="btn btn-cancel" onclick="window.history.back()">Quay lại</button>
                    </div>
                </form>                
            </section>
        </div>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
