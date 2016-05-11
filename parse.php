<?php
$filename = "data/tiira-simple.csv";

$filterSpecies = "Emberiza rustica";
$filterMuni = "Sipoo";

$dataString = file_get_contents($filename);

$dataRows = explode("\n", $dataString);

foreach ($dataRows as $key => $row)
{
	$cells = explode("\t", $row);

	// species
	if ($cells[9] != $filterSpecies)
	{
//		echo "skipped A:" . $cells[9] . "/<br />\n";
		continue;
	}

	// muni
	if ($cells[14] != $filterMuni)
	{
//		echo "skipped B:" . $cells[14] . "/<br />\n";
		continue;
	}

	echo $row;
	echo "<br />\n";
}

// print_r ($dataRows); // debug: print all
