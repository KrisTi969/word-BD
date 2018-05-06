$(document).ready(function(){
title = jQuery('#title1').val();
var employees = {
};

var firstChestie;

$("#field input").each(function(){
    /* console.log($(this).find(':input').context.name )*///<-- Should return all input elements in that specific form.
    var idGasit = $(this).find(':input.title').context.attributes.id.value;
    var valoare = jQuery('#' + idGasit).val();
    if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
        employees[valoare] = [];
        console.log(valoare + "la titlu");
    }
});

var currentId;
var currentTitle;
$("#field input").each(function(){
    var idGasit = $(this).find(':input').context.attributes.id.value;
    console.log(idGasit)
    var valoare = jQuery('#' + idGasit).val();

    if (idGasit.indexOf('title') >= 0 || 'title'.indexOf(idGasit) >= 0) {
        currentTitle = valoare;
    }

    if (idGasit.indexOf('field') >= 0 || 'field'.indexOf(idGasit) >= 0) {
        if(idGasit.length === 6) {
            currentId = idGasit.charAt(idGasit.length - 1);
        } else {
            var unitati = idGasit.charAt(idGasit.length - 1);
            var  zecimala = idGasit.charAt(idGasit.length - 2);
            currentId = zecimala.concat(unitati);
        }

        firstChestie = jQuery('#field' + currentId).val();

    }
    if (idGasit.indexOf('value') >= 0 || 'value'.indexOf(idGasit) >= 0) {
        var second = jQuery('#value' + currentId).val();
        employees[currentTitle].push({
            [firstChestie]: second  //// aparent numai asa stie [] ca te referi la text ca js ii nebunel
        });
    }

});
console.log(JSON.stringify(employees));

debugger;
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
jQuery.ajax({
    url: "{{ route('Admin-storeProduct')}}",
    method: 'post',
    dataType: "json",
    data: {
        title: jQuery('#mainTitle').val(),
        type: jQuery('#type').val(),
        price: jQuery('#price').val(),
        quantity: jQuery('#quantity').val(),
        title1: jQuery('#title1').val(),
        field1: jQuery('#field1').val(),
        value1: jQuery('#value1').val(),
        description: employees
    },
    success:function(data) {
        console.log(data);
        if (data.errors) {

        }
        if (data.success) {
            $('#success-msg').removeClass('hidden');
            $("#image1").val('');
            $("#image2").val('');
            $("#image3").val('');
            $('#myModal').modal('show');
        }
    }
});
});