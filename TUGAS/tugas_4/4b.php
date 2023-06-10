<?php
$PKL = ["Motherboard","Processor","Hard Disk", "PC Coller", "VGA Card", "SSD"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4b</title>
</head>
<body>

    <h3>Macam-Macam perangkat keras komputer</h3>
    <ol>
        <?php foreach ($PKL as $PKB)  : ?>
            <li>
                <?= "$PKB"; ?>
            </li>
        <?php endforeach ?>
    </ol>
    
    <?php
    
    $PKL[] = "Card Reader";
    $PKL[] = "Modem";
    sort($PKL)
    ?>

    <h3>Macam-Macam perangkat keras komputer baru</h3>
    <ol>
        <?php foreach ($PKL as $PKB)  : ?>
            <li>
                <?= "$PKB"; ?>
            </li>
        <?php endforeach ?>
    </ol>

</body>
</html>