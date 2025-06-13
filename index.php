<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MyWebsite</title>
  <link href="https://db.onlinewebfonts.com/c/91bf51a8358ebe7c72e49ea84fd8db7f?family=Spotify+Mix+Extrabold" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Spotify Mix Extrabold', sans-serif;
      color:hsl(0, 0.00%, 70.20%);
      background-color: #191414;
      background-image: url('ye.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      min-height: 100vh;
    }
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(25, 20, 20, 0.7);
      z-index: -1;
    }

    .navbar {
      z-index: 10;
    }

    .navbar-brand {
      font-weight: bold;
    }

    .navbar-nav .nav-link {
      color: #fff;
    }

    .navbar-nav .nav-link:hover {
      color: #176e3a;
    }

    .container {
      margin-top: 50px;
      position: relative;
      z-index: 10;
    }

    .footer {
      color: white;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      width: 100%;
      bottom: 0;
      z-index: 10;
    }

    .card {
      background-color: #282828;
      border: none;
      border-radius: 10px;
    }

    .card-body {
      padding: 30px;
    }

    .form-label {
      color: #b3b3b3;
    }

    .form-control {
      background-color: #121212;
      color: #b3b3b3;
      border: 1px solid #15803d;
    }

    .form-control:focus {
      border-color: #15803d;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #15803d;
      border: none;
    }

    .btn-primary:hover {
      background-color: #176e3a;
    }
  </style>
</head>
<body>

<?php
  
  $raw = [
    "name" => "  alice Johnson     ",
    "email" => "ALICE.JOHNSON@Example.COM ",
    "quote" => "The early bird catches the worm.",
    "bio" => "php,developer,coffee,books,travel"
  ];

  function toProperCase($str) {
    return ucwords(strtolower(trim($str)));
  }

  function sanitizeHTML($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
  }

  function isValidEmail($email) {
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
  }

  $name = toProperCase($raw['name']);
  $email = strtolower(trim($raw['email']));
  $username = explode('@', $email)[0];
  $quote = sanitizeHTML($raw['quote']);
  $quoteChars = strlen($quote);
  $quoteWords = str_word_count($quote);
  $bioItems = array_map('trim', explode(',', $raw['bio']));
  $mentionsCoffee = in_array('coffee', array_map('strtolower', $bioItems));
  $emailValid = isValidEmail($email);
?>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">MyWebsite</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">What We Offer</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row mb-5">
      <div class="col text-center">
        <h1 class="text-white fw-bold">Welcome to MyWebsite</h1>
        <p class="lead text-light">Your personalized space to explore, connect, and enjoy.</p>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title text-center text-white mb-4">Log in to MyWebsite</h5>
            <form>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" />
              </div>
              <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
            <div class="text-center mt-3">
              <a href="#" class="text-white">Forgot your password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile Card Output -->
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title text-center text-white mb-4">User Profile</h5>
            <ul class="text-light">
              <li><strong>Name:</strong> <?= $name ?></li>
              <li><strong>Email:</strong> <?= $email ?></li>
              <li><strong>Username:</strong> <?= $username ?></li>
              <li><strong>Quote:</strong> <?= $quote ?></li>
              <li><strong>Quote Length:</strong> <?= $quoteChars ?> characters, <?= $quoteWords ?> words</li>
              <li><strong>Bio:</strong>
                <ul>
                  <?php foreach ($bioItems as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li><strong>Mentions "coffee" in bio:</strong> <?= $mentionsCoffee ? 'Yes' : 'No' ?></li>
              <li><strong>Email valid:</strong> <?= $emailValid ? 'Yes' : 'No' ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>

  <footer class="footer">
    <small>&copy; 2025 MyWebsite. All rights reserved.</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
