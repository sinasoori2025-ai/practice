document.addEventListener("DOMContentLoaded", () => {


    const form = document.getElementById("form");
    
    if (form) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();

            const name = document.getElementById("name").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const email = document.getElementById("email").value.trim();

            if (!name || !phone || !email) {
                alert("Please fill in all fields!");
                return;
            }

            const btn = document.querySelector("button[type='submit']");
            btn.textContent = "Signing in...";
            btn.disabled = true;

            localStorage.setItem("studentName", name);

            setTimeout(() => {
                window.location.href = "index.html";
            }, 1000);
        });
    }

    const logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
        logoutBtn.addEventListener("click", (e) => {
            e.preventDefault();
            if (confirm("Do you want to logout?")) {
                localStorage.clear();
                window.location.href = "login.html";
            }
        });
    }
});
