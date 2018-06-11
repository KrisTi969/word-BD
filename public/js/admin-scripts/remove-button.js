var next = 1;
var doRefresh = false;
var titleBeforeUpgrade;
var pasTitlu = 1;
var pasSubTitlu = 1;
var addPlusButtonOnce = 1;
var pressedButton = 0;
$(document).ready(function () {


        $('#editAccount').modal({
            keyboard: true,
            backdrop: "static",
            show: false,
        }).on('show', function () {

        });
        $('#userTable tr').click(function () {
            document.getElementById('title').value = $(this).children()[0].firstChild.textContent;
            document.getElementById('type').value = $(this).children()[1].firstChild.textContent;
            document.getElementById('category').value = $(this).children()[2].firstChild.textContent;
            document.getElementById('quantity').value = $(this).children()[3].firstChild.textContent;
            document.getElementById('price').value = $(this).children()[4].firstChild.textContent;
            document.getElementById('description').value = $(this).children()[5].firstChild.textContent;
            titleBeforeUpgrade = $(this).children()[0].firstChild.textContent;
            var StringJson = document.getElementById('description').value;
            var aux = JSON.parse(StringJson);
            console.log(aux);

            // append input control at start of form

            $.each(aux, function (index, incaceva) {
                if (pasTitlu === 1) {
                    $("<label id='label'>Title:</label>\n" +
                        "<br id='br'>")
                        .attr("id", "label" + pasTitlu)
                        .appendTo("#field");

                    $("<input size=\"14\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Title\" required/>\n" +
                        "<br id='br'>")
                        .attr("id", "title" + pasTitlu)
                        .attr("name", "title" + pasTitlu)
                        .attr("value", index)
                        .appendTo("#field");
                }
                else {
                    $("<label id='label'>Title:</label>\n" +
                        "<br id='br'>")
                        .attr("id", "label" + pasTitlu)
                        .attr("class", "input")
                        .appendTo("#field");

                    $("<input size=\"14\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Title\" required/>\n")
                        .attr("id", "title" + pasTitlu)
                        .attr("name", "title" + pasTitlu)
                        .attr("class", "input")
                        .attr("value", index)
                        .appendTo("#field");

                    var idStergere = 'id=' + 'remove-title' + pasTitlu;
                    $("input#title" + pasTitlu).after('<button onclick="removeTtitle(this)" ' + idStergere + ' class=\"btn btn-danger remove-title delete\">X</button><br id="ss">');
                }
                pasTitlu = pasTitlu + 1;
                addPlusButtonOnce = 1;
                for (var key in incaceva) {
                    if (incaceva.hasOwnProperty(key)) {
                        var rez = JSON.stringify(incaceva[key]);
                        var rez1 = rez.substring(rez.indexOf('"') + 1, rez.indexOf(':') - 1);
                        var rez2 = rez.substring(rez.lastIndexOf(":") + 2, rez.lastIndexOf('"'));

                        $("  <input size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/>\n")
                            .attr("id", "field" + pasSubTitlu)
                            .attr("name", "field" + pasSubTitlu)
                            .attr("value", rez1)
                            .appendTo("#field");

                        $("  <input size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/>\n <br id='br'>")
                            .attr("id", "value" + pasSubTitlu)
                            .attr("name", "value" + pasSubTitlu)
                            .attr("value", rez2)
                            .appendTo("#field");

                        if (pasSubTitlu !== 1 && addPlusButtonOnce === 0) {
                            var id = 'id=' + 'remove' + pasSubTitlu;
                            $("input#value" + pasSubTitlu).after('<button onclick="remove(this)"' + id + ' class=\"btn btn-danger remove-me\">-</button>');
                        }
                        if (pasSubTitlu !== 2 && addPlusButtonOnce === 1) {
                            var id = 'id=' + 'add' + pasSubTitlu;
                            $("input#value" + pasSubTitlu).after('<button onclick="addMore(this)" ' + id + ' class=\"btn btn-blue add-more\">+</button>');
                            addPlusButtonOnce = 0;
                        }

                        if (pasSubTitlu === 1 && addPlusButtonOnce === 1) {
                            var id = 'id=' + 'add' + pasSubTitlu;
                            $("input#value" + pasSubTitlu).after('<button onclick="addMore(this)"' + id + ' class=\"btn btn-blue add-more\">+</button>');
                        }
                        pasSubTitlu = pasSubTitlu + 1;
                    }

                }
            });

        });


    $(".add-title").click(function (e) {
        e.preventDefault();
        pasTitlu = pasTitlu + 1;
        pasSubTitlu = pasSubTitlu + 1;

        var id = 'id=' + 'add' + pasSubTitlu;
        var idLabel = 'id=' + 'label' + pasTitlu;
        var idTitle = 'id=' + 'title' + pasTitlu;
        var idField = 'id=' + 'field' + pasSubTitlu;
        var idValue = 'id=' + 'value' + pasSubTitlu;
        var idDiv = 'id=' + 'div' + pasTitlu;
        var idStergere = 'id=' + 'remove-title' + pasTitlu;
        $("button#b1").before('<br><label ' + idLabel + '>Title:</label><br id=\'ssa\'><input  ' + idTitle + ' size="14" autocomplete="off" class="input"  type="text" placeholder="Title" required/><button onclick="removeTtitle(this)" ' + idStergere + ' class=\"btn btn-danger remove-title delete\">X</button><br><input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button onclick="addMore(this)" ' + id + ' class=\"btn btn add-more\" >+</button>');

    });

});

