<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Database3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle adding a new record
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guest_id"])) {
    $idD = $_POST["guest_id"];
    $nameD = $_POST["guest_name"];
    $emailD = $_POST["guest_email"];
    $commentsD = $_POST["guest_comments"];

    if (!empty($idD) && !empty($nameD) && !empty($emailD) && !empty($commentsD)) {
        $sql = "INSERT INTO guestbook (id, name, email, comments) VALUES ('$idD', '$nameD', '$emailD', '$commentsD')";
        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

// Handle delete request
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM guestbook WHERE id = '$delete_id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Handle update request
if (isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_email = $_POST['edit_email'];
    $edit_comment = $_POST['edit_comment'];

    $update_sql = "UPDATE guestbook SET name='$edit_name', email='$edit_email', comments='$edit_comment' WHERE id='$edit_id'";
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Display data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['view'])) {
    $sql = "SELECT * FROM guestbook";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table table-hover table-bordered mt-3'>
                <thead class='table-dark'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["comments"]) . "</td>
                    <td>
                        <form method='POST' class='d-inline'>
                            <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["id"]) . "'>
                            <button type='submit' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Delete</button>
                        </form>
                        <button class='btn btn-warning btn-sm' onclick='editRecord(" . json_encode($row) . ")'><i class='bi bi-pencil'></i> Edit</button>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No records found!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook Management</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
    <style>
        body { padding: 20px; }
    </style>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <h1 class="text-center">Guestbook Management</h1>
        <div class="mt-4">
        <form method="POST">
    <button type="submit" name="view" class="btn btn-primary"><i class="bi bi-eye"></i> View Records</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href='index.php';"><i class="bi bi-plus-circle"></i> Add Records</button>
</form>

        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="add.php">
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="edit_comment" id="edit_comment" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-success">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editRecord(record) {
            document.getElementById('edit_id').value = record.id;
            document.getElementById('edit_name').value = record.name;
            document.getElementById('edit_email').value = record.email;
            document.getElementById('edit_comment').value = record.comments;
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }
    </script>
</body>
</html>
