<?php
set_exception_handler('handle_exception');                      // Set exception handler
function handle_exception($e)
{
    error_log($e);                                              // Log error
    http_response_code(500);                                    // Set response code
    require_once 'header.php';                                  // Ensure header included
    echo "<h1>Sorry, a problem occurred</h1>
          <p>The site's owners have been informed. Please try again later.</p>";
    require_once 'footer.php';                                  // Add footer
}

set_error_handler('handle_error');                              // Set error handler
function handle_error($type, $message, $file = '', $line = 0)
{
    throw new ErrorException($message, 0, $type, $file, $line); // Throw ErrorException
}

// NOTE: On p376, the text accidentally called the function above error_handler() not handle_error()


register_shutdown_function('handle_shutdown');                  // Set shutdown handler
function handle_shutdown()
{
    $error = error_get_last();                                  // Was error in script
    if ($error) {                                               // If so throw exception
        $e = new ErrorException($error['message'], 0, $error['type'],
                                $error['file'], $error['line']);
        handle_exception($e);                                   // Call exception handler
    }
}