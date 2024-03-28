<!DOCTYPE html>
<html>
<head>
    <title>Materi Pemrograman PHP</title>
</head>
<body>
    <?php
    function showMenu() {
        echo "Materi Pemrograman PHP\n\n";
        echo "[1] Penggunaan if\n";
        echo "[2] Penggunaan switch case\n";
        echo "[3] Penggunaan looping\n";
        echo "[4] Penggunaan array\n";
        echo "\nPilih menu (1-4): ";
    }

    function usageIf() {
        echo "Contoh penggunaan if:\n";
        $age = 25;
        if ($age >= 18) {
            echo "Anda sudah dewasa.\n";
        } else {
            echo "Anda masih di bawah umur.\n";
        }
    }

    function usageSwitchCase() {
        echo "Contoh penggunaan switch case:\n";
        $day = date("D");
        switch ($day) {
            case "Mon":
                echo "Hari ini adalah Senin.\n";
                break;
            case "Tue":
                echo "Hari ini adalah Selasa.\n";
                break;
            default:
                echo "Hari ini adalah hari lain.\n";
        }
    }

    function usageLooping() {
        echo "Contoh penggunaan looping:\n";
        echo "Looping menggunakan while:\n";
        $i = 1;
        while ($i <= 5) {
            echo "Iterasi ke-$i\n";
            $i++;
        }
    }

    function usageArray() {
        echo "Contoh penggunaan array:\n";
        $colors = array("Merah", "Hijau", "Biru", "Kuning");
        echo "Warna favorit:\n";
        foreach ($colors as $color) {
            echo "- $color\n";
        }
    }

    // Main program
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["menu"])) {
        $menuChoice = $_POST["menu"];
        switch ($menuChoice) {
            case 1:
                usageIf();
                break;
            case 2:
                usageSwitchCase();
                break;
            case 3:
                usageLooping();
                break;
            case 4:
                usageArray();
                break;
            default:
                echo "Pilihan tidak valid.\n";
        }
    } else {
        showMenu();
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Pilihan: <input type="text" name="menu">
        <input type="submit">
    </form>
</body>
</html>
