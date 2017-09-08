<!DOCTYPE html>


<html>
<head>


	<?php

		/* SAUCE https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php#answer-834355 */
		function startsWith($haystack, $needle){
			$length = strlen($needle);
			return (substr($haystack, 0, $length) === $needle);
		}
		function endsWith($haystack, $needle){
			$length = strlen($needle);

			return $length === 0 || 
			(substr($haystack, -$length) === $needle);
		}
		/* ECUAS */

		if (isset($_POST["dir"])) {

			if (startsWith($_POST["dir"], "dir/")) {
				$dir = $_POST["dir"];
			} else {
				$dir = "dir";
			}

		} else {

			$dir = "dir";

		}

		$nad = explode('/', $dir);
		foreach ($nad as $key=>$pdir) {
			if ( endsWith($pdir, '.') ) {
				unset($nad[$key]);
				unset($nad[$key-1]);
			}
		}
		$dir = join('/', $nad);



		if ($dir == '' OR ! startsWith($dir, "dir/")) {
			$dir = "dir";
		}

		$files = scandir($dir);
		$dirs = array();
		$filz = array();

		foreach($files as $file) {

			if (is_dir("$dir/$file") AND $file != "." AND $file != "..") {
				$dirs[] = "<button name='dir' value='$dir/$file' type='submit' class='file dirz'>$file<span>DIRECTORY</span></button>";
			} elseif (is_file("$dir/$file") AND $file != "." AND $file != "..") {
				$fs = filesize("$dir/$file");
				if ($fs > 1048576) {
					$fsnice = round($fs / 1048576, 2) . " MB";
				} elseif ($fs > 1024) {
					$fsnice = round($fs / 1024, 2) . " KB";
				} else {
					$fsnice = "$fs B";
				}
				$filz[] = "<a href='$dir/$file' target='_blank' class='file filz'>$file<span class='size'>$fsnice</span><span>FILE</span></a>";
			}

		}


	?>

	<title>	ᴾᴴᴾ ᶠⁱˡᵉ ᴹᵃⁿᵃᵍᵉʳ </title>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>


	<div id="catsarecute">


		<form id="navPanel" action="index.php" method="post">

			<button name="dir" value="dir"  type="submit">  
				집
			</button>

			<?php
				if ($dir == "dir") {
					echo "<button name='dir' value='dir' type='submit'><</button>";
				} else {
					echo "<button name='dir' value='$dir/..' type='submit'><</button>";
				}
			?>

			<a href="https://capuno.es">
				X
			</a>

		</form>

		<form id="folder" action="index.php" method="post">
			<div id="path">

				<?php 
					$nad = explode('/', $dir);
					foreach ($nad as $fder) {
						echo "<div>$fder</div>";
					}
				?>

			</div>

			<div id="sbwrapper">

				<?php 
					foreach ($dirs as $dir) {
						echo $dir;
					}
					foreach ($filz as $file) {
						echo $file;
					}
				?>

			</div>

		</form>


	</div>


</body>
</html>