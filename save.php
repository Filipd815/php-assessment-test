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
    <?php
    // Include the necessary files
    include 'includes/class-autoload.inc.php';

    // Get the values from the POST request
    $tableAVal = $_POST['table_a_input'];
    $tableBVal = $_POST['table_b_input'];
    $tableCVal = $_POST['table_c_input'];

    // Create a new instance of the saveData class and save the data
    $formObj = new saveData();
    $formObj->setData($tableAVal, $tableBVal, $tableCVal);
    ?>
</div>
</body>
</html>
