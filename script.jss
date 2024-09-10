function validateLoginForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "" || password === "") {
        alert("Please fill out all fields");
        return false;
    }

    // Add more complex validation logic as needed
    return true;
}
