<?php

namespace PhpOffice\PhpSpreadsheetTests\Reader;

use PhpOffice\PhpSpreadsheet\Reader\BaseReader;

class XEEValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerInvalidXML
     * @expectedException \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function testInvalidXML($filename)
    {
        $reader = $this->getMockForAbstractClass(BaseReader::class);
        $expectedResult = 'FAILURE: Should throw an Exception rather than return a value';
        $result = $reader->securityScanFile($filename);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerInvalidXML()
    {
        $tests = [];
        foreach (glob(__DIR__ . '/../../data/Reader/XEE/XEETestInvalid*.xml') as $file) {
            $tests[] = [realpath($file)];
        }

        return $tests;
    }

    /**
     * @dataProvider providerValidXML
     */
    public function testValidXML($filename, $expectedResult)
    {
        $reader = $this->getMockForAbstractClass(BaseReader::class);
        $result = $reader->securityScanFile($filename);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerValidXML()
    {
        $tests = [];
        foreach (glob(__DIR__ . '/../../data/Reader/XEE/XEETestValid*.xml') as $file) {
            $tests[] = [realpath($file), file_get_contents($file)];
        }

        return $tests;
    }
}
