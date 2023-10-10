/**
 * Copyright © ...
 */
(function($) {
    $.loginForm = function () {
        let isValid,
            loginForm = '.login-form',
            loginFormBtn = '.login-btn',
            loginFormInput = '.login-form input',
            invalidClass = 'is-invalid',
            formGroupClass = '.form-group',
            errorMessageClass = 'text-danger',
            errorMessage = 'input value must be at least 3 characters in length';

        $(document).on('click', loginFormBtn, function (event) {
            event.preventDefault();
            $.fn.validateForm();

            if (isValid) {
                $(this).attr('disabled', true);
                $(loginForm).submit();
            }
        });

        $.fn.validateForm = function() {
            isValid = true;

            $(loginFormInput).each(function() {
                if ($(this).val().length < 3) {
                    if (!$(this).hasClass(invalidClass)) {
                        $(this).attr('class', $(this).attr('class') + ' ' + invalidClass);
                    }

                    $.fn.addErrorMessage($(this));
                    isValid = false;
                } else {
                    $.fn.cleanInput($(this));
                }
            });
        }

        $.fn.addErrorMessage = function(element) {
            if (!element.closest(formGroupClass).find('span').length) {
                element.closest(formGroupClass).append(
                    $('<span />').addClass(errorMessageClass).html(errorMessage)
                );
            }
        }

        $.fn.cleanInput = function(element) {
            if (element.hasClass(invalidClass)) {
                element.removeClass(invalidClass);
            }

            if (element.closest(formGroupClass).find('span').length) {
                element.closest(formGroupClass).find('span').remove();
            }
        }
    }
})(jQuery);
