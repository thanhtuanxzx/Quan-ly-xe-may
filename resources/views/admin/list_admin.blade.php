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
        <h1 class="ad-title">Danh sách Admin</h1>
        <div class="ad-buttons">
            <button class="ad-btn-add" onclick="window.location.href='trade_maintenance.html';">Thêm</button>
        </div>
        <table class="ad-maintenance-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Vai Trò</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>Tuấn Cak</td>
                    <td>0123456789</td>
                    <td>tuancak04@gmail.com</td>
                    <td>Nhân Viên</td>
                    <td>
                        <button class="ad-btn-back">Sửa</button>
                        <button class="ad-btn-del">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuệ Loz</td>
                    <td>0321654987</td>
                    <td>tueloz2004@gmail.com</td>
                    <td>Nhân Viên</td>
                    <td>
                        <button class="ad-btn-back">Sửa</button>
                        <button class="ad-btn-del">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <script src="js\slidebar.js"></script>
</body>
</html>
