<?php
    function peegelpilt1($tekst){
        $vastus = "";
        for($i=strlen($tekst)-1; $i>=0; $i=$i-1){
            $vastus = $vastus . $tekst[$i];
        }
        echo $vastus;
    }

    function peegelpilt2($tekst){
        $vastus = "";
        for($i=strlen($tekst)-1; $i>=0; $i=$i-1){
            $vastus = $vastus . substr($tekst, $i, 1);
        }
        echo $vastus;
    }

    function peegelpilt3($tekst){
        $vastus = "";
        while (strlen($tekst)>0){
            $vastus = $vastus . substr($tekst, -1);
            $tekst = substr($tekst, 0, strlen($tekst)-1);
        }
        echo $vastus;
    }

    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
       <title>7. kodutöö - 1. ülesanne</title>
    </head>
    <body>
        <?php echo peegelpilt1("esimene variant"); ?> <br>
        <?php echo peegelpilt2("teine variant"); ?> <br>
        <?php echo peegelpilt3("kolmas variant"); ?> <br>
    </body>
</html>