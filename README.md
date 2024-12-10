# Hệ Thống Quản Lý Xe Máy

## Giới thiệu
Hệ thống **Quản Lý Xe Máy** được thiết kế nhằm hỗ trợ các cửa hàng hoặc trung tâm kinh doanh xe máy trong việc quản lý thông tin xe, chủ xe, giao dịch, và thống kê chi tiết. 

Hệ thống cung cấp các tính năng giúp tối ưu hóa quy trình quản lý và cải thiện hiệu suất làm việc.

---

## Chức năng chính

### 1. **Quản lý thông tin xe máy**
- Lưu trữ thông tin chi tiết về xe máy:
  - Biển số.
  - Hãng xe (Yamaha, Honda, Suzuki, v.v.).
  - Model (Air Blade, Exciter, Vision, v.v.).
  - Màu sắc.
  - Số khung, số máy.
  - Loại xe (Xe Số, Xe Tay Ga, Xe Côn Tay, Xe Điện).
- Hỗ trợ tra cứu xe theo biển số, hãng xe, model, hoặc màu sắc.

### 2. **Quản lý chủ xe**
- Lưu trữ thông tin chủ sở hữu:
  - Họ và tên.
  - Số CMND/CCCD.
  - Số điện thoại.
  - Địa chỉ thường trú.
- Tra cứu chủ xe theo CMND/CCCD hoặc biển số xe.

### 3. **Quản lý giao dịch**
- Lưu trữ các giao dịch mua bán xe:
  - Ngày giao dịch.
  - Giá bán.
  - Thông tin người mua và người bán.
  - Loại giao dịch (Mua mới, Bảo trì).
- Quản lý lịch sử bảo trì/sửa chữa:
  - Ngày bảo trì/sửa chữa.
  - Loại dịch vụ (bảo trì định kỳ, sửa chữa hư hỏng).
  - Chi phí.
  - Ghi chú chi tiết.

### 4. **Báo cáo thống kê**
- Tổng hợp số liệu:
  - Số lượng xe đã bán theo thời gian.
  - Thống kê các hãng xe bán chạy.
  - Doanh thu từ bán xe.
- Xuất báo cáo chi tiết theo yêu cầu.

---

## Mô hình cơ sở dữ liệu

### 1. Bảng `xe_may`
- Lưu trữ thông tin chi tiết về xe máy.
- Các trường chính:
  - `id_xe`: Mã định danh xe (PK).
  - `bien_so`: Biển số xe (UNIQUE).
  - `hang_xe`: Hãng xe.
  - `model`: Dòng xe.
  - `mau_sac`: Màu sắc.
  - `so_khung`, `so_may`: Số khung, số máy (UNIQUE).
  - `loai_xe`: Loại xe (Xe Số, Xe Tay Ga, Xe Côn Tay, Xe Điện).
  - `id_chu_xe`: Chủ sở hữu hiện tại (FK -> chu_xe.id_chu_xe).

### 2. Bảng `chu_xe`
- Lưu thông tin chi tiết về chủ xe.
- Các trường chính:
  - `id_chu_xe`: Mã định danh chủ xe (PK).
  - `ho_ten`: Họ và tên.
  - `so_cmnd`: Số CMND/CCCD (UNIQUE).
  - `so_dien_thoai`: Số điện thoại.
  - `dia_chi`: Địa chỉ thường trú.

### 3. Bảng `giao_dich`
- Lưu trữ các giao dịch mua bán hoặc bảo trì xe.
- Các trường chính:
  - `id_giao_dich`: Mã giao dịch (PK).
  - `id_xe`: Xe được giao dịch (FK -> xe_may.id_xe).
  - `ngay_giao_dich`: Ngày giao dịch.
  - `gia_ban`: Giá bán.
  - `loai_giao_dich`: Loại giao dịch (Mua mới, Bảo trì).
  - `id_nguoi_ban`, `id_nguoi_mua`: Người bán/mua (FK -> chu_xe.id_chu_xe).

### 4. Bảng `nguoi_dung`
- Lưu trữ thông tin nhân viên cửa hàng.
- Các trường chính:
  - `id_nguoi_dung`: Mã định danh nhân viên (PK).
  - `ten_dang_nhap`: Tên đăng nhập (UNIQUE).
  - `mat_khau`: Mật khẩu (đã mã hóa).
  - `vai_tro`: Vai trò (Admin, Nhân viên).
  - `trang_thai`: Trạng thái tài khoản (Hoạt động, Tạm khóa).

---

## Công nghệ sử dụng
- **Ngôn ngữ lập trình**: PHP.
- **Framework backend**: Laravel.
- **Frontend**: HTML, CSS, JavaScript.
- **Cơ sở dữ liệu**: MySQL 
- **Công cụ quản lý mã nguồn**: Git/GitHub.

---

## Yêu cầu hệ thống

Để chạy dự án, bạn cần đảm bảo hệ thống đáp ứng các yêu cầu sau:

- **PHP** >= 8.0
- **Composer** (trình quản lý thư viện PHP)
- **MySQL** hoặc bất kỳ cơ sở dữ liệu nào được hỗ trợ bởi Laravel
- **Node.js** và **npm** (nếu sử dụng frontend)
- **Git** để clone repository

---

## Cách cài đặt

### 1. Clone repository
```bash
git clone https://github.com/thanhtuanxzx/quan-ly-xe-may.git
cd quan-ly-xe-may
```

### 2. Cài đặt các thư viện
```bash
composer install
```

### 3. Tạo file `.env`
```bash
cp .env.example .env
```

### 4. Cấu hình file `.env`
Mở file `.env` và cập nhật các thông tin kết nối cơ sở dữ liệu, ví dụ:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quanlyxemay
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Tạo application key
```bash
php artisan key:generate
```

### 6. Chạy migration để tạo database
```bash
php artisan migrate
```

### 7. Cài đặt frontend (nếu có)
Nếu dự án có frontend hoặc cần xử lý giao diện, thực hiện:
```bash
npm install
npm run dev
```

### 8. Chạy server
```bash
php artisan serve
```

### 9. Truy cập ứng dụng
Mở trình duyệt và truy cập:
```
http://127.0.0.1:8000
```

---

## Ghi chú

1. **Dữ liệu mẫu (tuỳ chọn):**
   Nếu cần thêm dữ liệu mẫu vào cơ sở dữ liệu, chạy lệnh:
   ```bash
   php artisan db:seed --class=XeMaySeeder

   ```

2. **Email (SMTP):**
   - Cấu hình email trong file `.env`:
     ```env
     MAIL_MAILER=smtp
     MAIL_HOST=smtp.gmail.com
     MAIL_PORT=587
     MAIL_USERNAME=your_email@gmail.com
     MAIL_PASSWORD=your_app_password
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS=your_email@gmail.com
     MAIL_FROM_NAME="Tên dự án"
     ```
---

## Đóng góp

Nếu bạn muốn đóng góp vào dự án, vui lòng:
- Gửi **pull request** với các thay đổi của bạn.
- Tạo **issue** nếu bạn gặp lỗi hoặc muốn đề xuất tính năng mới.
