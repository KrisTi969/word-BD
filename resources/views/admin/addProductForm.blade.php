<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 27.04.2018
 * Time: 15:49
 */
?>

<form method="POST"  id="#addProduct" name="addProduct" enctype="multipart/form-data">
    @csrf
    {{--Daca nu apar probleme, afisam un mesaj--}}


    <div class="form-group row">
        <label for="name" class="col-sm-2 form-control-label Whitish" >Title:</label>
        <div class="col-sm-8">
            <input type="text" name="mainTitle" class="form-control" id="mainTitle" placeholder="Title"  minlength="2" required oninput="myFunction('#mainTitle-error')">
            <span class="text-danger">
                            <strong id="mainTitle-error"></strong>
                        </span>
        </div>
    </div>

    <div class="form-group row">
        <label for="type" class="col-sm-2 form-control-label Whitish">Type:</label>
        <div class="col-sm-8"  >
            <select id="type" name="type" class="input-group-lg" >
                <option value="" selected="selected">(please select a type)</option>
                <option value="4kTV">4kTV</option>
                <option value="lcdTV">lcdTV</option>
                <option value="curvedTV">curvedTV</option>
                <option value="curvedTV">curvedTV</option>
                <option value="curvedTV">curvedTV</option>
                <option value="curvedTV">curvedTV</option>
                <option value="curvedTV">curvedTV</option>

                <option value="accesories">accesories</option>
                <option value="bags-cases">bags-cases</option>
                <option value="binoculars-scopes">binoculars-scopes</option>
                <option value="bluetooth-headset">bluetooth-headset</option>
                <option value="digital-cameras">digital-cameras</option>
                <option value="film-photografy">film-photografy</option>
                <option value="flashes">flashes</option>
                <option value="game-nintendods">game-nintendods</option>
                <option value="game-nintendoswitch">game-nintendoswitch</option>
                <option value="game-ps4">game-ps4</option>
                <option value="game-xboxone">game-xboxone</option>

                <option value="headphone">headphone</option>
                <option value="laptop-2-in-1">laptop-2-in-1</option>
                <option value="laptop-ultrabooks">laptop-ultrabooks</option>
                <option value="lcdTV">lcdTV</option>
                <option value="ledTV">ledTV</option>
                <option value="lenses">lenses</option>
                <option value="lightning-studio">lightning-studio</option>
                <option value="monitor-4k">monitor-4k</option>
                <option value="monitor-led">monitor-led</option>
                <option value="monitor-touchscreen">monitor-touchscreen</option>
                <option value="movie-action">movie-action</option>
                <option value="movie-animation">movie-animation</option>
                <option value="movie-comedy">movie-comedy</option>
                <option value="movie-documentary">movie-documentary</option>
                <option value="movie-fantasy">movie-fantasy</option>
                <option value="movie-fitness">movie-fitness</option>
                <option value="movie-romance">movie-romance</option>
                <option value="movie-thriller">movie-thriller</option>
                <option value="music-classical">music-classical</option>
                <option value="music-comedy">music-comedy</option>
                <option value="music-country">music-country</option>
                <option value="music-electronic">music-electronic</option>
                <option value="music-pop">music-pop</option>
                <option value="music-rap">music-rap</option>
                <option value="music-rock">music-rock</option>
                <option value="oledTV">oledTV</option>
                <option value="phonecase">phonecase</option>
                <option value="plasmaTV">plasmaTV</option>
                <option value="printer-copying">printer-copying</option>
                <option value="printer-faxing">printer-faxing</option>
                <option value="printer-photo">printer-photo</option>
                <option value="printer-scanners">printer-scanners</option>
                <option value="printer-all-in-one">printer-all-in-one</option>
                <option value="smartphone">smartphone</option>
                <option value="smartphone-accesories">smartphone-accesories</option>
                <option value="smartwatch">smartwatch</option>

                <option value="video">video</option>
            </select>
            <br>
            <span class="text-danger">
                            <strong id="type-error"></strong>
                        </span>
        </div>
    </div>

    {{----}}

    <div class="form-group row">
        <label for="category" class="col-sm-2 form-control-label Whitish">Category:</label>
        <div class="col-sm-8"  >
            <select id="category" name="category" class="input-group-lg" >
                <option value="" selected="selected">(please select a category)</option>
                <option value="Electronic Appliances">Electronic Appliances</option>
                <option value="Computers & Accesories">Computers & Accesories</option>
                <option value="Entertainment">Entertainment</option>
            </select>
            <br>
            <span class="text-danger">
                            <strong id="category-error"></strong>
                        </span>
        </div>
    </div>

    <br>

    <div class="form-group row">
        <label for="name" class="col-sm-2 form-control-label Whitish" >Price:</label>
        <div class="col-sm-8">
            <input type="number" name="price" class="form-control" id="price" placeholder="Price:"  required oninput="myFunction('#price-error')">
            <span class="text-danger">
                            <strong id="price-error"></strong>
                        </span>
        </div>
    </div>
    <div class="controls">
    <div class="form-group row">
        <label for="quantity" class="col-sm-2 form-control-label Whitish" >Quantity:</label>
        <div class="col-sm-8">
            <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity:"  required oninput="myFunction('#quantity-error')">
            <span class="text-danger">
                            <strong id="quantity-error"></strong>
                        </span>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <input type="hidden" name="count" value="1" />
            <div class="control-group" id="fields">
                <label class="control-label" for="field1">Description:</label>
                <div class="controls" id="profs">

                    <div id="field">
                        <input size="35" autocomplete="off" class="input" id="title1" name="title1" type="text" placeholder="Title" required/>
                        <br>
                        <input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Field1" required/>

                        <input autocomplete="off" class="input" id="value1" name="value1" type="text" placeholder="Value1" required/>
                        <button id="b1" class="btn add-more" type="button">+</button>
                        <br>
                        <span class="text-danger">
                            <strong id="title1-error"></strong>
                        </span>
                        <br>
                        <span class="text-danger">
                            <strong id="field1-error"></strong>
                        </span>
                        <br>
                        <span class="text-danger">
                            <strong id="value1-error"></strong>
                        </span>
                        <br>
                        <small>Press - to remove a form field :)</small>
                        <button id="b1" class="btn add-title" type="button">Add Title</button>
                    </div>

                   {{-- <br>
                    <button id="b1" class="btn add-title" type="button">Add Title</button>
                    <br>
                    <small>Press + to add another form field :)</small>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-8">
            <input type="submit" class="btn btn-success btn-lg " id="ajaxSubmit" value="Add Product" />
        </div>
    </div>


</form>

