/*var value;*/
$("#search").autocomplete({
    source: function(request, response){
        $.get("http://127.0.0.1:8000/autocomplete", {
            term:request.term
        }, function(data){
            response($.map(data, function(item) {
               /* value = item.id;*/
                return {
                    class: item.id,
                    label: item.title
                }
            }))
        }, "json");
    },
    select: function( event, ui ) {
     /*   console.log(value);
        console.log( ui.item ?
            "Selected: " + ui.item.label :
            "Nothing selected, input was " + this.value);*/
        window.location.href = "/Product/" + ui.item.class;
        $("#search").val("");
        $("#search").removeClass(ui.item.class);

    },
    minLength: 2,
    dataType: "json",
    cache: false
});