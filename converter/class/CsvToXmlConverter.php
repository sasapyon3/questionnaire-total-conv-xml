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
        $csvDataFolder = "./data/csv";
        $xmlOutputPath = "./data/xml";
        if ($argc > 0) {
            $csvDataFolder = $argv[1];
            if ($argc > 1) {
                $xmlOutputPath = $argv[2];
            }
        }

        if (file_exists($csvDataFolder) === false) {
            echo "csv data folder does not exist.";
            return false;
        }
        if (file_exists($xmlOutputPath) === false) {
            mkdir($xmlOutputPath);
        }

        // CSVフォルダのファイルの数だけ繰り返し
        // CSVファイルを読込
        // データXMLを生成

        return false;
    }


}
