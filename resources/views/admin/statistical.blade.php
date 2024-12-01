<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Xe Máy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css\slidebar.css">
    <link rel="stylesheet" href="css\statistical.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        <h1>Thống Kê Doanh Thu</h1>
    
        <canvas id="revenueChart"></canvas>
    
        <div class="table-container">
            <table class="ad-table" id="revenueTable">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Mua bán (VNĐ)</th>
                        <th>Bảo trì/Bảo dưỡng (VNĐ)</th>
                        <th>Tổng (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($thongKeData as $data)
            <tr>
                <td>Tháng {{ \Carbon\Carbon::parse($data['thang'])->format('m') }}</td>
                <td>{{ number_format($data['mua_ban'], 0, ',', '.') }} VNĐ</td>
                <td>{{ number_format($data['bao_duong'], 0, ',', '.') }} VNĐ</td>
                <td>{{ number_format($data['tong'], 0, ',', '.') }} VNĐ</td>
            </tr>
        @endforeach



                    <tr>
                        <td><strong>Tổng</strong></td>
                        <td><strong id="totalBuy"></strong></td>
                        <td><strong id="totalMaintenance"></strong></td>
                        <td><strong id="totalRevenue"></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    
    <script src="js/slidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Lấy dữ liệu từ bảng HTML và tính tổng
        function getTableDataAndCalculateTotal() {
            const rows = document.querySelectorAll('#revenueTable tbody tr');
            const months = [];
            const revenueBuy = [];
            const revenueMaintenance = [];
            let totalBuy = 0, totalMaintenance = 0, totalRevenue = 0;

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const month = cells[0].innerText.trim(); // Loại bỏ khoảng trắng dư thừa

                // Kiểm tra nếu không phải dòng tổng
                if (month.includes('Tháng')) {
                    // Lấy giá trị từ bảng, kiểm tra nếu giá trị hợp lệ (nếu không có dữ liệu thì dùng 0)
                    const buyRevenue = parseInt(cells[1].innerText.replace(/[^\d]/g, '')) || 0; // Loại bỏ ký tự không phải số
                    const maintenanceRevenue = parseInt(cells[2].innerText.replace(/[^\d]/g, '')) || 0; // Loại bỏ ký tự không phải số

                    // Đảm bảo giá trị là số hợp lệ
                    if (!isNaN(buyRevenue) && !isNaN(maintenanceRevenue)) {
                        months.push(month);
                        revenueBuy.push(buyRevenue);
                        revenueMaintenance.push(maintenanceRevenue);

                        // Cộng dồn tổng
                        totalBuy += buyRevenue;
                        totalMaintenance += maintenanceRevenue;
                        totalRevenue += buyRevenue + maintenanceRevenue;

                        const totalRevenueForMonth = buyRevenue + maintenanceRevenue;

                        // Cập nhật cột Tổng (VNĐ) của tháng
                        cells[3].innerText = totalRevenueForMonth.toLocaleString();  // Định dạng với dấu phân cách hàng nghìn
                    }
                }
            });

            // Cập nhật tổng vào bảng
            document.getElementById('totalBuy').innerText = totalBuy.toLocaleString();
            document.getElementById('totalMaintenance').innerText = totalMaintenance.toLocaleString();
            document.getElementById('totalRevenue').innerText = totalRevenue.toLocaleString();

            return { months, revenueBuy, revenueMaintenance };
        }

        // Lấy dữ liệu bảng và tạo biểu đồ
        const { months, revenueBuy, revenueMaintenance } = getTableDataAndCalculateTotal();

        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Tháng
                datasets: [
                    {
                        label: 'Mua bán (VNĐ)',
                        data: revenueBuy, 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Bảo trì/Bảo dưỡng (VNĐ)',
                        data: revenueMaintenance, 
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
    
</body>
</html>
