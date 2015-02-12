<?php
  /**
   *  csv_to_json: converts supplied csv to a json object.
   */

  function csv_to_json($file) {
    $result = array();
    if (($handle = fopen($file, "r")) !== FALSE) {
    // iterate row
      $column_headers = fgetcsv($handle);
      foreach($column_headers as $header) {
        $result[$header] = array();
      }

      while (($data = fgetcsv($handle)) !== FALSE) {
        $i = 0;
        foreach($result as &$column) {
          $column[] = $data[$i++];
        }
      }
      fclose($handle);
    }
    return json_encode($result);
  }
?>

