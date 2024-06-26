<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
require_once 'db.php';
?>

<?php include 'header.php'; ?>
<div class="jumbotron">
    <h1 class="display-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p class="lead">Simple web application using PHP and MySQL.</p>
    <hr class="my-4">
    <p>Can view, search, add, edit, delete, print data.</p>
</div>
<?php include 'footer.php'; ?>
