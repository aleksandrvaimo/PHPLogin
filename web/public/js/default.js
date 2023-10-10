/**
 * Copyright © ...
 */
(function($) {
    $.updateNumber = function () {
        let updateNumber = 'span.update-number',
            numberContainer = 'div.number';

        $(updateNumber).on('click', function (event) {
            event.preventDefault();
            $.fn.request();
        });

        $.fn.request = function() {
            $.ajax({
               url: $(updateNumber).attr('data-url'),
               method: 'POST',
               dataType: 'JSON',
               success: function (response) {
                   if ('status' in response &&
                       response.status === 'success' &&
                       'html' in response) {
                        $(numberContainer).html(response.html);
                   }
               },
               error: function (xhr) {
                   console.log('Error occurred: ' + xhr.status + ' ' + xhr.statusText);
               }
           });
        }
    }
})(jQuery);
