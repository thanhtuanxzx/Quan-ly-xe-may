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
        <h1 class="ad-title">Tra cứu thông tin chủ xe</h1>

                <div class="ad-search-container">
                    <form action="{{ route('vehicle.search') }}" method="GET">
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
            @if($vehicles->isNotEmpty())
                @foreach ($vehicles as $vehicle)
                    @if($vehicle->chuXe)
                        <div class="ad-result-item">
                            <!-- Hiển thị thông tin xe -->
                            <div class="ad-result-info">
                                <div class="ad-result-text">
                                    <p><strong>Biển số: </strong>{{ $vehicle->bien_so }}</p> <!-- Hiển thị biển số xe -->
                                    
                                    <!-- Kiểm tra và hiển thị thông tin chủ xe -->
                                        
                                        <p><strong>Họ tên khách hàng: </strong>{{ $vehicle->chuXe->ho_ten }}</p> <!-- Hiển thị tên chủ xe -->
                                        <p><strong>Số điện thoại: </strong>{{ $vehicle->chuXe->so_dien_thoai }}</p> <!-- Hiển thị số điện thoại -->
                                        <p><strong>Địa chỉ: </strong>{{ $vehicle->chuXe->dia_chi }}</p> <!-- Hiển thị địa chỉ -->
                                    
                                </div>
                                <div class="ad-result-actions">
                                    <button class="ad-btn-view" onclick="window.location.href='trade-maintenance';">Tạo giao dịch</button>
                                    <button class="ad-btn-edit" onclick="window.location.href='history-customer?id_chu_xe={{ $vehicle->chuXe->id_chu_xe }}';">Lịch sử</button>
                                </div>
                            </div>

                            <!-- Hiển thị thông tin xe -->
                            <div class="ad-result-info">
                                <div class="ad-result-text">
                                    <p><strong>Loại xe: </strong>{{ $vehicle->loai_xe }}</p> <!-- Hiển thị loại xe -->
                                    <p><strong>Tên xe: </strong>{{ $vehicle->ten_xe }}</p> <!-- Hiển thị tên xe -->
                                    <p><strong>Dòng xe: </strong>{{ $vehicle->dong_xe }}</p> <!-- Hiển thị dòng xe -->
                                    <p><strong>Màu sắc: </strong>{{ $vehicle->mau_sac }}</p> <!-- Hiển thị màu sắc -->
                                </div>
                                <div class="ad-result-actions">
                                    <button class="ad-btn-edit" onclick="window.location.href='edit-customer?id_xe={{ $vehicle->id_xe }}';">Chỉnh Sửa</button>
                                    <button class="ad-btn-delete" onclick="window.location.href='delete?id_xe={{ $vehicle->id_xe }}';">Xóa</button>
</div>
                            </div>
                        </div>
                        @endif
                @endforeach
            @else
                <p>Không có kết quả nào.</p>
            @endif

        </div>
    </div>
    <script src="js\slidebar.js"></script>
</body>
</html>