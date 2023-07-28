<?php
require_once 'session.php';
// Set the content type to text/event-stream
header('Content-Type: text/event-stream');
// Set the cache to 0 to ensure that the response is not cached by the browser
header('Cache-Control: no-cache');
function sendDataClient($count) {
    // Send the notification count as JSON data
    echo "data: " . $count . "\n\n";
    // Close the SSE connection after sending the data
    die();
}


while (true) {
    $count = $client->fetchNotificationsFromDatabase($id);
    sendDataClient($count);
    ob_flush();
    flush();
   
    sleep(1); // Add a delay to control how often the SSE message is sent.
}
?>