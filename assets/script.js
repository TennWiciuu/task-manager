document.addEventListener("DOMContentLoaded", function () {

    let usernameValid = false;
    let passwordValid = false;

    const submitBtn = document.getElementById("register-btn");

    initDropdown();
    initUsernameCheck();
    initPasswordCheck();

    function initDropdown() {

        const buttons = document.querySelectorAll(".options-btn");

        buttons.forEach((btn) => {
            btn.addEventListener("click", function (e) {
                e.stopPropagation();

                // Preferuj dropdown jako następny element, ale jeśli HTML/czasy renderowania
                // zmienią strukturę, to próbuj też po relacji po wrapperze.
                let dropdown = this.nextElementSibling;
                if (!dropdown || !dropdown.classList.contains("dropdown")) {
                    const card = this.closest(".task-card");
                    if (card) {
                        dropdown = card.querySelector(":scope > .dropdown") || card.querySelector(".dropdown");
                    }
                }

                if (!dropdown) return;

                dropdown.classList.toggle("show");

                document.querySelectorAll(".dropdown").forEach((d) => {
                    if (d !== dropdown) {
                        d.classList.remove("show");
                    }
                });
            });
        });

        document.addEventListener("click", function () {
            document.querySelectorAll(".dropdown").forEach((d) => {
                d.classList.remove("show");
            });
        });
    }


    function initUsernameCheck() {

        const username = document.getElementById("username");
        const status = document.getElementById("username-status");

        if (!username || !status) return;

        let timeout;

        username.addEventListener("input", function () {

            clearTimeout(timeout);

            const value = username.value.trim();

            if (value.length === 0) {
                status.textContent = "";
                usernameValid = false;
                updateSubmitState();
                return;
            }

            if (value.length < 4 || value.length > 32) {
                status.textContent = "Nazwa musi mieć 4–32 znaki";
                status.style.color = "red";
                usernameValid = false;
                updateSubmitState();
                return;
            }

            timeout = setTimeout(() => {

                fetch("auth/register_handler.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "check_username=1&username=" + encodeURIComponent(value)
                })
                .then(res => res.text())
                .then(data => {

                    if (data === "taken") {
                        status.textContent = "Nazwa zajęta";
                        status.style.color = "red";
                        usernameValid = false;
                    } else {
                        status.textContent = "Nazwa dostępna";
                        status.style.color = "green";
                        usernameValid = true;
                    }

                    updateSubmitState();

                });

            }, 300);
        });
    }

    function initPasswordCheck() {

        const password = document.getElementById("password");
        const status = document.getElementById("password-status");

        if (!password || !status) return;

        password.addEventListener("input", function () {

            const value = password.value;

            let errors = [];

            if (value.length < 4 || value.length > 16) {
                errors.push("4–16 znaków");
            }

            if (!/^(?=(.*[A-Za-z]){2,})(?=(.*\d){2,}).+$/.test(value)) {
                errors.push("min. 2 litery i 2 cyfry");
            }

            if (errors.length > 0) {
                status.textContent = "Błąd " + errors.join(", ");
                status.style.color = "red";
                passwordValid = false;
            } else {
                status.textContent = "Hasło OK";
                status.style.color = "green";
                passwordValid = true;
            }

            updateSubmitState();
        });
    }

    function updateSubmitState() {

        if (!submitBtn) return;

        submitBtn.disabled = !(usernameValid && passwordValid);
    }

});