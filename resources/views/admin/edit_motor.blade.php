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
            <li><a class="ad-tager" href=""><i class="fa-solid fa-envelope"></i> Tư vấn khách hàng</a></li> 
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu4', this)"><i class="fa-solid fa-store"></i> Quản lý Admin</a>
                <ul class="ad-submenu" id="submenu4">
                    <li><a class="ad-mini" href="add-admin">Tạo mới tài khoản nhân viên</a></li>
                    <li><a class="ad-mini" href="list-admin">Danh sách nhân viên</a></li>
                    <li><a class="ad-mini" href="edit-admin">Chỉnh sửa thông tin </a></li>
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
        <h1 class="ad-title">Chỉnh Sửa Thông Tin Xe</h1>

        <div class="ad-add-vehicle-container">
        <form action="{{ route('admin.update_motor', $xeMay->id_xe) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="ad-form-group">
            <label for="add-type">Loại Xe</label>
            <select id="add-type" name="loai_xe" class="ad-select">
                <option value="">Chọn loại xe</option>
                <option value="2" {{ $xeMay->loai_xe == 2 ? 'selected' : '' }}>Tay ga</option>
                <option value="1" {{ $xeMay->loai_xe == 1 ? 'selected' : '' }}>Xe số</option>
                <option value="3" {{ $xeMay->loai_xe == 3 ? 'selected' : '' }}>Xe côn tay</option>
                <option value="4" {{ $xeMay->loai_xe == 4 ? 'selected' : '' }}>Xe điện</option>
            </select>
        </div>

        <div class="ad-form-group">
            <label for="add-model">Tên Xe</label>
            <input type="text" id="add-model" name="ten_xe" value="{{ old('ten_xe', $xeMay->ten_xe) }}" placeholder="Nhập tên xe">
        </div>

        <div class="ad-form-group">
            <label for="add-color">Màu Sắc</label>
            <input type="text" id="add-color" name="mau_sac" value="{{ old('mau_sac', $xeMay->mau_sac) }}" placeholder="Nhập màu sắc xe">
        </div>

        <div class="ad-form-group">
            <label for="add-engine">Động cơ và Công nghệ</label>
            <input type="text" id="add-engine" name="cong_nghe" value="{{ old('cong_nghe', $xeMay->cong_nghe) }}" placeholder="Nhập thông tin động cơ">
        </div>

        <div class="ad-form-group">
            <label for="add-price">Giá Xe</label>
            <input type="number" id="add-price" name="gia" value="{{ old('gia', $xeMay->gia) }}" placeholder="Nhập giá xe (VNĐ)">
        </div>

        <div class="ad-form-group">
            <label for="add-feature">Tính năng Nổi bật</label>
            <input type="text" id="add-feature" name="tinh_nang" value="{{ old('tinh_nang', $xeMay->tinh_nang) }}" placeholder="Nhập tính năng nổi bật">
        </div>

        <div class="ad-form-group">
            <label for="add-design">Thiết Kế</label>
            <input type="text" id="add-design" name="thiet_ke" value="{{ old('thiet_ke', $xeMay->thiet_ke) }}" placeholder="Nhập thiết kế xe">
        </div>

        <div class="ad-form-group">
            <label for="add-utility">Tiện ích và An toàn</label>
            <input type="text" id="add-utility" name="tienich_antoan" value="{{ old('tienich_antoan', $xeMay->tienich_antoan) }}" placeholder="Nhập tiện ích và an toàn">
        </div>

        <div class="ad-form-group">
            <label for="add-image">Ảnh Xe</label>
            <input type="url" id="add-image" name="hinh_anh" value="{{ old('hinh_anh', $xeMay->hinh_anh) }}" placeholder="Nhập đường link ảnh">
        </div>

        <div class="ad-form-group ad-btn-form">
            <button type="submit" class="ad-btn-submit">Lưu</button>
            <button type="button" class="ad-btn-close" onclick="window.history.back()">Hủy</button>
        </div>
    </form>
        </div>


    
    
    <script src="js/slidebar.js"></script>
</body>
</html>
