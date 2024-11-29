<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Element-trac-motorbike</title>
    <link rel="stylesheet" href="ass/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


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
        <div class="imgcontainer">
<div class="main-image img_banner">
                <img class="img_banner" id="displayed-image" src="ass/img/banner1.jpg">
                <div class="navigation-buttons">
                    <button onclick="prevImage()"><i class="bi bi-arrow-left-circle"></i></button>
                    <button onclick="nextImage()"><i class="bi bi-arrow-right-circle"></i></i></button>
                </div>
            </div>
            
        </div>
        <section id="content" class="content" style="margin-top: 0px; padding-top: 0px; margin-bottom: 0px;">
            <div class="container">
                <div class="row">
                    <h1 class="text-center p-5">Danh mục sản phẩm</h1>
                    <section class="tt_vehicle-section py-5">
                        <div class="container">
                            <div class="row">
                                <!-- Xe Tay Ga -->
                                <div class="col-md-3">
                                    <a href="/sanpham?loai_xe=1" style="text-decoration: none;">
                                    <div class="tt_vehicle-card">
                                        <img src="ass/img/xesomau.jpg" alt="Xe Tay Ga" class="img-fluid">
                                        <div class="tt_vehicle-info text-center">
                                            <span class="tt_arrow">&rarr;</span>
                                            <h4 class="tt_vehicle-title text-secondary">Xe Số</h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <!-- Xe Số -->
                                <div class="col-md-3">
                                    <a href="/sanpham?loai_xe=2" style="text-decoration: none;">
                                    <div class="tt_vehicle-card">
                                        <img src="ass/img/taygamau.jpg" alt="Xe Số" class="img-fluid">
                                        <div class="tt_vehicle-info text-center">
                                            <span class="tt_arrow">&rarr;</span>
                                            <h4 class="tt_vehicle-title text-secondary">Xe Tay Ga</h4>
                                        </div>
                                    </div></a>
                                </div>
                                <!-- Xe Côn Tay -->
                                <div class="col-md-3">
                                    <a href="/sanpham?loai_xe=3" style="text-decoration: none;">
                                        <div class="tt_vehicle-card">
                                            <img src="ass/img/xecontaymau.jpg" alt="Xe Côn Tay" class="img-fluid">
<div class="tt_vehicle-info text-center">
                                                <span class="tt_arrow">&rarr;</span>
                                                <h4 class="tt_vehicle-title text-secondary">Xe Côn Tay</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/sanpham?loai_xe=4" style="text-decoration: none;">
                                        <div class="tt_vehicle-card">
                                            <img src="ass/img/xedienmau.jpg" alt="Xe Điện" class="img-fluid">
                                            <div class="tt_vehicle-info text-center">
                                                <span class="tt_arrow">&rarr;</span>
                                                <h4 class="tt_vehicle-title text-secondary">Xe Điện</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <br>
            </div>
        </section>

        <section class="service-section">
            <div class="service-container">
                <div class="service-content">
                    <h2 class="service-title">CHÍNH SÁCH BẢO DƯỠNG</h2>
                    <p class="service-description">
                        Element-trac-motorbike cung cấp dịch vụ bảo dưỡng định kỳ để đảm bảo xe của bạn hoạt động tốt nhất, bao gồm kiểm tra động cơ, thay dầu, và các hạng mục khác.
                    </p>
                    <a href="/chinh-sach-baoduong" class="service-btn">TÌM HIỂU NGAY →</a>
                </div>
            </div>
        </section>

        <section class="service-section" style=" justify-content: right; background-image: url('https://dungtien.com.vn/wp-content/uploads/2020/05/acc22c69706e8a30d37f.jpg');">
            <div class="service-container" >
                <div class="service-content">
                    <h2 class="service-title">CHÍNH SÁCH BẢO HÀNH</h2>
                    <p class="service-description">
                        Chúng tôi cung cấp chính sách bảo hành chính hãng, hỗ trợ sửa chữa miễn phí trong thời gian bảo hành, đảm bảo quyền lợi tốt nhất cho khách hàng.
                    </p>
                    <a href="/chinh-sach-baohanh" class="service-btn">TÌM HIỂU NGAY →</a>
                </div>
            </div>
        </section>
<section class="service-section" style=" justify-content: center; background-image: url('https://quatangdoanhnghiephcm.com/img_data/images/ao-thun-dong-phuc-hon-da-2.jpg');">
            <div class="service-container" style="background: rgba(0, 0, 0, 0.6);">
                <div class="service-content">
                    <h2 class="service-title">Liên hệ ngay với chúng tôi để nhận được những ưu đãi tốt nhất</h2>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="/lien-he-mua-hang" class="service-btn-blc" style="">LIÊN HỆ NGAY →</a>
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
  <script>
        let currentImageIndex = 0;
        const images = ['ass/img/banner1.jpg', 'ass/img/banner2.jpg', 'ass/img/banner3.jpg'];

        // Cập nhật ảnh chính
        function updateImage() {
            console.log(`Cập nhật hình ảnh: ${images[currentImageIndex]}`);
document.getElementById("displayed-image").src = images[currentImageIndex];
        }

        // Chuyển đến ảnh trước
        function prevImage() {
            currentImageIndex = (currentImageIndex === 0) ? images.length - 1 : currentImageIndex - 1;
            console.log(`Previous Image Index: ${currentImageIndex}`);
            updateImage();
        }

        // Chuyển đến ảnh kế tiếp
        function nextImage() {
            currentImageIndex = (currentImageIndex === images.length - 1) ? 0 : currentImageIndex + 1;
            console.log(`Next Image Index: ${currentImageIndex}`);
            updateImage();
        }

        

</script>
</body>
</html>