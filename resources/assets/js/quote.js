jQuery(document).ready(function() {
    var quoteData = {}; //store the latest quote, so it can be used to make an identical order easily

    jQuery('#quote-form-1, #quote-form-2').submit(function(e) {
        e.preventDefault();

        if(jQuery(this).attr('id') === 'quote-form-1') {
            quoteData.amount_to_usd = encodeURIComponent(jQuery(this).find('.amount').val());
            delete quoteData.amount_from_usd;
        }else if(jQuery(this).attr('id') === 'quote-form-2') {
            quoteData.amount_from_usd = encodeURIComponent(jQuery(this).find('.amount').val());
            delete quoteData.amount_to_usd;
        }

        if(quoteData.hasOwnProperty('amount_from_usd')) {
            if(quoteData.amount_from_usd != parseFloat(quoteData.amount_from_usd)) {
                alert('Please enter a valid amount');
                return false;
            }
        }else if(quoteData.hasOwnProperty('amount_to_usd')) {
            if(quoteData.amount_to_usd != parseFloat(quoteData.amount_to_usd)) {
                alert('Please enter a valid amount');
                return false;
            }
        }

        quoteData.currency = encodeURIComponent(jQuery(this).find('.currency').val());
        quoteData.dry_run = 1;

        jQuery.ajax({
            url: '/api/order',
            method: 'POST',
            dataType: 'json',
            data: jQuery.param(quoteData),
            success: function(data) {
                jQuery('#quote-table').show();
                jQuery('#quote-order').show();
                jQuery('#quote-message').hide();

                jQuery('#quote-currency').html(data.currency_to);
                jQuery('#quote-amount').html(data.amount_bought);
                jQuery('#quote-surcharge').html(data.amount_surcharge);
                jQuery('#quote-total').html(data.amount_total + ' ' + data.currency_from);
            },
            error: function() {
                alert('There was a problem getting the quote');
            }
        });

    });

    jQuery('#quote-order').click(function(e) {
        e.preventDefault();

        quoteData.dry_run = 0;

        jQuery('#quote-order').text('Placing Order...');

        jQuery.ajax({
            url: '/api/order',
            method: 'POST',
            dataType: 'json',
            data: jQuery.param(quoteData),
            success: function(data) {
                jQuery('#quote-order').text('Purchase');
                jQuery('#quote-order').hide();

                jQuery('#quote-message').show();
                jQuery('#quote-message').text('Order successfully placed');

            },
            error: function() {
                alert('There was a problem creating the order');
            }
        });


    });
});