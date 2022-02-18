<?php

namespace App;

/**
 * Class FinderFile
 * @package App
 */
class FinderFile
{
    /**
     * Get the folder path of a file
     * @param $psPathFolder
     * @param $psFileName
     * @return bool
     */
    function findFolder($psPathFolder,$psFileName)
    {
        // ==== get list of all file paths ====
        $laFileList = [];
        $laFolderList = [$psPathFolder];
        // scan folder
        $laContents = scandir($psPathFolder);
        if ($laContents == false) { // ERROR
            return false;
        }
        while( count($laFolderList) > 0) {
            $lsPath =  array_shift($laFolderList);
            $laContents = array_diff(scandir($lsPath) , ['.', '..']);
            foreach($laContents as $item) {
                if (is_file($lsPath .'/'.$item)) {
                    $laFileList[] = $lsPath .'/'.$item;
                } else {
                    $laFolderList[] = $lsPath .'/'.$item;
                }
            }
        }
        // ==== check the file by name ====
        foreach ($laFileList as $file) {
            if (preg_match('/'.$psFileName.'/', $file)) {
                return $file;
            }
        }

    }// findFolder
}// FinderFile

$__sdkjdks = 'ff';
$finderFile = new FinderFile();
echo 'Folder path C:\Users\Brahim\Desktop <br> File : grzerzerzr.txt<br>';

$result =  $finderFile->findFolder('C:\Users\Brahim\Desktop','grzerzerzr.txt');

if (!$result){
    echo 'no such file';
} else {
    echo "you can find the in this path $result";
}












