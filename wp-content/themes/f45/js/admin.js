jQuery(document).ready(function($){
   $('.woocommerce #mainform').on('submit', function(e) {
        var _wp_http_referer = $('input[name=_wp_http_referer]').val();
        if (_wp_http_referer == '/credit/wp-admin/admin.php?page=wc-settings&tab=settings_tab_custom-setting') {
            $('.custom-error').remove();
            var custom_credit_unit = $('#custom_credit_unit').val();
            var custom_credit_credit = $('#custom_credit_credit').val();
            var error = false;
            if (!isNumeric(custom_credit_unit)) {
                error = true;
                var parent_unit = $('#custom_credit_unit').parent();
                parent_unit.append('<div class="custom-error error-credit-unit">Unit is invalid!</div>');
            }
            if (!isNumeric(custom_credit_credit)) {
                error = true;
                var parent_credit = $('#custom_credit_credit').parent();
                parent_credit.append('<div class="custom-error error-credit-credit">Credit is invalid!</div>');
            }
            if (error == true) {
                e.preventDefault();
            }
        }
   });
   function isNumeric(n) { 
      return !isNaN(parseFloat(n)) && isFinite(n); 
    }
});