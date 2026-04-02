// ========================================
// DASHBOARD JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // SIDEBAR TOGGLE FOR MOBILE
    // ========================================
    const mobileToggle = document.querySelector('.dashboard-mobile-toggle');
    const sidebar = document.querySelector('.dashboard-sidebar');
    const overlay = document.createElement('div');
    overlay.className = 'dashboard-overlay';
    
    if (mobileToggle && sidebar) {
        mobileToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            
            // Add overlay when sidebar is open
            if (sidebar.classList.contains('active')) {
                document.body.appendChild(overlay);
                overlay.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    z-index: 98;
                `;
                
                // Close sidebar when clicking overlay
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    overlay.remove();
                });
            } else {
                if (document.body.contains(overlay)) {
                    overlay.remove();
                }
            }
        });
    }
    
    // ========================================
    // ACTIVE MENU HIGHLIGHTING
    // ========================================
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.dashboard-nav-link');
    
    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        if (linkPage === currentPage) {
            link.classList.add('active');
        }
        
        // Add click handler to update active state
        link.addEventListener('click', function() {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // ========================================
    // USER DROPDOWN MENU
    // ========================================
    const userMenu = document.querySelector('.dashboard-user-menu');
    const userDropdown = document.querySelector('.dashboard-user-dropdown');
    
    if (userMenu && userDropdown) {
        userMenu.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            if (userDropdown.classList.contains('active')) {
                userDropdown.classList.remove('active');
            }
        });
    }
    
    // ========================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ========================================
    // const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    // anchorLinks.forEach(link => {
    //     link.addEventListener('click', function(e) {
    //         const targetId = this.getAttribute('href');
    //         if (targetId !== '#') {
    //             e.preventDefault();
    //             const targetElement = document.querySelector(targetId);
    //             if (targetElement) {
    //                 targetElement.scrollIntoView({
    //                     behavior: 'smooth',
    //                     block: 'start'
    //                 });
    //             }
    //         }
    //     });
    // });
    
    // ========================================
    // NOTIFICATION BADGE ANIMATION
    // ========================================
    // const notificationBadges = document.querySelectorAll('.dashboard-icon-btn .badge');
    
    // notificationBadges.forEach(badge => {
    //     if (parseInt(badge.textContent) > 0) {
    //         badge.style.animation = 'pulse 2s infinite';
    //     }
    // });
    
    // Add pulse animation
    // const style = document.createElement('style');
    // style.textContent = `
    //     @keyframes pulse {
    //         0%, 100% {
    //             transform: scale(1);
    //         }
    //         50% {
    //             transform: scale(1.1);
    //         }
    //     }
    // `;
    // document.head.appendChild(style);
    
    // ========================================
    // AUTO-HIDE ALERTS/NOTIFICATIONS
    // ========================================
    // const alerts = document.querySelectorAll('.dashboard-alert');
    
    // alerts.forEach(alert => {
    //     if (alert.dataset.autohide) {
    //         const delay = parseInt(alert.dataset.autohide) || 5000;
    //         setTimeout(() => {
    //             alert.style.opacity = '0';
    //             alert.style.transform = 'translateY(-20px)';
    //             setTimeout(() => alert.remove(), 300);
    //         }, delay);
    //     }
    // });
    
    // ========================================
    // TOOLTIP INITIALIZATION (if using Bootstrap)
    // ========================================
    // if (typeof bootstrap !== 'undefined') {
    //     const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    //     tooltipTriggerList.map(function (tooltipTriggerEl) {
    //         return new bootstrap.Tooltip(tooltipTriggerEl);
    //     });
    // }
    
    // ========================================
    // SEARCH FUNCTIONALITY
    // ========================================
    // const searchInput = document.querySelector('.dashboard-search input');
    
    // if (searchInput) {
    //     searchInput.addEventListener('input', function() {
    //         const searchTerm = this.value.toLowerCase();
    //         // Add your search logic here
    //         console.log('Searching for:', searchTerm);
    //     });
    // }
    
    // ========================================
    // CARD ANIMATIONS ON SCROLL
    // ========================================
    // const observerOptions = {
    //     threshold: 0.1,
    //     rootMargin: '0px 0px -50px 0px'
    // };
    
    // const observer = new IntersectionObserver(function(entries) {
    //     entries.forEach(entry => {
    //         if (entry.isIntersecting) {
    //             entry.target.style.opacity = '1';
    //             entry.target.style.transform = 'translateY(0)';
    //         }
    //     });
    // }, observerOptions);
    
    // const cards = document.querySelectorAll('.dashboard-card, .dashboard-stat-card');
    // cards.forEach(card => {
    //     card.style.opacity = '0';
    //     card.style.transform = 'translateY(20px)';
    //     card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    //     observer.observe(card);
    // });
    
});

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Format numbers with commas
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Format date
function formatDate(date) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(date).toLocaleDateString('en-US', options);
}

