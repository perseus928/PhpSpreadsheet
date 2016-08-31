<?php

/** PhpSpreadsheet */
require __DIR__ . '/Header.php';

$spreadsheet = new \PhpSpreadsheet\Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();
$worksheet->fromArray(
    [
            ['', 2010, 2011, 2012],
            ['Q1', 12, 15, 21],
            ['Q2', 56, 73, 86],
            ['Q3', 52, 61, 69],
            ['Q4', 30, 32, 0],
        ]
);

//	Set the Labels for each data series we want to plot
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$dataSeriesLabels1 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('String', 'Worksheet!$C$1', null, 1), //	2011
];
//	Set the X-Axis Labels
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$xAxisTickValues1 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('String', 'Worksheet!$A$2:$A$5', null, 4), //	Q1 to Q4
];
//	Set the Data values for each data series we want to plot
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$dataSeriesValues1 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('Number', 'Worksheet!$C$2:$C$5', null, 4),
];

//	Build the dataseries
$series1 = new \PhpSpreadsheet\Chart\DataSeries(
    \PhpSpreadsheet\Chart\DataSeries::TYPE_PIECHART, // plotType
    null, // plotGrouping (Pie charts don't have any grouping)
    range(0, count($dataSeriesValues1) - 1), // plotOrder
    $dataSeriesLabels1, // plotLabel
    $xAxisTickValues1, // plotCategory
    $dataSeriesValues1          // plotValues
);

//	Set up a layout object for the Pie chart
$layout1 = new \PhpSpreadsheet\Chart\Layout();
$layout1->setShowVal(true);
$layout1->setShowPercent(true);

//	Set the series in the plot area
$plotArea1 = new \PhpSpreadsheet\Chart\PlotArea($layout1, [$series1]);
//	Set the chart legend
$legend1 = new \PhpSpreadsheet\Chart\Legend(\PhpSpreadsheet\Chart\Legend::POSITION_RIGHT, null, false);

$title1 = new \PhpSpreadsheet\Chart\Title('Test Pie Chart');

//	Create the chart
$chart1 = new \PhpSpreadsheet\Chart(
    'chart1', // name
    $title1, // title
    $legend1, // legend
    $plotArea1, // plotArea
    true, // plotVisibleOnly
    0, // displayBlanksAs
    null, // xAxisLabel
    null   // yAxisLabel		- Pie charts don't have a Y-Axis
);

//	Set the position where the chart should appear in the worksheet
$chart1->setTopLeftPosition('A7');
$chart1->setBottomRightPosition('H20');

//	Add the chart to the worksheet
$worksheet->addChart($chart1);

//	Set the Labels for each data series we want to plot
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$dataSeriesLabels2 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('String', 'Worksheet!$C$1', null, 1), //	2011
];
//	Set the X-Axis Labels
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$xAxisTickValues2 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('String', 'Worksheet!$A$2:$A$5', null, 4), //	Q1 to Q4
];
//	Set the Data values for each data series we want to plot
//		Datatype
//		Cell reference for data
//		Format Code
//		Number of datapoints in series
//		Data values
//		Data Marker
$dataSeriesValues2 = [
    new \PhpSpreadsheet\Chart\DataSeriesValues('Number', 'Worksheet!$C$2:$C$5', null, 4),
];

//	Build the dataseries
$series2 = new \PhpSpreadsheet\Chart\DataSeries(
    \PhpSpreadsheet\Chart\DataSeries::TYPE_DONUTCHART, // plotType
    null, // plotGrouping (Donut charts don't have any grouping)
    range(0, count($dataSeriesValues2) - 1), // plotOrder
    $dataSeriesLabels2, // plotLabel
    $xAxisTickValues2, // plotCategory
    $dataSeriesValues2        // plotValues
);

//	Set up a layout object for the Pie chart
$layout2 = new \PhpSpreadsheet\Chart\Layout();
$layout2->setShowVal(true);
$layout2->setShowCatName(true);

//	Set the series in the plot area
$plotArea2 = new \PhpSpreadsheet\Chart\PlotArea($layout2, [$series2]);

$title2 = new \PhpSpreadsheet\Chart\Title('Test Donut Chart');

//	Create the chart
$chart2 = new \PhpSpreadsheet\Chart(
    'chart2', // name
    $title2, // title
    null, // legend
    $plotArea2, // plotArea
    true, // plotVisibleOnly
    0, // displayBlanksAs
    null, // xAxisLabel
    null   // yAxisLabel		- Like Pie charts, Donut charts don't have a Y-Axis
);

//	Set the position where the chart should appear in the worksheet
$chart2->setTopLeftPosition('I7');
$chart2->setBottomRightPosition('P20');

//	Add the chart to the worksheet
$worksheet->addChart($chart2);

// Save Excel 2007 file
$filename = $helper->getFilename(__FILE__);
$writer = \PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
$writer->setIncludeCharts(true);
$callStartTime = microtime(true);
$writer->save($filename);
$helper->logWrite($writer, $filename, $callStartTime);
