/**
 *  Pages Authentication
 */
'use strict';

document.addEventListener('DOMContentLoaded', function () {
  (() => {
    const formAuthentication = document.querySelector('#formAuthentication');

    // Form validation for Add new record
    if (formAuthentication && typeof FormValidation !== 'undefined') {
      FormValidation.formValidation(formAuthentication, {
        fields: {
          username: {
            validators: {
              notEmpty: {
                message: 'Please enter username'
              },
              stringLength: {
                min: 6,
                message: 'Username must be more than 6 characters'
              }
            }
          },
          email: {
            validators: {
              notEmpty: {
                message: 'Insira o seu email'
              },
              emailAddress: {
                message: 'Insira um email valido'
              }
            }
          },
          'email-username': {
            validators: {
              notEmpty: {
                message: 'Insira o seu Email'
              },
              /* stringLength: {
                min: 3,
                message: 'Username must be more than 6 characters'
              } */
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'Insira sua palavra passe'
              },
              stringLength: {
                min: 6,
                message: 'A palavra passe deve ter no minino 6 caracteres'
              }
            }
          },
          'confirm-password': {
            validators: {
              notEmpty: {
                message: 'Please confirm password'
              },
              identical: {
                compare: () => formAuthentication.querySelector('[name="password"]').value,
                message: 'The password and its confirmation do not match'
              },
              stringLength: {
                min: 6,
                message: 'Password must be more than 6 characters'
              }
            }
          },
          terms: {
            validators: {
              notEmpty: {
                message: 'Please agree to terms & conditions'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            eleValidClass: '',
            rowSelector: '.form-control-validation'
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
          instance.on('plugins.message.placed', e => {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      });
    }

    // Two Steps Verification for numeral input mask
    const numeralMaskElements = document.querySelectorAll('.numeral-mask');

    // Format function for numeral mask
    const formatNumeral = value => value.replace(/\D/g, ''); // Only keep digits

    if (numeralMaskElements.length > 0) {
      numeralMaskElements.forEach(numeralMaskEl => {
        numeralMaskEl.addEventListener('input', event => {
          numeralMaskEl.value = formatNumeral(event.target.value);
        });
      });
    }
  })();
});
