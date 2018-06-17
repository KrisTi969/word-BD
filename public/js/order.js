$(function() {
    //a function checking the validity of an email
    function validEmail(email) {
        var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
        return (email.match(r) == null) ? false : true;
    }



    $(".submitOrder").click(function() {
        /*var dataFields = { 'checkoutEmail': checkoutEmail, 'checkoutContact': checkoutContact ,'shipping_name':shipping_name, 'shipping_country':shipping_country, 'shipping_contact':shipping_contact,
            'shipping_address':shipping_address, 'shipping_postal':shipping_postal, 'shipping_notes':shipping_notes, 'payment':payment
        }; // prepare datas string
        */
         /* var product_id = $('#product_id').val();
         var rating = $('#rating').val();
         var com_text = $('#com_text').val(); // get text from comment text field
         var dataFields = { 'com_text': com_text, 'rating': rating ,'product_id':product_id}; // prepare datas string

         var checkText = $('#com_text').val().length; // get the length of the name field
         // var checkEmail = validEmail(com_email); // check the email format with the above function validEmail()
         if(checkText < 3 || com_text=='' || rating == '') { // name must be at least 4 characters, email must be valid and text not empty (you may change all that)
             if (com_text=='') {
                 $('#formGroupText').attr('class', 'form-group has-error'); // this is a Bootstrap CSS, I add has-error to the class so the field will turn red
                 $('#formGroupText span').text('This field can\'t be empty'); // I add a help text in the <span> node
             } else {
                 $('#formGroupText').attr('class', 'form-group has-success'); // this is a Bootstrap CSS, I add has-success to the class so the field will turn green
                 $('#formGroupText span').text(''); // remove help text in the <span> node
             }
             if(rating==""){
                 $('#idGroup').attr('class', 'form-group has-error'); // this is a Bootstrap CSS, I add has-error to the class so the field will turn red
                 $('#idGroup span').text('This field can\'t be empty'); // I add a help text in the <span> node
             } else {
                 $('#idGroup ').attr('class', 'form-group has-success'); // this is a Bootstrap CSS, I add has-success to the class so the field will turn green
                 $('#idGroup span').text(''); // remove help text in the <span> node
             }
         }
         else { // if everything valid*/
        //   $('#newComment').html(' Processing...'); // loader image apprears in the <div id="newComment"></div>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/newOrder",
            data: {
                email: jQuery('#checkoutEmail').val(),
                contact: jQuery('#checkoutContact').val(),
                shipping_name: jQuery('#shipping_name').val(),
                shipping_country: jQuery('#shipping_country').val(),
                shipping_city: jQuery('#shipping_city').val(),
                shipping_address: jQuery('#shipping_address').val(),
                shipping_postal: jQuery('#shipping_postal').val(),
                shipping_notes: jQuery('#shipping_notes').val(),
                payment: jQuery('#payment').val()
            },
            timeout: 3000,
            success: function(dataBack){ // if success
                    $('#success-msg').removeClass('hidden');
                $('#myModal').modal('show');
            },
            error: function() { // if error
            }
        });
        //   }
        return false;
    });
});


