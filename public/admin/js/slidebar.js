function toggleSubmenu(submenuId, target) {
    const currentSubmenu = document.querySelector('.ad-submenu[style="display: block;"]'); 
    const submenu = document.getElementById(submenuId);

    if (submenu) {
        if (currentSubmenu && currentSubmenu !== submenu) {
            currentSubmenu.style.display = 'none';
        }

        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }

        const allMainItems = document.querySelectorAll('.ad-tager');
        allMainItems.forEach(item => item.classList.remove('active')); 

        if (target) {
            target.classList.add('active'); 
        }
    }
}

document.querySelectorAll('.ad-tager').forEach(item => {
    item.addEventListener('mouseleave', function() {
        this.classList.remove('active');
    });
});

const showChangePasswordBtn = document.getElementById('showChangePasswordBtn');
if (showChangePasswordBtn) {
    showChangePasswordBtn.addEventListener('click', function() {
        const userInfoSection = document.getElementById('userInfoSection');
        const changePasswordSection = document.getElementById('changePasswordSection');
        if (userInfoSection && changePasswordSection) {
            userInfoSection.style.display = 'none'; 
            changePasswordSection.style.display = 'block'; 
        }
    });
}

const cancelChangePasswordBtn = document.getElementById('cancelChangePasswordBtn');
if (cancelChangePasswordBtn) {
    cancelChangePasswordBtn.addEventListener('click', function() {
        const userInfoSection = document.getElementById('userInfoSection');
        const changePasswordSection = document.getElementById('changePasswordSection');
        if (userInfoSection && changePasswordSection) {
            userInfoSection.style.display = 'block'; 
            changePasswordSection.style.display = 'none'; 
        }
    });
}
