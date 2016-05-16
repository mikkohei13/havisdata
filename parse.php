<?php
$filename = "data/tiira-simple.csv";
$filename = "data/tiira-simple-30.csv";
$filename = "data/tiira-simple-awk10000.csv";

/*
index contents
9	species
14	municipality
16	lat
17	lon
23	day
24	month
25	year
33	society name

*/
//$dataString = file_get_contents($filename);

$gridData = Array();

// Source: http://stackoverflow.com/questions/6830191/reading-huge-file-line-by-line-in-php
$handle = fopen($filename, "r") or die("Couldn't get handle");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
//        parseBufferFiltered($buffer);
        parsePerGrid($buffer);
    }
    fclose($handle);
}

printPlotterFormat($gridData);

print_r ($gridData);
echo "END";

// Counts how many observations per grid
function parsePerGrid($row)
{
	global $gridData;
	$cells = explode("\t", $row);

	// Skip if lat or lon is zero
	if ($cells[16] == 0 || $cells[17] == 0)
	{
		return;
	}

	$gridId = $cells[16] . ":" . $cells[17];
	@$gridData[$gridId]++;
}

function printPlotterFormat($gridData)
{
	
}

// Shows only rows that pass the filters
function parseBufferFiltered($row)
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

