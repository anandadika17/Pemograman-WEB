<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
require_once 'db.php';

// Proses pencarian
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM items WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $param = "%$search%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
}
?>

<?php include 'header.php'; ?>
<h2 class="my-4">Data List</h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by Name" aria-label="Search" name="search" value="<?php echo htmlspecialchars($search); ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                <a href="print.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Print</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php if ($result->num_rows == 0): ?>
        <tr>
            <td colspan="4" class="text-center">No records found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
