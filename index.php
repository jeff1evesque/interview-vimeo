<!DOCTYPE html>
<?php
/**
 *  index.php: provides a basic HTML form where users can upload a csv file.
 */
?>
<html>
  <head>
    <script src='asset/js/jquery-2.1.1.js'></script>
    <script src='asset/js/jquery-validate.js'></script>
    <script src='asset/js/form_validator.js'></script>
    <script src='asset/js/ajax_graphic.js'></script>
    <script src='asset/js/ajax_data.js'></script>

    <link rel='stylesheet' href='asset/css/style.css'>
  </head>
  <body>

    <form action='inc/load_logic.php' method='post'>
      <fieldset class='fieldset_session_type'>
        <p>Upload dataset</p>
        <input type="file" name="svm_dataset[]" class="svm_dataset_file">
        <input type="submit" value="Submit" class="submit">
      </fieldset>
    </form>

  </body>
</html>
