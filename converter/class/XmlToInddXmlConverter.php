<?php
class XmlToInddXmlConverter
{
    ////-------------------------------------------------------------------------------------------------------------------
    //// スタティック：定数値


    ////-------------------------------------------------------------------------------------------------------------------
    //// コンストラクタ


    ////-------------------------------------------------------------------------------------------------------------------
    //// データ処理
    public function convert($argc, $argv)
    {
        $basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "..";
        $xmlDataFolder       = "\data\xml";
        $xslDataFile         = "\data\xsl\indd.xsl";
        $inddXmlOutputFolder = "\data\inddXml";
        if ($argc > 1) {
            $xmlDataFolder = $argv[1];
            if ($argc > 2) {
                $xslDataFile = $argv[2];
                if ($argc > 3) {
                    $inddXmlOutputFolder = $argv[3];
                }
            }
        }

        $xmlDataPath = $basePath . $xmlDataFolder;

        if (is_dir($xmlDataPath) === false) {
            echo "xml data folder does not exist. : {$xmlDataPath}",PHP_EOL;
            return false;
        }
        $handle = opendir($xmlDataPath);
        if ($handle === false) {
            echo "xml data folder does not opened. : {$xmlDataPath}",PHP_EOL;
            return false;
        }

        $xslDataFilePath = $basePath . $xslDataFile;
        if (file_exists($xslDataFilePath) === false) {
            echo "xsl file does not exist. : {$xmlDataPath}",PHP_EOL;
            return false;
        }

        $inddXmlOutputPath = $basePath . $inddXmlOutputFolder;
        if (file_exists($inddXmlOutputPath) === false) {
            mkdir($inddXmlOutputPath);
        }

        $result = false;

        // XMLフォルダのファイルの数だけ繰り返し
        $extList = array('.xml', '.XML');
        while (($fileName = readdir($handle)) !== false) {
            $filePath = $xmlDataPath . DIRECTORY_SEPARATOR . $fileName;
            if (is_file($filePath) === false) {
                continue;
            }
            if (preg_match('/(' . implode('|', $extList) . ')$/', $fileName) === 0) {
                continue;
            }

            echo "| fileName={$fileName}",PHP_EOL;

            // XMLファイルを読込
            $xmlDoc = new DOMDocument();
            $xmlDoc->loadXML($filePath);

            $xslt   = new XSLTProcessor();
            $xslDoc = new DOMDocument();
            $xslDoc->load($xslDataFilePath,LIBXML_NOCDATA);
            $xslt->importStylesheet($xslDoc);

            $inddXmlText = $xslt->transformToXML($xslDoc);

            $inddXmlOutputFilePath = $inddXmlOutputPath . DIRECTORY_SEPARATOR . basename($fileName, '.xml') . '-indd.xml';;
            if (file_put_contents($inddXmlOutputFilePath, $inddXmlText) === false) {
                echo "transformed xml file is not saved. : {$inddXmlOutputFilePath}",PHP_EOL;
                continue;
            }
            $result = true;
        }

        return $result;
    }

}
