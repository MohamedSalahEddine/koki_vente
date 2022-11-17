<?php
    include('functions.php');
    include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>Document</title>
</head>
<body>
    <?php include_once('header.php');?>
    <main>
        <div class="div_main_left">
            <?php
                getPosts($connection);
            ?>
        </div>
        <div class="div_main_right">
            <form action="#" method="POST">
                <input type="text" >
            </form>
        </div>
    </main>
    <?php include_once('footer.php');?>
</body>
</html>