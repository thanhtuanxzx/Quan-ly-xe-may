  // Hàm xử lý mở/đóng submenu (mục con) và tô đậm mục lớn khi được chọn
  function toggleSubmenu(submenuId, target) {
    const currentSubmenu = document.querySelector('.ad-submenu[style="display: block;"]'); // tìm submenu đang hiển thị
    const submenu = document.getElementById(submenuId);

    // Nếu có mục con đang hiển thị, ẩn nó đi
    if (currentSubmenu && currentSubmenu !== submenu) {
        currentSubmenu.style.display = 'none';
    }

    // Kiểm tra nếu mục con đang được hiển thị thì ẩn nó đi, ngược lại hiển thị
    if (submenu.style.display === "block") {
        submenu.style.display = "none";
    } else {
        submenu.style.display = "block";
    }

    // Tô đậm mục lớn khi được chọn
    const allMainItems = document.querySelectorAll('.ad-tager');
    allMainItems.forEach(item => item.classList.remove('active')); // Xóa lớp active khỏi tất cả mục lớn

    target.classList.add('active'); // Thêm lớp active vào mục được chọn
}

// Hàm xử lý khi chuột rời khỏi mục lớn (loại bỏ lớp active)
document.querySelectorAll('.ad-tager').forEach(item => {
    item.addEventListener('mouseleave', function() {
        this.classList.remove('active'); // Loại bỏ lớp active khi chuột rời khỏi
    });
});
