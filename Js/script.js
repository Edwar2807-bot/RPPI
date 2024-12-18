document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const menuItems = document.querySelectorAll('.menu-item > a');

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
        content.classList.toggle('margin-adjust');
    });

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            const parent = item.parentElement;
            parent.classList.toggle('active');
        });
    });
});
