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
        $csvList = array();
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
            $csvItems = $this->_loadCSV($filePath);
            if ($csvItems) {
                $csvList[$fileName] = $csvItems;
            }
        }

        // データXMLを生成
        $result = $this->_exportXML($csvList, $xmlOutputPath);
        if($result === false) {
            echo "[ERROR] export XML error! \n\n";
        }

        return $result;
    }


    private function _getFieldSetting()
    {
        $fieldSettings = array (
            0  => 'code',
            5  => 'position',
            8  => 'department',
            9  => 'name',
            10 => 'item1',
            11 => 'item2',
            12 => 'item3',
            13 => 'item4',
        );

        return $fieldSettings;
    }

    private function _loadCSV($csvFilePath, $countHeaderLines=1)
    {
        $data = file_get_contents($csvFilePath);
        $data = mb_convert_encoding($data, 'UTF-8', 'SJIS-win');
        $temp = tmpfile();
        $meta = stream_get_meta_data($temp);
        fwrite($temp, $data);
        rewind($temp);

        $fieldSettings = $this->_getFieldSetting();

        $csvFile = new SplFileObject($meta['uri']);
        $csvFile->fwrite($data);
        $csvFile->rewind();
        $csvFile->setFlags(SplFileObject::READ_CSV);

        $countLines = 1;
        $csvItems   = array();
        foreach ($csvFile as $line) {
            if ($countLines <= $countHeaderLines) {
                // ヘッダー行を飛ばす
                $countLines++;
                continue;
            }

            if (is_null($line[0])) {
                continue;
            }
            $csvItems[] = $this->_createCsvItem($line, $fieldSettings);
        }

        return $csvItems;
    }

    private function _createCsvItem($fields, $fieldSettings)
    {
        if (empty($fields) || is_array($fields) === false) {
            return array();
        }
        if (empty($fieldSettings) || is_array($fieldSettings) === false) {
            return array();
        }

        $csvItem = array();
        foreach ($fieldSettings as $index => $name) {
            if (isset($fields[$index]) === false) {
                $csvItem[$name] = '';
                continue;
            }
            $csvItem[$name] = $fields[$index];
        }
        return $csvItem;
    }


    private function _exportXML($csvList, $xmlOutputPath)
    {
        return false;
    }

}
