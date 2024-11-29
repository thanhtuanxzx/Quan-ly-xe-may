<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\detail.css">
</head>
<body>

    <div class="ad-sidebar">
        <a class="ad-index" href="index.html"><h2>QUẢN LÝ XE MÁY</h2></a>
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
                    <li><a class="ad-mini" href="#">Tra cứu chủ xe</a></li>
                    <li><a class="ad-mini" href="#">Thêm thông tin chủ xe</a></li>
                </ul>
            </li>
            <li>
                <a class="ad-tager" href="javascript:void(0)" onclick="toggleSubmenu('submenu3', this)"><i class="fa-solid fa-store"></i> Quản lý giao dịch</a>
                <ul class="ad-submenu" id="submenu3">
                    <li><a class="ad-mini" href="#">Mua bán</a></li>
                    <li><a class="ad-mini" href="#">Bảo trì sửa chữa</a></li>
                </ul>
            </li>
            <li><a class="ad-tager" href="#"><i class="fa-solid fa-chart-pie"></i> Báo cáo thống kê</a></li>
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
        <h1>Thông Tin Chi Tiết Xe</h1>
        
        <div class="ad-detail-container">
            <div class="ad-detail-group">
                <label>Loại Xe:</label>
                <p>@if ($sanPham->loai_xe == 1)
                    Xe số
                @elseif ($sanPham->loai_xe == 2)
                    Xe tay ga
                @elseif ($sanPham->loai_xe == 3)
                    Xe côn tay
                @elseif ($sanPham->loai_xe == 4)
                    Xe điện
                @else
                    Loại xe không xác định
                @endif
                </p>
            </div>
    
            <div class="ad-detail-group">
                <label>Tên Xe:</label>
<p>{{ $sanPham->ten_xe }}</p>
            </div>

            <div class="ad-detail-group">
                <label>Dòng xe:</label>
                <p>{{ $sanPham->dong_xe }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Màu Sắc:</label>
                <p>{{ $sanPham->mau_sac }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Động cơ và Công nghệ:</label>
                <p>{{ $sanPham->cong_nghe }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Giá Xe:</label>
                <p>Giá xe {{ $sanPham->gia }} (VNĐ)</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Tính năng Nổi bật:</label>
                <p>{{ $sanPham->tinh_nang }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Thiết Kế:</label>
                <p>{{ $sanPham->thiet_ke }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Tiện ích và An toàn:</label>
                <p>{{ $sanPham->tienich_antoan }}</p>
            </div>
    
            <div class="ad-detail-group">
                <label>Ảnh Xe:</label>
                <div class="ad-vehicle-image">
                    <img src="{{ $sanPham->hinh_anh }}" alt="Ảnh xe">
                </div>
            </div>
            
            <div class="ad-result-actions">
                <button class="ad-btn-view" onclick="window.location.href='list-motor'">Quay lại</button>
                <button class="ad-btn-edit" onclick="window.location.href='edit-motor?id_xe={{ $sanPham->id_xe }}'">Chỉnh Sửa</button>
                <button class="ad-btn-delete" onclick="window.location.href='delete?id_xe={{ $sanPham->id_xe }}'" >Xóa</button>
            </div>
        </div>
    </div>
    <script src="js\slidebar.js"></script>
</body>
</html>