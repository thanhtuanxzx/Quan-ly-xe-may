<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cửa Hàng - Element-trac-motorbike</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="ass/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .form-control {
        border-radius: 10px;
        box-shadow: none;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        font-size: 18px;
        padding: 5;
        
        }
        .btn-submit {
            
            border: 1px solid #d91e18;
            color: #d91e18;
            font-weight: bold;
            padding: 12px 25px; /* Tăng kích thước nút */
            border-radius: 5px;
            font-size: 15px;
        }

        .btn-submit:hover {
            background-color: #d91e18;
            color: white;
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
    <!-- About Section -->
    <section id="about" class="tt_about py-5">
        <div class="container">
            <h2 class="text-center mb-4">Về Chúng Tôi</h2>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        **Element-trac-motorbike** tự hào là một trong những cửa hàng xe máy uy tín hàng đầu tại Việt Nam. Chúng tôi mang đến cho khách hàng các dòng xe chất lượng cao, phong cách hiện đại, từ xe phổ thông đến các dòng xe cao cấp.
                    </p>
                    <p>
                        Với đội ngũ chuyên nghiệp và tận tâm, chúng tôi cam kết mang lại dịch vụ bán hàng và bảo dưỡng tốt nhất, đảm bảo sự hài lòng tối đa cho từng khách hàng.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Store Section -->
    <section id="store" class="tt_store bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Cửa Hàng Của Chúng Tôi</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://cdn.honda.com.vn/head-open-info/July2020/fqHfOxDhZhm0PG2tyGYd.jpg" class="card-img-top" alt="Cửa hàng 1">
                        <div class="card-body">
                            <h5 class="card-title">Element-trac-motorbike Bình Thủy</h5>
                            <p class="card-text">Địa chỉ: 60 Đường Bùi Hữu Nghĩa Phường Bình Thủy, Quận Bình Thủy, Thành Phố Cần Thơ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://cdn.honda.com.vn/head-open-info/July2020/fqHfOxDhZhm0PG2tyGYd.jpg" class="card-img-top" alt="Cửa hàng 2">
                        <div class="card-body">
                            <h5 class="card-title">Element-trac-motorbike Ninh Kiều</h5>
                            <p class="card-text">Địa chỉ: 389 Đường Nguyễn Văn Cừ Phường An Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://cdn.honda.com.vn/head-open-info/July2020/fqHfOxDhZhm0PG2tyGYd.jpg" class="card-img-top" alt="Cửa hàng 3">
                        <div class="card-body">
                            <h5 class="card-title">Element-trac-motorbike Cái Răng</h5>
                            <p class="card-text">Địa chỉ: 60 Đường Trần Chiên Phường Lê Bình, Quận Cái Răng, Thành Phố Cần Thơ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <div class="container form-container">
    <h2>Liên Hệ Với Cửa Hàng</h2>
    <form action="{{ route('lienhe.submit') }}" method="post">
        @csrf <!-- Token CSRF bảo vệ form -->
        <!-- Full Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên</label>
            <input type="text" class="form-control" id="name" name="ho_ten" required placeholder="Nhập họ và tên của bạn">
        </div>

        <!-- Phone Number -->
        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="tel" class="form-control" id="phone" name="so_dien_thoai" required placeholder="Nhập số điện thoại của bạn">
        </div>

        <!-- Service -->
        <div class="mb-3">
            <label for="service" class="form-label">Dịch Vụ</label>
            <select class="form-control" id="service" name="dich_vu" required>

                <option value="Mua xe">Mua Xe</option>
                <option value="Bảo dưỡng">Bảo Dưỡng</option>
                <option value="Sửa chữa">Sửa Chữa</option>
                <option value="Phản ánh dịch vụ">Phản Ánh Dịch Vụ</option>
            </select>
        </div>

        <!-- Notes -->
        <div class="mb-3">
            <label for="notes" class="form-label">Ghi Chú</label>
            <textarea style="max-height: 300px;" class="form-control" id="notes" name="ghi_chu" rows="4" placeholder="Nhập ghi chú của bạn"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-submit">Gửi Thông Tin</button>
        </div>
    </form>
</div>

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

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="scripst.js">
</body>
</html>
