document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.options-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            const dropdown = this.nextElementSibling;
            dropdown.classList.toggle('show');

        });
    });

});