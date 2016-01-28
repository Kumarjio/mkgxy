<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ebooks</title>
</head>

<body>
<?php
$path = "/";
if($_GET['path']) $path = urldecode($_GET['path']);
$base = "/up";
$dir = getcwd();
$dirname = getcwd().$path;echo $path; echo "<br>";echo "<hr>";echo "<br>";
if ($handle = opendir($dirname)) {
	$i=0;
	/* This is the correct way to loop over the directory. */
	while (false !== ($file = readdir($handle))) {
		$filetype = filetype($dirname."/".$file);
		$files[$i] = $file;
		$filetypes[$i] = $filetype;
		$i++;
	}
	closedir($handle);
}
if($files) {
	asort($files);
	foreach($files as $i=>$file) {
		$filetype = $filetypes[$i];
		if($filetype=="dir" && !($file == "." || $file == "..")) {
			echo "Type1: ".$filetype." - ".$file;
			echo "Type1: ".$filetype." - <a href='main.php?path=".urlencode($path.$file)."/'>".$file."</a>";
			echo "<br>";
		} else if($filetype == "file") {
			echo "Type2: ".$filetype." - <a href='".$base.$path.$file."'>".$file."</a>";
			echo "<br>";
		}		
	}
}
?> 
</body>
</html>