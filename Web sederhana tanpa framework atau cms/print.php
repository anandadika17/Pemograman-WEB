<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
require_once 'db.php';

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $id = trim($_GET['id']);

    $sql = "SELECT * FROM items WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "No records found.";
            exit();
        }
        $stmt->close();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <h2 class="my-4">Print Data</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: <?php echo $row['name']; ?></h5>
            <p class="card-text">Description: <?php echo $row['description']; ?></p>
            <button onclick="window.print()" class="btn btn-info">Print</button>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
