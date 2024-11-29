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
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 15px;
        }
        .table th {
            background-color: #d1d3d4;
            color: #000;
        }
        .table td {
            background-color: #fff;
        }
        .price {
            color: red;
            font-weight: bold;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .imgbanggia {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .imgbanggia img {
            max-width: 150px;
            height: auto;
        }
        .imgbanggia label {
            margin-top: 10px;
            font-weight: bold;
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
        <div class="container my-5">
            <!-- Search Bar -->
            <div class="search-bar">
                <h1>Bảng giá xe</h1>
            </div>
    
            <!-- Table -->
           
  
   

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Dòng xe</th>
                        <th>Màu xe</th>
                        <th>Giá bán lẻ đề xuất</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sanPhams as $sanPham)
                    <tr>
                        <td>
                            <div class="imgbanggia">
                                <img style="max-width: 100px;" src="{{$sanPham->hinh_anh}}" alt="">
                                <label for="">{{$sanPham->ten_Xe}}</label>
                            </div>
                        </td>
                        <td>{{$sanPham->dong_xe}}</td>
                        <td>{{$sanPham->mau_sac}}</td>
                        <td class="price">{{$sanPham->gia}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      
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
    
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="scripst.js">
</body>
</html>