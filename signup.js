document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (localStorage.getItem(email)) {
        alert('User already exists');
    } else {
        const user = { name, email, password };
        localStorage.setItem(email, JSON.stringify(user));
        alert('Signup successful');
        window.location.href = 'login.html';
    }
});
