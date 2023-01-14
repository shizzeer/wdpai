<!DOCTYPE html>
<html>
    <head>
        <title>Not Authorized</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin-top: 3em;
                font-size: 2em;
            }
            h1 {
                color: #b30000;
            }
        </style>
    </head>
    <body>
        <h1>Not Authorized</h1>
        <p>You do not have permission to access this page.</p>
        <p>Please contact an administrator if you believe this is an error.</p>
        <?php http_response_code(401); ?>
    </body>
</html>

