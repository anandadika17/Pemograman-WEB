<!DOCTYPE html>
<html>
<head>
    <title>Tabel Perkalian 12 kali 15</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$i = 15;
while ($i <= 45) {
    echo "12 x $i = " . 12 * $i . "<br>";
    $i += 2;
}
?>

</body>
</html>