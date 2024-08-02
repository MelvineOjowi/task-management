function validateLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var validEmail = "ojowimelvine@gmail.com";
    var validPassword = "Awino45gi!";

    // Dummy validation for demonstration purposes
    if (email === validEmail && password === validPassword) {

        alert("Login successful!");
        window.location.href = "task management.html"; // Navigate to homepage
        return false; // Prevent form submission
    } else {
        alert("Invalid email or password!");
        return false; // Prevent form submission
    }
}
