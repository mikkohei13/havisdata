<?php
$filename = "data/tiira-simple.csv";


//$dataString = file_get_contents($filename);


$handle = fopen($filename, "r") or die("Couldn't get handle");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        parseBuffer($buffer);
    }
    fclose($handle);
}


function parseBuffer($row)
{
	$filterSpecies = "Emberiza rustica";
	$filterMuni = "Sipoo";

//	print_r ($row);
//	exit(); // debug

//	$dataRows = explode("\n", $dataString);

	$cells = explode("\t", $row);

	// species
	if ($cells[9] != $filterSpecies)
	{
//		echo "skipped A:" . $cells[9] . "/<br />\n";
		return;
	}

	// muni
	if ($cells[14] != $filterMuni)
	{
//		echo "skipped B:" . $cells[14] . "/<br />\n";
		return;
	}

	echo $row;
	echo "<br />\n";



}

