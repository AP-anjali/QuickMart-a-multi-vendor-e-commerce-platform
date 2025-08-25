<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB connection</title>
</head>
<body>
    <div>
        <?php
            if(DB::connection()->getpdo())
            {
                echo "Successfully connected to database and DB name is : ";
            }
        ?>
    </div>
</body>
</html>