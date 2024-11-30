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
        <h1 class="ad-title">Tra cứu thông tin xe</h1>
                <!-- Hãng Xe -->
                <div class="ad-search-container">
                <form action="{{ route('motor.search') }}" method="GET">
                    <div class="ad-form-group">
                        <label for="brand">Loại Xe</label>
                        <select id="brand" name="brand" class="ad-select">
                            <option value="">Tất cả loại xe</option>
                            <option value="1">Xe số</option>
                            <option value="2">Tay ga</option>
                            <option value="3">Xe tay côn</option>
                            <option value="4">Xe điện</option>
                        </select>
                    </div>

                    <!-- Model Xe -->
                    <div class="ad-form-group">
                        <label for="model">Tên Xe</label>
                        <input type="text" id="model" name="model" class="ad-input" placeholder="Nhập Tên xe">
                    </div>

                    <div class="ad-form-group">
                        <label for="dongxe">Dòng Xe</label>
                        <input type="text" id="dongxe" name="dongxe" class="ad-input" placeholder="Nhập Dòng xe">
                    </div>

                    <!-- Màu Sắc -->
                    <div class="ad-form-group">
                        <label for="color">Màu Sắc</label>
                        <input type="text" id="color" name="color" class="ad-input" placeholder="Nhập màu sắc xe">
                    </div>

                    <div class="ad-form-group">
                        <button type="submit" class="ad-btn-search">Tìm Kiếm</button>
                    </div>
                </form>
            </div>

            
        <div class="ad-result-container">
            <h2 class="ad-result-title">Kết Quả Tra Cứu</h2>
            @if($motors->isEmpty())
            <p>Không tìm thấy xe nào phù hợp với tiêu chí tìm kiếm.</p>
            @else
            @foreach($motors as $motor)
            @if (is_null($motor->bien_so) || $motor->bien_so === '')
            <div class="ad-result-item">
                <div class="ad-result-image">
                    <img src="{{$motor->hinh_anh }}" alt="Hình ảnh xe Honda CBR 150R">
                </div>
                <div class="ad-result-info">
                    <div class="ad-result-text">
                <p><strong>Loại xe:</strong> 
                    <?php
                        if ($motor->loai_xe == 2) {
                            echo "Tay ga";
                        } elseif ($motor->loai_xe  == 1) {
                            echo "Xe số";
                        } elseif ($motor->loai_xe  == 3) {
                            echo "Xe tay côn";
                        } elseif ($motor->loai_xe  == 4) {
                            echo "Xe điện";
                        } else {
                            echo "Loại xe không xác định";
                        }
                    ?>
                </p>
                        <p><strong>Tên xe:</strong> {{ $motor->ten_xe }}</p>
                        <p><strong>Dòng xe:</strong> {{ $motor->dong_xe }} </p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-view" onclick="window.location.href='detail-motor?id_xe={{ $motor->id_xe }}'" >Chi tiết</button>
                        <button class="ad-btn-edit" onclick="window.location.href='edit-motor?id_xe={{ $motor->id_xe }}'">Chỉnh Sửa</button>
</div>
                </div>
                
                <div class="ad-result-info">
                    <div class="ad-result-text">
                        <p><strong>Màu sắc:</strong> {{ $motor->mau_sac }}</p>
                        <p><strong>Giá tiền:</strong> <span class="ad-motor-price">{{ $motor->gia }}</span> VND</p>
                    </div>
                    <div class="ad-result-actions">
                        <button class="ad-btn-delete" onclick="window.location.href='delete?id_xe={{ $motor->id_xe }}'">Xóa</button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div> 
        
    </div>
    <script>
        document.querySelector("#myForm").addEventListener("submit", function(event) {
    event.preventDefault();  
    alert("Form không được gửi.");
  });
    </script>
    <script src="js\slidebar.js"></script>
</body>
</html>