function addMore(btn) {
    var id = 'id=' + 'remove' + pasSubTitlu;
    var idField = 'id=' + 'field' + pasSubTitlu;
    var idValue = 'id=' + 'value' + pasSubTitlu;
    $("button#add" + btn.id.match(/\d+/)[0]).after('<input  ' + idField + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Field\" required/><input  ' + idValue + ' size=\"18\" autocomplete=\"off\" class=\"input\"  type=\"text\" placeholder=\"Value\" required/><button ' + id + ' class=\"btn btn-danger remove-me\" onclick="remove(this)">-</button>');

};

function removeTtitle(btn) {


    if(document.getElementById("title"+(pasTitlu+1)) === null) {
        console.log(pasSubTitlu);
       /* document.getElementById("label"+pasTitlu).remove();
        document.getElementById("title"+pasTitlu).remove();
        document.getElementById("value"+pasSubTitlu).remove();
        document.getElementById("field"+pasSubTitlu).remove();
        document.getElementById("remove-title"+pasTitlu).remove();
        document.getElementById("add"+pasSubTitlu).remove();*/
    /*    $("li.start").nextUntil("li.stop").css({"color": "red", "border": "2px solid red"});*/
        $("#label"+pasTitlu).nextUntil("#b1").andSelf().remove();
    }
    else {
        console.log(btn.id + " sasasa");
        var titleToDelete = '#label' + btn.id.match(/\d+/)[0];
        var titleToStop = '#label' + String(Number(btn.id.match(/\d+/)[0]) + 1); ///crazyness

        $(titleToDelete).nextUntil(titleToStop).andSelf().remove();
    }
    pasTitlu = pasTitlu - 1;
};

//cine e this.id.length> adica cine ar trebui sa fie butonul pe care apesi ii this
function remove(btn) {
    console.log(btn);
    console.log("intram");
   // e.preventDefault();
    var fieldNum;
    if (btn.id.length === 7) {
        fieldNum = btn.id.charAt(btn.id.length - 1);
        console.log(fieldNum);
    } else {
        var unitati = btn.id.charAt(btn.id.length - 1);
        var zecimala = btn.id.charAt(btn.id.length - 2);
        fieldNum = zecimala.concat(unitati);
        console.log(fieldNum);
    }

    var fieldID = "#field" + fieldNum;
    $(btn).remove();
    $("#value" + fieldNum).remove();


    $(fieldID).remove();
};

