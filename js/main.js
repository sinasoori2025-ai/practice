document.addEventListener("DOMContentLoaded", () => {

    /* ==========================
       Login
    ========================== */

    const loginForm = document.getElementById("loginForm");

    if (loginForm) {

        loginForm.addEventListener("submit", function (e) {

            e.preventDefault();

            const name = document.getElementById("name").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const email = document.getElementById("email").value.trim();

            if (name === "" || phone === "" || email === "") {
                alert("Please fill in all fields.");
                return;
            }

            localStorage.setItem("studentName", name);
            localStorage.setItem("studentPhone", phone);
            localStorage.setItem("studentEmail", email);

            const btn = document.getElementById("submitBtn");

            btn.disabled = true;
            btn.textContent = "Signing In...";

            setTimeout(function () {

                window.location.href = "home.html";

            }, 1000);

        });

    }

    /* ==========================
       Logout
    ========================== */

    const logoutBtn = document.getElementById("logoutBtn");

    if (logoutBtn) {

        logoutBtn.addEventListener("click", function (e) {

            e.preventDefault();

            const answer = confirm("Do you want to logout?");

            if (answer) {

                localStorage.clear();

                window.location.href = "index.html";

            }

        });

    }

    /* ==========================
       Mobile Menu
    ========================== */

    const menuToggle = document.getElementById("menuToggle");
    const navLinks = document.getElementById("navLinks");

    if (menuToggle && navLinks) {

        menuToggle.addEventListener("click", function () {

            navLinks.classList.toggle("active");

            if (navLinks.classList.contains("active")) {

                menuToggle.innerHTML = "✕";

            } else {

                menuToggle.innerHTML = "☰";

            }

        });

    }

});
document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const navLinks = document.getElementById("navLinks");

    if (menuToggle && navLinks) {
        menuToggle.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    }
});