<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Processing Login...</title>
</head>
<body>

<script>
// Hardcoded users
const users = [
    {
        email: "customer@test.com",
        password: "customer123",
        role: "customer"
    },
    {
        email: "staff@test.com",
        password: "staff123",
        role: "staff"
    }
];

// Get form data from URL
const params = new URLSearchParams(window.location.search);
const email = params.get('email');
const password = params.get('password');

let authenticated = false;

// Check credentials
users.forEach(user => {
    if (user.email === email && user.password === password) {
        authenticated = true;

        // Redirect based on role
        if (user.role === "customer") {
            window.location.href = "customer.html";
        } else if (user.role === "staff") {
            window.location.href = "adminpage.html";
        }
    }
});

// If login failed
if (!authenticated) {
    alert("Invalid email or password");
    window.location.href = "login2.html";
}
</script>

</body>
</html>
