<?php
$pildid = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless1.jpg", "nameless5.jpg", "nameless6.jpg");
$teade = "";
if(empty($_POST)){
    $teade = "Valikut ei ole tehtud. Palun tee oma valik";
} else {
    $teade = "Sellist pilti ei eksisteeri";
    foreach ($pildid as $pilt){
    if ($pilt === $_POST["pilt"]){
        $teade = "Aitäh hääletamise eest!";
    }
}
}

?>

<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p><?php echo $teade; ?></p>

</div>