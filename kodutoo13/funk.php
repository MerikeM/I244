<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
    global $connection;
    if (isset($_SESSION['user'])){
        header("Location: loomaaed.php?page=loomad");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (empty($_POST['user'])){
            $errors[] = "Palun sisestage kasutajanimi";
        } else if (empty($_POST['pass'])){
            $errors[] = "Palun sisestage parool";
        } else {
            $user = mysqli_real_escape_string($connection, $_POST['user']);
            $pass = mysqli_real_escape_string($connection, $_POST['pass']);
            $sql = "SELECT * FROM 10163102_kylastajad WHERE username = '$user' AND passw = SHA1('$pass')";
            $result = mysqli_query($connection, $sql) or die("$sql - ".mysqli_error($connection));
            if (mysqli_num_rows($result)>0){
                $_SESSION['user'] = $user;
                header("Location: loomaaed.php?page=loomad");
            } else {
                $errors[] = "Vale kasutajanimi või parool";
            }
        }
    }
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
    if (!isset($_SESSION['user'])){
        header("Location: loomaaed.php?page=login");
    }
    global $connection;
    $sql = "SELECT DISTINCT (puur) FROM `10163102_loomaaed`";
    $result = mysqli_query($connection, $sql) or die("$sql - ".mysqli_error($connection));
    $puurid = array();
    while ($puur = mysqli_fetch_assoc($result)){
        $puurid[$puur["puur"]] = array();
        $sql = "SELECT * FROM `10163102_loomaaed` WHERE puur=".$puur["puur"];
        $res = mysqli_query($connection, $sql) or die("$sql - ".mysqli_error($connection));
        while ($loom = mysqli_fetch_assoc($res)){
            $puurid[$puur["puur"]][]=$loom;
        }
    }

	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
    global $connection;
	if (empty($_SESSION['user'])){
        header("Location: loomaaed.php?page=login");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (empty($_POST['nimi'])){
            $errors[]= "Sisestage nimi";
        } else if (empty($_POST['puur'])){
            $errors[]= "Sisestage puur";
        } else if (upload("liik") === ""){
            $errors[] = "Sisestage pilt";
        } else {
            $nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
            $puur = mysqli_real_escape_string($connection, $_POST['puur']);
            $liik = mysqli_real_escape_string($connection, upload("liik"));
            $sql = "INSERT INTO 10163102_loomaaed (nimi, puur, liik) VALUES ('$nimi', '$puur', '$liik')";
            mysqli_query($connection, $sql);
            if (mysqli_insert_id($connection) > 0){
                header("Location: loomaaed.php?page=loomad");
            }
        }
    }
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
    $tmp = explode(".", $_FILES[$name]["name"]);
	$extension = end($tmp);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>