<?php
session_start();

unset($_SESSION['username']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
    <script>
        // JavaScript function to redirect based on screen width
        function redirectToLogin() {
            var isMobile = window.innerWidth <= 768; // Adjust the breakpoint as needed

            if (isMobile) {
                window.location.href = "../signin.html";
            } else {
                window.location.href = "../";
            }
        }

        // Call the redirect function when the page loads
        redirectToLogin();
    </script>
</body>
</html>
