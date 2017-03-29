<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>3. ülesanne</title>

    </head>
    <body>
        <?php
        $inimesed = array (
            array("nimi" => "Tõnu", "vanus" => 32, "elukoht" => "Tallinn", "rahvus" => "eestlane", "amet" => "autojuht"),
            array("nimi" => "Tiiu", "vanus" => 80, "elukoht" => "Rakvere", "rahvus" => "eestlane", "amet" => "pensionär"),
            array("nimi" => "Aleksander", "vanus" => 29, "elukoht" => "Narva", "rahvus" => "venelane", "amet" => "juhataja"),
            array("nimi" => "Pekka", "vanus" => 50, "elukoht" => "Helsingi", "rahvus" => "soomlane", "amet" => "ehitaja")
        );

        foreach ($inimesed as $inimene){
            include 'ylesanne3.php';
        }

        ?>
    </body>
</html>