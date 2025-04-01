<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Example response
    echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully']);
} else {
    // Send a 405 response if the method is not POST
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>
const formElement = document.querySelector('form'); // Replace with your form selector

fetch('http://127.0.0.1:8005/static/php/contact.php', {
    method: 'POST',
    body: new FormData(formElement), // Automatically sends form data
})
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => console.log(data)) // Handle success
    .catch(error => console.error('Error:', error)); // Handle errors
fetch('http://127.0.0.1:8005/static/php/contact.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        name: 'John Doe',
        email: 'john@example.com',
        message: 'Hello!',
    }),
})
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
$data = json_decode(file_get_contents('php://input'), true);
