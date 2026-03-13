/* add code here  */
document.addEventListener('DOMContentLoaded', function() {
    const hilightables = document.querySelectorAll('.hilightable');
    hilightables.forEach(function(el) {
        el.addEventListener('focus', function() {
            this.classList.add('highlight');
        });
        el.addEventListener('blur', function() {
            this.classList.remove('highlight');
        });
    });

    const requireds = document.querySelectorAll('.required');
    requireds.forEach(function(el) {
        el.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('error');
            }
        });
    });

    const form = document.getElementById('mainForm');
    form.addEventListener('submit', function(e) {
        const reqFields = document.querySelectorAll('.required');
        let hasEmpty = false;

        reqFields.forEach(function(el) {
            el.classList.remove('error');
        });

        reqFields.forEach(function(el) {
            if (el.value.trim() === '') {
                el.classList.add('error');
                hasEmpty = true;
            }
        });

        if (hasEmpty) {
            e.preventDefault();
        }
    });

    const resetBtn = document.querySelector('input[type="reset"]');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            const reqFields = document.querySelectorAll('.required');
            reqFields.forEach(function(el) {
                el.classList.remove('error');
            });
        });
    }
});