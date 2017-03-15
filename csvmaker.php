<?php

  class CSV {
    public $filename;
    public $data;

    //Checks whether the file exists of not.
    function doesFileExists($filename){
      return file_exists($filename);
    }

    //Create a blank file.
    function createFile($filename){
      if(!$this->doesFileExists($filename)){
            $this->filename = $filename;
            $file = fopen($this->filename, 'w');
            fclose($file);
      }
      else{
        // Uncomment the Exception if you don't want to overwrite existing files while writing to a file.
        // I hardly think that this will ever be needed.
        // throw new Exception("File name ".$filename." already exists.");
      }
    }

    //Read the created file
    function readFile($filename){
      if(!$this->doesFileExists($filename)){
        return array("File Does Not Exist");
      }
      $data = array();
      $data = file($filename, FILE_IGNORE_NEW_LINES);
      return $data;
    }

    //Write to file
    function writeToFile($filename, $data){
      try{
        $this->createFile($filename);
      }catch(Exception $e){
        //This will only work if the exception on line 22 is uncommented
        echo "Error Message : " .$e->getMessage();
        die();
      }
      $keys = array_keys($data);
      $values = array_values($data);
      if($file = fopen($filename, 'a+')){
        $firstLine = fgets($file);
        if(trim($firstLine) === (implode($keys, ','))){
          fputcsv($file,$values);
        }else{
          fputcsv($file,$keys);
          fputcsv($file,$values);
        }
      }
    }
  }
