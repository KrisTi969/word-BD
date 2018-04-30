<html>
<body>
<?php
/*echo Form::open(array('url' => '/uploadfile','files'=>'true'));
echo 'Select the file to upload.';
echo Form::file('image1');
echo Form::file('image2');
echo Form::file('image3');
echo Form::submit('Upload File');
echo Form::close();
*/



?>

{!! Form::open(['url' => 'uploadfile', 'id' => 'form','style'=>'text-align:left;','enctype'=>"multipart/form-data"]) !!}

<div class="form-group">
    <label for="passport">Product Images</label>
    <br>
    {!! Form::file('image1',array('id'=>'image1')) !!}
        <span class="text-danger">
                            <strong id="image1-error"></strong>
                        </span>

    <br>
    {!! Form::file('image2',array('id'=>'image2')) !!}
        <span class="text-danger">
                            <strong id="image2-error"></strong>
                        </span>

    <br>
    {!! Form::file('image3',array('id'=>'image3')) !!}
        <span class="text-danger">
                            <strong id="image3-error"></strong>
                        </span>

</div>

<button type="submit" class="btn btn-default">Submit</button>
</fieldset>
{!! Form::close() !!}


</body>
</html>