/**
 * Copyright © ...
 */
(function($) {
    $.updateNumber = function () {
        $('span.update-number').on('click', function (e) {
            e.preventDefault();
            $.fn.request();
        });

        $.fn.request = function() {
            let self = this;

            $.ajax({
               url: $('span.update-number').attr('data-url'),
               method: 'POST',
               dataType: 'JSON',
               success: function (response) {
                   if ('status' in response &&
                       response.status === 'success' &&
                       'html' in response) {
                        $('div.number').html(response.html);
                   }
               },
               error: function (xhr) {
                   console.log('Error occurred: ' + xhr.status + ' ' + xhr.statusText);
               }
           });
        }
    }
})(jQuery);
