<?php
class User
{
    public $id;
    public $Username;
    public $email;
    public $password;
    
public function __construct($Username,$email,$password)
{
    $this->Username = $Username;
    $this->email = $email;
    $this->password = $password;
    
}

}
$errors = [];
$show_alert = (isset($_REQUEST['show_alert'])) ? $_REQUEST['show_alert'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Username   = $_REQUEST['Username'];
    $email      = $_REQUEST['email'];
    $password   = $_REQUEST['password'];

    if ($Username == "") {
        $errors['username'] = "Username is required field !";
    }
    if ($email    == "") {
        $errors['email'] = "Email is required field !";
    }
    if ($password == "") {
        $errors['password'] = "Password is required field !";
    }
    if (count($errors) == 0) {

        $objUser = new User($Username,$email,$password);
        $objUser->Username     = $Username;
        $objUser->email        = $email;
        $objUser->password     = $password;
        $objUser->id     = time();
    

        $fileJson = "uuser.json"; 
        $user = $_REQUEST; 
        $users = file_get_contents($fileJson);
        if ($users == " ") {
            $users = [];
        } else {
            $users = json_decode($users, true);
        }

        $users[] = $objUser;
        $data = json_encode($users);
        file_put_contents($fileJson, $data); 
        header("Location: register.php?show_alert=1");
    }
}
?>

<class="container">
    <h3 class="text-center">Register</h3>
    <?php if ($show_alert) : ?>
        <div class="alert alert-success" role="alert">
            Đăng ký thành công, vui lòng nhấn vào <a href="login.php">đây</a>
            để tới trang đăng nhập
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12" style="display:flex"></div>
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="POST">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="Username" aria-describedby="emailHelp" placeholder="Username"><br>
                    <small class="form-text text-danger">
                        <?= (isset($errors['username'])) ? $errors['username'] : " " ; ?>
                    </small>

                    <label for="exampleInputEmail1">Email</label>

                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email"><br>
                    <small class="form-text text-danger">
                        <?= (isset($errors['email'])) ? $errors['email'] : " "; ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password"><br>
                    <small class="form-text text-danger">
                        <?php echo (isset($errors['password'])) ? $errors['password'] : ""; ?>
                    </small>
                </div>

                <button type="submit" class="btn btn-info" name="submit">Register</button>
            </form>
        </div>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        background: rgb(221, 555, 999);
        height: 100%;
        width: 100%;
    }
</style>