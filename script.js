document.getElementById('login-button').addEventListener('click', (event) => {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if (username === "" || password === "") {
        alert("Username or password cannot be empty!");
        event.preventDefault();
    } else if (password.length < 6) {
        alert("Password must be at least 6 characters long!");
        event.preventDefault();
    }
});

document.getElementById('register-button').addEventListener('click', (event) => {
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (username === "" || email === "" || password === "" || confirmPassword === "") {
        alert("All fields are required!");
        event.preventDefault();
    } else if (!email.includes('@')) {
        alert("Please enter a valid email!");
        event.preventDefault();
    } else if (password.length < 6) {
        alert("Password must be at least 6 characters long!");
        event.preventDefault();
    } else if (password !== confirmPassword) {
        alert("Passwords do not match!");
        event.preventDefault();
    }
});

