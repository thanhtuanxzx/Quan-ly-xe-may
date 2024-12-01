﻿# Hệ Thống Quản Lý Xe Máy

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

## Cách cài đặt
1. Clone repository:
   ```bash
   git clone https://github.com/thanhtuanxzx/quan-ly-xe-may
