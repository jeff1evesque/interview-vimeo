<?php
/**
 *  validator.php: this file iterates over the supplied dataset (using SPL iterator),
 *                 returns a nested array of 'clip_ids' that passed the validation
 *                 criteria, and another nester array of 'clip_ids' that failed
 *                 validation.
 *
 *  The following are the validation criterias:
 *
 *      - The clip must be public (privacy == anybody)
 *      - The clip must have over 10 likes and over 200 plays
 *      - The clip title must be under 30 characters
 */

  class Validator {

  /**
   * constructor: define class properties from supplied dataset.
   */
    public function __construct($dataset) {
      $this->dataset            = $dataset;
      $this->validation_success = Array();
      $this->validation_failure = Array();
    }

  /**
   * validate: iterates the dataset, and implements the 'validate_xxx'
   *           functions.
   *
   * Note: we assume the dataset is well-formed at this stage. This
   *       means, we assume that each nested array within the 'Dataset'
   *       json array, has the same length.
   */
    public function validate() {
      for($i = 0; $i < count(json_decode($this->dataset)->id); $i++) {
      // implement validation
        $response_privacy     = $this->validate_privacy( json_decode($this->dataset)->privacy[$i] );
        $response_total_likes = $this->validate_total_likes( json_decode($this->dataset)->total_likes[$i] );
        $response_total_plays = $this->validate_total_plays( json_decode($this->dataset)->total_plays[$i] );
        $response_title       = $this->validate_title( json_decode($this->dataset)->title[$i] );

      // build return
        if ( $response_privacy && $response_total_likes && $response_total_plays && $response_title ) array_push( $this->validation_success, $i );
        else array_push( $this->validation_failure, $i );
      }

      // return result
      return array('success' => $this->validation_success, 'failure' => $this->validation_failure);
    }

  /**
   * validate_int: check if supplied string can be typecasted to 'int'.
   */
    private function validate_int($val) {
      try {
        return (int)$val;
      }
      catch (Exception $e) {
        return false;
      }
    }

  /**
   * validate_privacy: check if privacy is set to 'anybody'.
   */
    private function validate_privacy($str) {
      return $str == 'anybody';
    }

  /**
   * validate_total_likes: check if total likes exceeds 10.
   */
    private function validate_total_likes($val) {
      if (!$this->validate_int($val)) return false;
      else $val = $this->validate_int($val);
      return $val > 10;
    }

  /**
   * validate_total_plays: check if total plays exceeds 200.
   */
    private function validate_total_plays($val) {
      if (!$this->validate_int($val)) return false;
      else $val = $this->validate_int($val);
      return $val > 200;
    }

  /**
   * validate_title: check if title is under 30 characters.
   */
    private function validate_title($str) {
      return strlen($str) < 30;
    }

  }
?>

