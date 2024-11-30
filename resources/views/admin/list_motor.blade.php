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
        <h1 class="ad-title">Danh sách thông tin xe</h1>
        @foreach ($sanPhams as $sanPham)
        @if (is_null($sanPham->bien_so) || $sanPham->bien_so === '')
                <div class="ad-result-container">
                    <div class="ad-result-item">
                        <div class="ad-result-image">
                            <img src="{{$sanPham->hinh_anh}}" alt="Hình ảnh xe Honda CBR 150R">
                        </div>
                        <div class="ad-result-info">
                            <div class="ad-result-text">
                                <p><strong>Loại xe:</strong>
<?php
                                        if ($sanPham->loai_xe == 1) {
                                            echo "Xe số";
                                        } elseif ($sanPham->loai_xe == 2) {
                                            echo "Xe tay ga";
                                        } elseif ($sanPham->loai_xe == 3) {
                                            echo "Xe côn tay";
                                        } elseif ($sanPham->loai_xe == 4) {
                                            echo "Xe điện";
                                        } else {
                                            echo "Loại xe không xác định";
                                        }
                                    ?></p>
                                <p><strong>Tên xe:</strong> {{$sanPham->ten_xe}}</p>
                                <p><strong>Dòng xe:</strong> {{$sanPham->dong_xe}} </p>
                            </div>
                            <div class="ad-result-actions">
                                <button class="ad-btn-view" onclick="window.location.href='add-customer?id_xe={{ $sanPham->id_xe }}'" >Thêm khách hàng</button>
                                <button class="ad-btn-edit" onclick="window.location.href='trade-motor?id_xe={{ $sanPham->id_xe }}'">Tạo giao dịch</button>
                            </div>
                        </div>
                        
                        <div class="ad-result-info">
                            <div class="ad-result-text">
                                <p><strong>Màu sắc:</strong> {{$sanPham->mau_sac}}</p>
                                <p><strong>Giá tiền:</strong> <span class="ad-motor-price">{{$sanPham->gia}}</span> VND</p>
                            </div>
                            <div class="ad-result-actions">
                                <button class="ad-btn-view" onclick="window.location.href='detail-motor?id_xe={{ $sanPham->id_xe }}'" >Chi tiết</button>
                                <button class="ad-btn-edit" onclick="window.location.href='edit-motor?id_xe={{ $sanPham->id_xe }}'">Chỉnh Sửa</button>
                                <button class="ad-btn-delete" onclick="window.location.href='delete?id_xe={{ $sanPham->id_xe }}'">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>