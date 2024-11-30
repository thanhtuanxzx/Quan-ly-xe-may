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
        <h1 class="ad-title">Danh sách thông tin chủ xe</h1>
        <div class="ad-result-container">
        @foreach($Chuxe as $chuxe)
   
            <div class="ad-result-item">
                <div class="ad-result-info">
                    <div class="ad-result-text">
                        <p><strong>Biển số: </strong> {{$chuxe->xeMay->bien_so}}</p>
                        <p><strong>Họ tên khách hàng: </strong>{{ $chuxe->ho_ten }}</p>
                        <p><strong>Số điện thoại: </strong>{{ $chuxe->so_dien_thoai }}</p>
                        <p><strong>Địa chỉ: </strong>{{ $chuxe->dia_chi }}</p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-view" onclick="window.location.href='trade-maintenance';">Tạo giao dịch</button>
                        <button class="ad-btn-edit" onclick="window.location.href='history-customer?id_chu_xe={{ $chuxe->id_chu_xe }}';">Lịch sử</button>
                    </div>
                </div>
                
                <div class="ad-result-info">
                    <div class="ad-result-text">
                    <p><strong>Loại xe: </strong>
                                @if($chuxe->xeMay->loai_xe == 1)
                                    Xe số
                                @elseif($chuxe->xeMay->loai_xe == 2)
                                    Tay ga
                                @elseif($chuxe->xeMay->loai_xe == 3)
                                    Xe tay côn
                                @elseif($chuxe->xeMay->loai_xe == 4)
                                    Xe điện
                                @else
                                    Không xác định
                                @endif  
                            </p>

                        <p><strong>Tên xe: </strong>{{$chuxe->xeMay->ten_xe}}</p>
                        <p><strong>Dòng xe:</strong> {{$chuxe->xeMay->dong_xe}}</p>
                        <p><strong>Màu sắc: </strong>{{$chuxe->xeMay->mau_sac}}</p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-edit" onclick="window.location.href='edit-customer?id_xe={{$chuxe->xeMay->id_xe}}';">Chỉnh Sửa</button>
                        <button class="ad-btn-delete" onclick="window.location.href='delete?id_xe={{ $chuxe->id_xe }}'">Xóa</button>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
