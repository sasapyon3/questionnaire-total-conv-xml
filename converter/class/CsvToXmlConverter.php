<?php
class CsvToXmlConverter
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
        $csvDataFolder   = "\data\csv";
        $xmlOutputFolder = "\data\xml";
        if ($argc > 1) {
            $csvDataFolder = $argv[1];
            if ($argc > 2) {
                $xmlOutputFolder = $argv[2];
            }
        }

        $csvDataPath = $basePath . $csvDataFolder;

        if (is_dir($csvDataPath) === false) {
            echo "csv data folder does not exist. : {$csvDataPath}",PHP_EOL;
            return false;
        }
        $handle = opendir($csvDataPath);
        if ($handle === false) {
            echo "csv data folder does not opened. : {$csvDataPath}",PHP_EOL;
            return false;
        }

        $xmlOutputPath = $basePath . $xmlOutputFolder;
        if (file_exists($xmlOutputPath) === false) {
            mkdir($xmlOutputPath);
        }

        // CSVフォルダのファイルの数だけ繰り返し
        $extList = array('.csv', '.CSV');
        while (($fileName = readdir($handle)) !== false) {
            $filePath = $csvDataPath . DIRECTORY_SEPARATOR . $fileName;
            if (is_file($filePath) === false) {
                continue;
            }
            if (preg_match('/(' . implode('|', $extList) . ')$/', $fileName) === 0) {
                continue;
            }

            echo "| fileName={$fileName}",PHP_EOL;

            // CSVファイルを読込
            // データXMLを生成
        }

        return false;
    }


}
