<?php

class FileCopier{

    function copyFiles($src, $dst) { 
  
        $dir = opendir($src); 
        @mkdir($dst); 
    
        while( $file = readdir($dir) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) 
                { 
                    $this->copyFiles($src . '/' . $file, $dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file, $dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir);
    } 

}

?>