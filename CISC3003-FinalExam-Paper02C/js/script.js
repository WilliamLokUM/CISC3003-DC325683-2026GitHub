/**
 * Scenario C: Client-side logic for Registration and Dashboard
 */
document.addEventListener("DOMContentLoaded", function() {

    // ==========================================
    // 1. Registration Page Logic
    // ==========================================
    const form = document.getElementById("signup-form");
    const emailInput = document.getElementById("email");
    const emailStatus = document.getElementById("email-availability-status");

    if (form && emailInput) {
        emailInput.addEventListener("blur", function() {
            const email = emailInput.value.trim();
            
            if (email === "") {
                emailStatus.textContent = "";
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                emailStatus.textContent = "Please enter a valid email format.";
                emailStatus.style.color = "red";
                return;
            }

            fetch("check_email.php?email=" + encodeURIComponent(email))
                .then(response => response.json())
                .then(data => {
                    if (data.available === false) {
                        emailStatus.textContent = "This email is already taken.";
                        emailStatus.style.color = "red";
                    } else {
                        emailStatus.textContent = "Email is available!";
                        emailStatus.style.color = "green";
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        form.addEventListener("submit", function(event) {
            const password = document.getElementById("password").value;
            const passwordConfirmation = document.getElementById("password_confirmation").value;

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                event.preventDefault();
                return;
            }

            if (password !== passwordConfirmation) {
                alert("Passwords do not match!");
                event.preventDefault();
                return;
            }
        });
    }

    // ==========================================
    // 2. Dashboard Page Logic (DOT Balance)
    // ==========================================
    const addDotBtn = document.getElementById("add-dot-btn");
    const balanceDisplay = document.getElementById("dot-balance");
    const balanceMsg = document.getElementById("balance-message");

    if (addDotBtn) {
        addDotBtn.addEventListener("click", function() {
            addDotBtn.disabled = true;
            
            fetch("add_balance.php")
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        balanceDisplay.textContent = data.new_balance;
                        balanceMsg.textContent = data.message;
                        balanceMsg.style.color = "#28a745";
                    } else {
                        balanceMsg.textContent = "Error: " + data.message;
                        balanceMsg.style.color = "red";
                    }
                    addDotBtn.disabled = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    balanceMsg.textContent = "An error occurred. Please try again.";
                    balanceMsg.style.color = "red";
                    addDotBtn.disabled = false;
                });
        });
    }

});