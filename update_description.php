<?php
include 'dbconn.php';
header("Content-Type: application/json"); // Set response type to JSON
header("Access-Control-Allow-Origin: *"); // Allow CORS (Optional)

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit();
}

// Validate input
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo json_encode(["success" => false, "message" => "Error: ID is missing"]);
    exit();
}

$id = $_POST['id'];
$date = $_POST['date'];
$title = $_POST['title'];
$description = $_POST['description'];

// Prepare and execute update query
$sql = "UPDATE descriptiontable SET date = ?, desctitle = ?, description = ? WHERE ID = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
    exit();
}

$stmt->bind_param("sssi", $date, $title, $description, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Entry updated successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update entry: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
