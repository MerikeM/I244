<?php
$pildid = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless1.jpg", "nameless5.jpg", "nameless6.jpg");

?>

<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=tulemus" method="POST">
        <?php foreach ($pildid as $pilt): ?>
        <p>
			<label for=<?php echo "\"".$pilt."\""; ?>>
				<img src=<?php echo "\"pildid/".$pilt."\""; ?> alt=<?php echo "\"".$pilt."\"" ?> height="100" />
			</label>
			<input type="radio" value=<?php echo "\"".$pilt."\""; ?> id=<?php echo "\"".$pilt."\""; ?> name="pilt"/>
		</p>
        <?php endforeach; ?>
        
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>