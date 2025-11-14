document.addEventListener('DOMContentLoaded', function() {
    const categories = document.querySelectorAll('.category');

    categories.forEach(category => {
        category.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevents the dropdown from closing when clicking on category title
            this.classList.toggle('open'); // Toggles the 'open' class to show/hide post
        });
    });

    // Close dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown')) {
            categories.forEach(category => {
                category.classList.remove('open');
            });
        }
    });
});
