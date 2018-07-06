<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 14.04.2018
 * Time: 15:22
 */
?>
        <!doctype HTML>
<html>
<script src="{{asset('js/ar/aframe.min.js')}}"></script>
<script src="{{asset('js/ar/aframe-ar.js')}}"></script>
<script src="{{asset('js/ar/a-frame-extras.js')}}"></script>
<body style='margin : 0px; overflow: hidden;'>
{{--{{request()->segment(count(request()->segments()))}}--}}
<a-scene embedded arjs>
    <a-assets>
        <a-asset-item id="tree"
                      src="{{asset('uploads/ar')}}/{{request()->segment(count(request()->segments()))}}"></a-asset-item>

    </a-assets>
    <a-marker preset="hiro">

        {{-- {{request()->segment(count(request()->segments()))}}--}}
        @if(request()->segment(count(request()->segments())) == "Apple iPhone XIphone seceond version finished.gltf")

            <a-gltf-model scale="1 1 1" src="#tree"></a-gltf-model>
    </a-marker>
    <a-entity camera></a-entity>

    @else
        <a-gltf-model scale="0.02 0.02 0.02" src="#tree"></a-gltf-model>

        </a-marker>
        <a-entity camera></a-entity>
    @endif

</a-scene>
</body>

</html>
