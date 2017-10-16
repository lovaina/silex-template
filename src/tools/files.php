<?php

function rmDirRecursive($path){
    return !empty($path) && is_file($path) ?
        @unlink($path) :
        (array_reduce(glob($path.'/*'), function ($r, $i) { return $r && rmDirRecursive($i); }, TRUE)) && @rmdir($path);
}


function copyDirectory($src, $dest){


    // If source is not a directory stop processing
    if(!is_dir($src)) return false;

    // If the destination directory does not exist create it
    if(!is_dir($dest)) {
        if(!mkdir($dest)) {
            // If the destination directory could not be created stop processing
            return false;
        }
    }

    // Open the source directory to read in files
    $i = new DirectoryIterator($src);
    foreach($i as $f) {
        if($f->isFile()) {
            copy($f->getRealPath(), "$dest/" . $f->getFilename());
        } else if(!$f->isDot() && $f->isDir()) {
            copyDirectory($f->getRealPath(), "$dest/$f");
        }
    }

}


function moveFiles($src, $dest)
{

    // If source is not a directory stop processing
    if (!is_dir($src)) {
        return false;
    }

    // If the destination directory does not exist create it
    if (!is_dir($dest)) {
        if (!mkdir($dest)) {
            // If the destination directory could not be created stop processing
            return false;
        }
    }

    // Open the source directory to read in files
    $i = new DirectoryIterator($src);
    foreach ($i as $f) {
        if ($f->isFile()) {
            rename($f->getRealPath(), "$dest/" . $f->getFilename());
        } else {
            if (!$f->isDot() && $f->isDir()) {
                rmDirRecursive($f->getRealPath(), "$dest/$f");
                unlink($f->getRealPath());
            }
        }
    }
    unlink($src);
}

function moveFilesToFolders($path, $destination){

    if (!is_dir($path)) {
        return false;
    }

    // If the destination directory does not exist create it
    if (!is_dir($destination)) {
        if (!mkdir($destination)) {
            // If the destination directory could not be created stop processing
            return false;
        }
    }


}

function createIfNotExists($dirPath){
    if(!is_dir(($dirPath))){
        return mkdir($dirPath, 0777, true);
    }

    return true;
}

function copyFileToFolder($source, $destination){

    $path = pathinfo($destination,PATHINFO_DIRNAME);
    createIfNotExists($path);
    return copy($source, $destination);
}


