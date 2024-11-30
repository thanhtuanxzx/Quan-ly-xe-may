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
        <h1>Thống Kê Doanh Thu</h1>

        <canvas id="revenueChart"></canvas>

        <div class="table-container">
            <table class="ad-table" id="revenueTable">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Mua bán (VNĐ)</th>
                   
                        <th>Bảo dưỡng (VNĐ)</th>
                        <th>Tổng (VNĐ)</th> <!-- Cột tổng -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tháng 1</td>
                        <td>1000000</td>
                        <!-- <td>500000</td> -->
                        <td>700000</td>
                        <td>2500000</td> <!-- Tổng của tháng 1 -->
                    </tr>
                    <tr>
                        <td>Tháng 2</td>
                        <td>1200000</td>
                        <!-- <td>700000</td> -->
                        <td>400000</td>
                        <td>2300000</td> <!-- Tổng của tháng 2 -->
                    </tr>
                    <tr>
                        <td>Tháng 3</td>
                        <td>1500000</td>
                        <!-- <td>800000</td> -->
                        <td>600000</td>
                        <td>2400000</td> <!-- Tổng của tháng 3 -->
                    </tr>
                    <tr>
                        <td><strong>Tổng Quý 1</strong></td>
                        <td><strong>3700000</strong></td> <!-- Tổng quý 1 -->
                        <!-- <td><strong>2000000</strong></td> -->
                        <td><strong>1700000</strong></td>
                        <td><strong>8000000</strong></td> <!-- Tổng quý 1 -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

    <script src="js\slidebar.js"></script>
    <script>
        // Lấy dữ liệu từ bảng HTML (không thay đổi phần biểu đồ)
        function getTableData() {
            const rows = document.querySelectorAll('#revenueTable tbody tr');
            const months = [];
            const revenueBuy = [];
            const revenueMaintenance = [];
            const revenueService = [];
    
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const month = cells[0].innerText;
                
                // Nếu không phải dòng tổng quý, lấy doanh thu
                if (month.includes('Tháng')) {
                    const buyRevenue = parseInt(cells[1].innerText);
                    const maintenanceRevenue = parseInt(cells[2].innerText);
                    const serviceRevenue = parseInt(cells[3].innerText);
    
                    months.push(month);
                    revenueBuy.push(buyRevenue);
                    revenueMaintenance.push(maintenanceRevenue);
                    revenueService.push(serviceRevenue);
                }
            });
    
            return { months, revenueBuy, revenueMaintenance, revenueService };
        }
    
        // Lấy dữ liệu bảng và tạo biểu đồ (không thay đổi phần biểu đồ)
        const { months, revenueBuy, revenueMaintenance, revenueService } = getTableData();
    
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
                        label: 'Bảo dưỡng (VNĐ)',
                        data: revenueService, 
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
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
