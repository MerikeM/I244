<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Muuda teksti stiili</title>
        <?php $tekst="Siin võiks olla sinu tekst";
        if (isset($_POST['tekst']) && $_POST['tekst']!=""){
            $tekst = htmlspecialchars($_POST['tekst']);
        }
        
        $taust="#f2f900";
        if (isset($_POST['taust']) && $_POST['taust']!="" && preg_match('/^#[a-f0-9]{6}$/i', $_POST['taust'])){
            $taust = $_POST['taust'];
        }
        
        $teksti_varv="#000000";
        if (isset($_POST['teksti_varv']) && $_POST['teksti_varv']!="" && preg_match('/^#[a-f0-9]{6}$/i', $_POST['teksti_varv'])){
            $teksti_varv = $_POST['teksti_varv'];
        }
        
        $suurus="20";
        if (isset($_POST['suurus']) && $_POST['suurus'] != "" && is_numeric($_POST['suurus'])){
            $suurus = $_POST['suurus'];
        }
        
        ?>
        <style>
            body {
                background-color: <?php echo $taust ?>;
            }
            p {
                color: <?php echo $teksti_varv ?>;
                font-size: <?php echo $suurus ?>px;
                <?php if (isset($_POST['bold']) && $_POST['bold']==="on"){
                    echo "font-weight: bold;";
                } 
                if (isset($_POST['italic']) && $_POST['italic']==="on"){
                    echo "font-style: italic;";
                }
                ?>
                
            }
        </style>
    </head>
    <body>
        <form action="?" method="post">
            Tekst: <input type="text" name="tekst" value="<?php echo $tekst; ?>"><br>
            Taustavärv: <input type="color" name="taust" value=<?php echo $taust ?>><br>
            Teksti värv: <input type="color" name="teksti_varv" value=<?php echo $teksti_varv ?>><br>
            Teksti suurus (px): <input type="number" name="suurus" value=<?php echo $suurus ?>><br>
            Bold: <input type="checkbox" name="bold" <?php
                if (isset($_POST['bold']) && $_POST['bold']==="on"){
                    echo "checked";
                }             
            ?>><br>
            Italic: <input type="checkbox" name="italic" <?php
                if (isset($_POST['italic']) && $_POST['italic']==="on"){
                    echo "checked";
                }
            ?>><br>
            <input type="submit">
        
        </form>
        
        <p><?php echo $tekst ?></p>
    </body>

</html>