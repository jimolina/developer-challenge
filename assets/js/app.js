jQuery(document).ready(function($){

    function setMsnError( element, type ) {
        var msn = 'check this field.';

        switch ( type ) {
            case 'empty':
                msn = 'this field is required.';
                break;
            case 'email':
                msn = 'this field required @ and an extension.';
                break;
             case 'phone':
                msn = 'this field required a format like: xxx - xxx.xx.xx';
                break;
        }

        msn = '<span class="msn ' + element.replace(/\./g, '') + '"><i class="fa fa-arrow-up"></i> <strong>Error:</strong> ' + msn + '</span>';

        return msn;
    }

    function setError( action, type, element ) {
        if ( action === true ) {
            if ( ! $.contains(document, $( '#tryModal .msn' + element )[0]) ) {
                $( '#tryModal ' + element ).addClass( 'has-error' );
                $( '#tryModal ' + element + ' input' ).after( setMsnError( element, type ) );
            }
        } else {
            if ( $.contains(document, $( '#tryModal .msn' + element )[0]) ) {
                $( '#tryModal ' + element ).removeClass( 'has-error' );
                $('#tryModal .msn' + element).remove();
            }
        }
    }

    function validateEmpty( element, value ) {
        if ( value === '' ) {
            setError( true, 'empty', element );

            return false;
        } else {
            setError( false, 'empty', element );
        }

        return true;
    }

    function validateEmail( element, value ) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]{2,20})+\.)+([a-zA-Z0-9]{2,4})+$/;
        var valid = regex.test(value);

        if ( ! valid ) {
            setError( true, 'email', element );
            
            return false;
        } else {
            setError( false, 'email', element );
        }

        return true;
    }

    function isValidSequence( value, type ) {
        var newVal = value.replace(/\-/g, ''),
            lastBlock = value.split('-');
            consecutive = totalSeq = 1,
            lastChar = -1, 
            o = -1;
        
        if ( type == 'repeat' ) {
            for ( var i = 0; i < newVal.length; i++ ){
                o = newVal.charCodeAt(i);

                if ( ( lastChar != -1 ) && ( o == lastChar ) ) {
                    consecutive++;
                } else {
                    consecutive = 1;
                }
            
                lastChar = o;

                if (consecutive == 3) return false;
            }
        } else if ( type == 'sequence' ) {
            for ( var i = 0; i < newVal.length; i++ ){
                o = newVal.charCodeAt(i);

                if ( ( lastChar != -1 ) && ( o == lastChar + 1 ) ) {
                    consecutive++;
                } else {
                    consecutive = 1;
                }
            
                lastChar = o;

                if (consecutive == 7) return false;
            }
        }

        return true;
    }

    function validatePhone( element, value ) {
        var regex = /^([0-9]{1,3})+\-([0-9+-]{4})+([0-9]{3})+([0-9]{4})+$/;
        var valid = regex.test(value);

        if ( 
            ( ! valid ) || 
            ( ! isValidSequence( value, 'repeat' ) ) || 
            ( ! isValidSequence( value, 'sequence' ) ) 
        ) {
            setError( true, 'phone', element );

            return false;
        } else {
            setError( false, 'phone', element );
        }

        return true;
    }

    $( '#add_record #name' ).on( 'keyup', function() {
        validateEmpty( '.group-name', $(this).val() );
    });

    $( '#add_record #email' ).on( 'keyup', function() {
        validateEmpty( '.group-email', $(this).val() );
        validateEmail( '.group-email', $(this).val() );
    });

    $( '#add_record #phone' ).on( 'keyup', function() {
        validateEmpty( '.group-phone', $(this).val() );
        validatePhone( '.group-phone', $(this).val() );
    });

    $( '#add_record' ).submit( function(e) { 
        e.preventDefault(); // Cancel the submit

        var nameInput = $('#add_record #name').val(),
            emailInput = $('#add_record #email').val(),
            phoneInput = $('#add_record #phone').val();

        if ( ! validateEmpty( '.group-name', nameInput ) ) { return false; }

        if ( 
            ( ! validateEmpty( '.group-email', emailInput ) ) || 
            ( ! validateEmail( '.group-email', emailInput ) )
        ) { 
            return false; 
        }

        if (
            ( ! validateEmpty( '.group-phone', phoneInput ) ) ||
            ( ! validatePhone( '.group-phone', phoneInput ) )
        ) {
            return false; 
        }

        $('#tryModal').modal('hide');
    });

});