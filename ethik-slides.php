<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Präsentation</title>
<link rel="stylesheet" href="css/phpstart.css">
</head>

<body>
<ul>
<?php
// Ordnername 
$ordner = "keineph-slides/ethik-slides"; //auch komplette Pfade möglich ($ordner = "download/files";)

// Ordner auslesen und Array in Variable speichern
$alledateien = scandir($ordner); // Sortierung A-Z
// Sortierung Z-A mit scandir($ordner, 1)               				

// Schleife um Array "$alledateien" aus scandir Funktion auszugeben
// Einzeldateien werden dabei in der Variabel $datei abgelegt
foreach ($alledateien as $datei) {
	
	// Zusammentragen der Dateiinfo
	$dateiinfo = pathinfo($ordner."/".$datei); 
	//Folgende Variablen stehen nach pathinfo zur Verfügung
	// $dateiinfo['filename'] =Dateiname ohne Dateiendung  *erst mit PHP 5.2
	// $dateiinfo['dirname'] = Verzeichnisname
	// $dateiinfo['extension'] = Dateityp -/endung
	// $dateiinfo['basename'] = voller Dateiname mit Dateiendung
	
	// Größe ermitteln zur Ausgabe
	$size = ceil(filesize($ordner."/".$datei)/1024); 
	//1024 = kb | 1048576 = MB | 1073741824 = GB
	
	// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
	// Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
	// _notes ist eine Ergänzung für Dreamweaver Nutzer, denn DW legt zur besseren Synchronisation diese Datei in den Orndern ab
	if ($datei != "." && $datei != ".."  && $datei != "_notes") { 
	?>
    <li><a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>"><?php echo $dateiinfo['filename']; ?></a> (<?php echo $dateiinfo['extension']; ?><!--| <?php echo $size ; ?>kb-->)</li>
<?php
	};
 };
?>     
</ul>
</body>
</html>
