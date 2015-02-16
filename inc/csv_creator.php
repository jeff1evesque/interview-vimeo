<?php
/**
 *  csv_creator.php: this file creates a csv file based on the provided input.
 */
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="sample.csv"');

  /**
   * csv_success: generates 'data/valid.csv', which contains a list of clip_ids
   *              corresponding to clips that did pass validation (validator.php).
   */
  function csv_success($data) {
    $fp = fopen('../data/valid.csv', 'w');

    if ($fp) {
      foreach ( $data as $line ) {
        $val = explode(",", $line);
        fputcsv($fp, $val);
      }
      fclose($fp);
    }
  }

  /**
   * csv_failure: generates 'data/invalid.csv', which contains a list of clip_ids
   *              corresponding to clips that did not pass validation (validator.php).
   */
  function csv_failure($data) {
    $fp = fopen('../data/invalid.csv', 'w');

    if ($fp) {
      foreach ( $data as $line ) {
        $val = explode(",", $line);
        fputcsv($fp, $val);
      }
      fclose($fp);
    }
  }
?>

