<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Welcome View and Blade</h1>
    <hr>
    <h3>The value is: <?= $value ?> em PHP exemplo 1</h3>
    
    <h3>The value is: <?php echo $value ?> em PHP exemplo 2</h3>

    <h3>The value is: {{ $value }} em Blade</h3>

</body>
</html>