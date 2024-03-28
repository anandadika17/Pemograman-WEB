<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Static Variabel</title>
</head>
<body>
    <h1>Variabel Static</h1>
    <?php
    function dicoba()
    {
        static $a = 0; // menggunakan static
        echo "Nilai a: ";
        echo $a;
        echo "<br>";
        $a++;
    }

    dicoba();
    dicoba();
    dicoba();
    dicoba();
    ?>
</body>
</html>