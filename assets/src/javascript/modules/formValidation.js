/* eslint-disable class-methods-use-this */

let $form = $('.js-form');
let parsleyLoaded = false;

export default class FormValidation {
  /**
   * Initialize form validation for form elements on the page
   * @return {void}
   */
  constructor() {
    if ($form.length) {
      this.loadParsley(() => {
        this.createFormValidation();
        this.createFormTracking();
      });
    }

    // Reinitialize form validation for newly added forms
    $(document).on('form:reinit', () => {
      $form = $('.js-form');

      this.loadParsley(() => {
        this.createFormValidation();
      });
    });
  }

  /**
   * Asynchronously load Parsley, if it's already loaded it will callback immediately
   * @param {function} cb - Callback for when Parsley is loaded
   * @return {void}
   */
  loadParsley(cb) {
    if (parsleyLoaded) {
      cb.call(this);
      return;
    }

    require.ensure([], (require) => {
      require('../formValidation');
      parsleyLoaded = true;
      cb.call(this);
    });
  }

  /**
   * Create form validation
   * @return {void}
   */
  createFormValidation() {
    $form.each((i, form) => {
      $(form).parsley({
        classHandler(el) {
          // Add classes to the form-group
          return el.$element.closest('.form-group');
        },
      });
    });
  }

  /**
   * Get the name of a form or fallback to page path
   * @param {object} e Event object from Parsley callbacks
   * @return {string} Name of the form (or location)
   */
  getFormName(e) {
    return e.$element.data('name') || `Form on: ${window.location.pathname}`;
  }

  /**
   * Track forms for success and errors
   * @return {void}
   */
  createFormTracking() {
    // Remove all callbacks to prevent multiple callbacks
    window.Parsley.off('form:error');
    window.Parsley.off('form:success');

    // Listen for form success events
    window.Parsley.on('form:success', (e) => {
      window.App.tracking.shootEvent('Form', 'Submit', this.getFormName(e));
    });

    // Listen for form error events
    window.Parsley.on('form:error', (e) => {
      window.App.tracking.shootEvent('Form', 'Error', this.getFormName(e));
    });
  }
}
