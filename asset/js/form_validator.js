/**
 * @form_validator.js: call 'validate()' method on defined form elements.
 *
 *     http://jqueryvalidation.org/documentation/
 *     http://jqueryvalidation.org/category/validator/
 *     http://jqueryvalidation.org/jQuery.validator.addMethod/
 *     http://stackoverflow.com/questions/10843399#answer-10843593
 */

/**
 * Custom Method: callback function(s) used from the 'Compound Class Rules',
 *                and the 'Validation' sections (see below).
 *
 * @value the value submitted on the given form element
 *
 * @element the element being validated
 *
 * @parameter additional parameters from the instantiating schema. For example,
 *     the 'validate' method (see below 'Validation:'), provides an array as a
 *     parameter to the added method 'equals':
 *
 *         `equals: ['training', 'analysis']`
 */
  jQuery.validator.addMethod(
    'checkMime',
    function( value, element, parameter ) {
      if ( $.inArray(element.files[0].type, parameter) >= 0 ) return true;
      else return false;
    },
    'Incorrect file format'
  );

/**
 * Compound Class Rules: validates form elements by respective classnames.
 *                       This validation may implement the 'Definition(s)',
 *                       defined from the '.addMethod' definition.
 *
 * Note: These rules cannot define custom messages. Instead, the custom messages
 *       must be defined as the last parameter to the 'addMethod' definition (see
 *       above 'checkMime').
 */
  jQuery.validator.addClassRules({
    svm_dataset_file: {
      checkMime: ['text/plain', 'text/csv'],
    },
  });

/**
 * Validation: validates form elements by the 'name attribute. This validation
 *             may implement the 'Definition(s)', defined from the 'addmethod'
 *             definition.
 */
  $(document).ready(function() {

    $('form').validate({
      rules: {
        svm_dataset: {
          required: true,
          checkMime: true
        },
      },
      messages: {
        svm_dataset: 'Not acceptable value',
      },
    });
  });