// Show toast notification
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `dashboard-toast dashboard-toast-${type}`;
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        padding: 16px 24px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        animation: slideIn 0.3s ease;
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Confirm dialog
function confirmAction(message, callback) {
    if (confirm(message)) {
        callback();
    }
}


// =============================

const bellBtn = document.getElementById("notificationBtn");
const dropdown = document.getElementById("notificationDropdown");

bellBtn.addEventListener("click", function (e) {

    e.stopPropagation();

    dropdown.classList.toggle("active");
    bellBtn.classList.toggle("active"); 

});

document.addEventListener("click", function (e) {

    if (!dropdown.contains(e.target) && !bellBtn.contains(e.target)) {

        dropdown.classList.remove("active");
        bellBtn.classList.remove("active"); 

    }

});


const filterBtns = document.querySelectorAll("[data-filter]");
const notifList = document.getElementById("notifList");

filterBtns.forEach(btn => {

    btn.addEventListener("click", function(){

        document.querySelector(".notif-filters .active")?.classList.remove("active");
        this.classList.add("active");

        const filter = this.dataset.filter;
        const notifItems = notifList.querySelectorAll(".notif-item");

        notifItems.forEach(item => {

            if(filter === "all"){
                item.style.display = "flex";
            }

            else if(filter === "unread"){
                item.style.display = item.classList.contains("unread") ? "flex" : "none";
            }

            else if(filter === "read"){
                item.style.display = !item.classList.contains("unread") ? "flex" : "none";
            }

        });

        updateLastVisible();

    });

});

// document.getElementById("loadMore").addEventListener("click", () => {

//     const list = document.getElementById("notifList");

//     const newNotif = document.createElement("div");
//     newNotif.classList.add("notif-item","unread");

//     newNotif.innerHTML = `
//         <p>New notification loaded dynamically in Future (on developement phose)</p>
//     `;

//     list.appendChild(newNotif);

// });

function updateLastVisible(){

    const items = document.querySelectorAll(".notif-item");

    items.forEach(item => item.classList.remove("last-visible"));

    const visibleItems = [...items].filter(item => item.style.display !== "none");

    if(visibleItems.length){
        visibleItems[visibleItems.length - 1].classList.add("last-visible");
    }

}



function updateNotifCount(){

const unread = document.querySelectorAll(".notif-item.unread").length;
document.getElementById("notifCount").innerText = unread;

}

updateNotifCount();

// ==================


document.addEventListener("DOMContentLoaded", function () {

    const manageBoxes = document.querySelectorAll(".events-manage");

    manageBoxes.forEach(function(box){

        const btn = box.querySelector(".manage-btn");

        btn.addEventListener("click", function(e){
            e.stopPropagation();

            /* close others */
            document.querySelectorAll(".events-manage").forEach(function(item){
                if(item !== box){
                    item.classList.remove("active");
                }
            });

            /* toggle current */
            box.classList.toggle("active");

        });

    });

    /* close when clicking outside */
    document.addEventListener("click", function(){
        document.querySelectorAll(".events-manage").forEach(function(box){
            box.classList.remove("active");
        });
    });

});



