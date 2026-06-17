document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll('.options-btn');

    buttons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();

            const dropdown = this.nextElementSibling;
            dropdown.classList.toggle('show');

            document.querySelectorAll('.dropdown').forEach(d => {
                if (d !== dropdown) {
                    d.classList.remove('show');
                }
            });
        });
    });

    document.addEventListener('click', function () {
        document.querySelectorAll('.dropdown').forEach(d => {
            d.classList.remove('show');
        });
    });

});