<?php
/* Class created by Francisco Presencia Fandos under GNU GPL 3+. Feel free to use and share. */
class Minimize
  {
  /* $folder is the folder that contains all the files to be compressed
  *  $filetype should be in this way: "css" or ".css"
  *  $file is the location of the resulting minimized file */
  public function folder ( $folder, $filetype = null, $file = null )
    {
    if (substr($folder, -1) != "/") $folder = $folder."/";
    $uncompressed = $this->retrieve( $folder, $filetype );
    
    $compressed = "/* You might want to use this http://cssbeautify.com/ or this http://jsbeautifier.org/ */ \n\n".$this->remove ($uncompressed);
    
    $this->save ( $compressed, $file );
    }
    
  private function retrieve ( $folderpath, $filetype )
    {
    if (substr($filetype, 0, 1) != "." && !empty($filetype)) $filetype = ".".$filetype;
    $uncompressed = "";
    foreach (glob($folderpath."*".$filetype) as $File)
      {
      $uncompressed .= file_get_contents($File);
      }
    return $uncompressed;
    }
    
  private function remove ( $fulltext )
    {
    // Remove comments
    $fulltext = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $fulltext);

    // Remove space after colons
    $fulltext = str_replace(': ', ':', $fulltext);

    // Remove whitespace
    $fulltext = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $fulltext);
      
    return $fulltext;
    }
  
  private function save ( $text, $file )
    {
    $ourFileHandle = fopen($file, 'w');
    fwrite($ourFileHandle, $text);
    fclose($ourFileHandle);
    }
  }
