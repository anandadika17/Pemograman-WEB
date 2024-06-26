<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        header("location: index.php");
                    } else {
                        $login_err = "Invalid password.";
                    }
                }
            } else {
                $login_err = "No account found with that username.";
            }
            $stmt->close();
        }
    } elseif (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password != $confirm_password) {
            $register_err = "Passwords do not match.";
        } else {
            $sql = "SELECT id FROM users WHERE username = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $register_err = "This username is already taken.";
                } else {
                    $stmt->close();

                    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                    if ($stmt = $conn->prepare($sql)) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->bind_param("ss", $username, $hashed_password);

                        if ($stmt->execute()) {
                            header("location: login.php");
                        } else {
                            $register_err = "Something went wrong. Please try again later.";
                        }
                        $stmt->close();
                    }
                }
            }
        }
    }
}
?>

<?php include 'header.php'; ?>
<div class="centered-form">
    <div class="col-md-4">
        <?php 
        if(isset($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        } 
        if(isset($register_err)){
            echo '<div class="alert alert-danger">' . $register_err . '</div>';
        } 
        ?>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                    </div>
                </form>

                <h3 class="card-title text-center">Register</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
