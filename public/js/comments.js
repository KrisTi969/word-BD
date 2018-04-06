$(function() {
    //a function checking the validity of an email
    function validEmail(email) {
        var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
        return (email.match(r) == null) ? false : true;
    }

    $(".submitComment").click(function() {
        var product_id = $('#product_id').val();
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
        else { // if everything valid
            $('#newComment').html(' Processing...'); // loader image apprears in the <div id="newComment"></div>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/addReview", // call the php file ajax/tuto_blogcommentajax.php to insert new datas in the database
                data: dataFields, // send dataFields var
                timeout: 3000,
                success: function(dataBack){ // if success
                    $('#newComment').html(dataBack); // return new datas and insert in the <div id="newComment"></div>
                    $('#com_text').val(''); // clear the com_text field // I don't clear the name and email field if the guy wants to post another comment
                    $('#newComment').html('<p style="color: green">Review added successfully! It will show on the page after it is approved by an admin.</p>');
                },
                error: function() { // if error
                    $('#newComment').text('Problem!'); // display "Problem!" in the <div id="newComment"></div>
                }
            });
        }
        return false;
    });
});