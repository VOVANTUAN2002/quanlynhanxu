<?php
session_start();
$json_users = file_get_contents('uuser.json');
if ($json_users) {
  $users = json_decode($json_users);
} else {
  $users = [];
}
$errors = [];
$errors = [];
$alert = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $can_do = false;
  if (count($errors) === 0) {
    foreach ($users as $user) {
      if ($user->email == $email || $user->password == $password) {
        $_SESSION['user'] = $user;
        $can_do = true;
        header("Location: user.php");
      } else {
        header("Location: trangtrolai.php");
      }
    }
  }
}
?>
<div class="container">
  <div class="row">
    <div class="col-1g-12">
      <h3 class="text-center">login</h3>
      <?php if ($alert) : ?>
        <div class="alert alert-danger" role="alert">
          <?= "Please enter the correct password for the account you registered !" . $alert; ?>
        </div>
      <?php endif; ?>
      <form action="" method="POST">
        <div class="form-group">
          <label>Email</label>
          <input type="emali" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

          <small class="form-text text-gender"></small>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <small class="form-text text-gender"></small>
        </div>
        <button type="submit" class="btn btn-info">login</button>
      </form>

      <body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      </body>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      </head>
      <style>
        form {
          width: 100%;
          border: 2px solid rgb(153, 168, 153);
          padding: 20px;
          margin: 0 auto;
          font-weight: 100%;
        }
        form label {
          width: 50px;
          padding: 13px;
        }
        body {
          background: rgb(213, 555, 999);
          height: 100%;
          width: 100%;
        }
      </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">