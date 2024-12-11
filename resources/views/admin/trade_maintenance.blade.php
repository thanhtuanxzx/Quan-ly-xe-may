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
        <h1 class="ad-title">Bảo dưỡng/Bảo trì</h1>
        
        <div class="ad-add-vehicle-container">
            <form action="{{ route('admin.trade') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="ad-form-group">
                <label for="bien_so">Biển số:</label>
                <input type="text" id="bien_so" name="bien_so"  required>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>

            <div class="ad-form-group">
                <label for="ho_ten">Họ tên khách hàng:</label>
                <input type="text" id="ho_ten" name="ho_ten"  required>
            </div>

            <div class="ad-form-group">
                <label for="ten_xe">Tên Xe:</label>
                <input type="text" id="ten_xe" name="ten_xe"  required>
            </div>
           
           

            <div class="ad-form-group">
                <label for="so_dien_thoai">Số điện thoại:</label>
                <input type="text" id="so_dien_thoai" name="so_dien_thoai" >
            </div>

    
                <div class="ad-form-group">
                    <label for="transaction-date">Ngày tạo giao dịch</label>
                    <input type="date" id="transaction-date" name="ngay_giao_dich" required>
                </div>

                <div class="ad-form-group">
                    <label for="transaction-type">Loại giao dịch</label>
                    <select id="transaction-type" name="loai_giao_dich" class="ad-select" required>
                        <option value="">--chọn--</option>
                     
                        <option value="Bảo dưỡng">Bảo dưỡng</option>
                        <option value="Sửa chữa">Sửa chữa</option>
                    </select>
                </div>

                <!-- <div class="ad-form-group">
                    <label for="spare-field-1">Hạng mục</label>
                    <input type="text" id="spare-field-1" name="" placeholder="Nhập hạng mục tại đây">
                </div> -->

                <div class="ad-form-group">
                    <label for="transaction-note">Ghi chú</label>
                    <textarea rows="4" id="transaction-note" name="ghi_chu" placeholder="Nhập ghi chú tại đây"  required></textarea>
                </div>

                <div class="ad-form-group">
                    <label for="spare-field-1">Giá</label>
                    <input type="text" id="spare-field-1" name="gia_ban" placeholder="Nhập giá tại đây"  required>
                </div>
    
                <!-- <div class="ad-form-group">
                    <label for="spare-field-1">Dự Phòng 1</label>
                    <input type="text" id="spare-field-1" name="" placeholder="Dự phòng">
                </div>
    
                <div class="ad-form-group">
                    <label for="spare-field-2">Dự Phòng 2</label>
                    <input type="text" id="spare-field-2" name="" placeholder="Dự phòng">
                </div>
     -->
                <div class="ad-form-group">
                    <button type="submit" class="ad-btn-submit">Tạo</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
