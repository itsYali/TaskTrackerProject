document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date for task target date to today
    const dateInput = document.getElementById('target_date');
    if (dateInput) {
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);
    }
    
    // Confirm before marking task as complete
    const completeButtons = document.querySelectorAll('button[type="submit"]');
    completeButtons.forEach(button => {
        if (button.textContent.includes('Mark Complete')) {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to mark this task as complete?')) {
                    e.preventDefault();
                }
            });
        }
    });
});
