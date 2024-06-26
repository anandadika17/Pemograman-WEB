<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "UPDATE items SET name = ?, description = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $name, $description, $id);
        if ($stmt->execute()) {
            header("location: list.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
} else {
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        $id = trim($_GET['id']);

        $sql = "SELECT * FROM items WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $description = $row['description'];
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
}
?>

<?php include 'header.php'; ?>
<h2 class="my-4">Edit Data</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
    </div>    
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required><?php echo $description; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning" value="Update">
    </div>
</form>
<?php include 'footer.php'; ?>
