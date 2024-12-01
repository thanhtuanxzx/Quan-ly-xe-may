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
        <h1 class="ad-title">Thêm Admin</h1>

        <div class="ad-add-vehicle-container">
            <form action="{{ route('nguoidung.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ad-form-group">
<label for="ten_dang_nhap">Tên đăng nhập</label>
                    <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="ho_ten">Họ và tên</label>
                    <input type="text" id="ho_ten" name="ho_ten" placeholder="Nhập họ và tên" required>
                </div>
                
                <div class="ad-form-group">
                    <label for="so_dien_thoai">Số điện thoại</label>
                    <input type="text" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
                </div>
            
                <div class="ad-form-group">
                    <label for="mat_khau">Mật khẩu</label>
                    <input type="text" id="mat_khau" placeholder="Nhập mật khẩu" required>
                </div>

                    <input type="hidden" id="mat_khau2" name="mat_khau" placeholder="Nhập mật khẩu" required>

                <div class="ad-form-group">
                    <label for="mat_khau">Gmail</label>
                    <input type="email" id="email" name="email" placeholder="Nhập gmail" required>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="ad-form-group">
                    <button type="submit" class="ad-btn-submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js\slidebar.js"></script>
    <script>
        document.getElementById('mat_khau').addEventListener('input', function() {
            // Lấy giá trị từ trường mật khẩu đầu tiên
            const matKhau = this.value;
            // Gán giá trị đó vào trường mật khẩu thứ hai
            document.getElementById('mat_khau2').value = matKhau;
        });
    </script>
    
</body>
</html>