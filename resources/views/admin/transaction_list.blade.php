<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\history.css">
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
        <h1>Danh sách giao dịch</h1>
        <input type="text" id="searchInput">
        <div class="ad-buttons">
        </div>
        <table class="ad-maintenance-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Biển số</th>
                    <th>Loại</th>
                    <th>Ngày</th>
                    <!-- <th>Hạng Mục</th> -->
                    <th>Chi Phí (VNĐ)</th>
                    <th>Ghi Chú</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Mẫu dữ liệu -->
                @foreach($giaodich as $gd)
                <tr>
                    <td>{{$gd->id_giao_dich}}</td>
                    <td>{{$gd->nguoiMua->ho_ten}}</td>
                    <td>{{$gd->nguoiMua->so_dien_thoai}}</td>
                    <td>{{$gd->xeMay->bien_so}}</td>
                    <td>{{$gd->loai_giao_dich}}</td>
                    <td>{{$gd->ngay_giao_dich}}</td>
                
                    <td>{{$gd->gia_ban}}</td>
                    <td>{{$gd->ghi_chu}}</td>
                </tr>
               
                
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        function filterTable(tableBodyId, query) {
            const rows = document.querySelectorAll(`#${tableBodyId} tr`);
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(query.toLowerCase())) {
                        match = true;
                    }
                });
                row.style.display = match ? '' : 'none';
            });
        }

        // Áp dụng cho nhiều ô tìm kiếm và bảng khác nhau
        function setUpFilter(searchInputId, tableBodyId) {
            document.getElementById(searchInputId).addEventListener('input', function() {
                filterTable(tableBodyId, this.value);
            });
        }

        // Sử dụng hàm này cho nhiều bảng và ô tìm kiếm khác nhau
        setUpFilter('searchInput', 'table-body');
        setUpFilter('searchInput2', 'table-body2');
    </script>
    <script src="js\slidebar.js"></script>
</body>
</html>
