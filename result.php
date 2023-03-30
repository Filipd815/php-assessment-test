<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rev Panda</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="wrap">
    <a href="./">Return to Homepage</a>

    <div class="wrap__result">
        <?php
        // Include the necessary files
        include 'includes/class-autoload.inc.php';

        // Get the button ID from the GET request
        $button_id = $_GET['button_id'];

        // Create a new instance of the Result class and show the result
        $result_obj = new Result($button_id);
        $result_obj->showResult();
        ?>
    </div>
</div>
</body>
</html>
