<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Admin - Cafe</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      /* Styles omitted for brevity */
    </style>

    <link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
      <form id="loginForm">
        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Admin Cafe</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="ausername" placeholder="Username" autofocus required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="apassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
      </form>
    </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        const username = document.getElementById('ausername').value;
        const password = document.getElementById('apassword').value;

        // Dummy login validation for demonstration purposes
        // Replace this with an actual API call to check credentials
        const validCredentials = { username: "admin", password: "password123" };

        if (username === validCredentials.username && password === validCredentials.password) {
          // Simulate successful login (Redirect to album page)
          window.location.href = "../album/index.html"; // Redirect to album (replace with actual page)
        } else {
          alert("Username or Password is incorrect");
        }
      });
    </script>
  </body>
</html>
