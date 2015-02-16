<?php
/**
 *  load_logic.php: loads necessary logic to create csv file(s) denoting the
 *                  'clip_ids' that passed validation (valid.csv), and those
 *                  failed validation (invalid.csv).
 *
 *  Note: the validation files will be saved into the 'data/' directory, and
 *        corresponding link(s) to each file will be appended to the DOM after
 *        form submission.
 */

// load required files
  require(dirname(__FILE__) . '/converter_json.php');
  require(dirname(__FILE__) . '/validator.php');
  require(dirname(__FILE__) . '/csv_creator.php');

// check file-upload
  if ($_FILES['svm_dataset']['tmp_name'][0]) {

  // local variables
    $file_upload = $_FILES['svm_dataset']['tmp_name'][0];
    $finfo       = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type   = finfo_file($finfo, $file_upload);

  // check mime type
    if (in_array($mime_type, array('application/csv', 'text/csv', 'text/plain'))) {

    // convert csv to json
      $converted_dataset = csv_to_json($file_upload);

    // validate dataset
      $validator         = new Validator( $converted_dataset );
      $validation_result = $validator->validate();

    // create csv file(s)
      csv_success( $validation_result['success'] );
      csv_failure( $validation_result['failure'] );

    // return result via AJAX
      print json_encode( $validation_result );

    }
    else print json_encode( array('error' => 'file upload is not a proper csv file'));
    finfo_close($finfo);

  }
  else print json_encode( array('error' => 'no file was uploaded'));

?>
