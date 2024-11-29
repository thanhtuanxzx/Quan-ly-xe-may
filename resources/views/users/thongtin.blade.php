<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Element-trac-motorbike</title>
    <link rel="stylesheet" href="ass/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .header-section {
            background-color: #d91e18;
            color: white;
            padding: 50px 0;
            text-align: center;
            border-bottom: 5px solid #ff0000;
        }

        .header-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .header-section p {
            font-size: 1.2rem;
            margin-top: 15px;
        }

        .promotion-section {
            margin-top: 40px;
        }

        .promotion-section h2 {
            color: #d91e18;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .promotion-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .promotion-item:hover {
            transform: scale(1.05);
        }

        .promotion-item h3 {
            color: #ff0000;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .promotion-item p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }

        .promotion-item .promotion-dates {
            color: #555;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        
    </style>

</head>
<body>
    <header class="header-area overlay">
        <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
                <img style="width: 5%; margin-right: 10px; padding-bottom: 5px;" src="https://logospng.org/download/honda/logo-honda-4096.png" alt="">
                <a href="/index" class="navbar-brand">Element-trac-motorbike</a>
                
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>
                
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li><a href="/index" class="nav-item nav-link active">Trang chủ</a></li>
                        <li><a href="/thong-tin" class="nav-item nav-link">Thông tin</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-item nav-link" data-toggle="dropdown">Sản phẩm</a>
                            <div class="dropdown-menu">
                                <a href="/sanpham?loai_xe=1" class="dropdown-item">Xe số</a>
                                <a href="/sanpham?loai_xe=2" class="dropdown-item">Xe tay ga</a>
                                <a href="/sanpham?loai_xe=3" class="dropdown-item">Xe côn tay</a>
                                <a href="/sanpham?loai_xe=4" class="dropdown-item">Xe điện</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-item nav-link" data-toggle="dropdown">Chính sách</a>
                            <div class="dropdown-menu">
                                <a href="/chinh-sach-baohanh" class="dropdown-item">Bảo hành</a>
                                <a href="/chinh-sach-baoduong" class="dropdown-item">Bảo dưỡng</a>
                            </div>
                        </li>
                        <li><a href="/lien-he-mua-hang" class="nav-item nav-link">Liên hệ mua hàng</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        

    </header>
    
    <main>
        <!-- Header Section -->
    <section class="header-section">
        <div class="container">
            <h1 class="display-4">Khuyến Mãi Hấp Dẫn</h1>
            <p class="lead">Chúng tôi luôn có những ưu đãi đặc biệt dành cho khách hàng yêu thích xe máy tại Element-Trac.</p>
        </div>
    </section>

    <!-- Khuyến Mãi Section -->
    <section class="promotion-section container">
        <h2>Chương Trình Khuyến Mãi Hiện Tại</h2>

        <!-- Khuyến Mãi 1 -->
        <div class="promotion-item">
            <h3>Giảm Giá 10% Cho Tất Cả Các Mẫu Xe Máy</h3>
            <p>Nhân dịp khai trương, chúng tôi giảm giá 10% cho tất cả các mẫu xe máy tại cửa hàng. Hãy đến ngay để chọn cho mình chiếc xe yêu thích với mức giá ưu đãi!</p>
            <div class="promotion-dates">
                <strong>Thời gian khuyến mãi:</strong> Từ ngày 1 tháng 12 năm 2024 đến hết ngày 31 tháng 12 năm 2024
            </div>
            
        </div>

        <!-- Khuyến Mãi 2 -->
        <div class="promotion-item">
            <h3>Quà Tặng Hấp Dẫn Cho Khách Hàng Mua Xe</h3>
            <p>Mua bất kỳ chiếc xe nào tại cửa hàng, bạn sẽ nhận được một bộ bảo hiểm xe miễn phí trị giá lên đến 1 triệu đồng. Đây là một cơ hội tuyệt vời để bảo vệ chiếc xe của bạn!</p>
            <div class="promotion-dates">
                <strong>Thời gian khuyến mãi:</strong> Từ ngày 15 tháng 11 năm 2024 đến ngày 31 tháng 12 năm 2024
            </div>
            
        </div>

        <!-- Khuyến Mãi 3 -->
        <div class="promotion-item">
            <h3>Chương Trình Trả Góp 0% Lãi Suất</h3>
            <p>Chúng tôi cung cấp chương trình trả góp lãi suất 0% cho tất cả các mẫu xe trong cửa hàng. Đây là cơ hội để bạn sở hữu xe máy mà không phải lo lắng về tài chính!</p>
            <div class="promotion-dates">
                <strong>Thời gian khuyến mãi:</strong> Liên hệ với chúng tôi để biết thêm chi tiết về thời gian và điều kiện áp dụng.
            </div>
            
        </div>
    </section>
    </main>


    <footer class="text-light py-4">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h5>Về chúng tôi</h5>
                    <p class="col-md-10" style="line-height: 200%;">
                        Element-trac-motorbike là cửa hàng chuyên cung cấp các dòng xe máy đa dạng, bao gồm xe số, xe tay ga, xe điện và xe côn tay. Chúng tôi cam kết mang đến những sản phẩm chất lượng, phù hợp với nhu cầu và sở thích của từng khách hàng. Với đội ngũ nhân viên tư vấn tận tâm, các mẫu xe tại cửa hàng luôn được cập nhật mới nhất, giúp bạn dễ dàng lựa chọn được chiếc xe ưng ý. Hãy đến với Element-trac-motorbike để trải nghiệm và sở hữu chiếc xe mơ ước!
                    </p>
                </div>
                
                <div class="col-md-6">
                    <h5>Liên hệ</h5>
                    <p>Email: Elementtracmotorbike@gamil.com</p>
                    <p>Phone: +84 782 951 053</p>
                    <p>Địa chỉ chi nhánh 1: 60 Đường Bùi Hữu Nghĩa Phường Bình Thủy, Quận Bình Thủy, Thành Phố Cần Thơ</p>
                    <p>Địa chỉ chi nhánh 2: 389 Đường Nguyễn Văn Cừ Phường An Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ </p>
                    <p>Địa chỉ chi nhánh 3: 60 Đường Trần Chiên Phường Lê Bình, Quận Cái Răng, Thành Phố Cần Thơ</p>

                </div>
            </div>
        </div>
    </footer>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="scripst.js">

</body>
</html>