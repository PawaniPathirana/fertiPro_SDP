<?php
include "dbConn.php";

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind the SQL statement to delete the record
    $stmt = $con->prepare('DELETE FROM fertilizer_data WHERE ID = ?');
    $stmt->bind_param('i', $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the view_data.php with a success message
        header('Location: view_data.php?success=deleted');
    } else {
        // Redirect back to the view_data.php with an error message
        header('Location: view_data.php?error=delete_failed');
    }

    $stmt->close();
}

$con->close();
?>
