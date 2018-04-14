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
<script src="https://aframe.io/releases/0.8.0/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/build/aframe-ar.js"> </script>
<body style='margin : 0px; overflow: hidden;'>
<a-scene embedded arjs>
    <a-marker preset="hiro">
        <a-entity scale="2 2 2"
                obj-model="obj: {{asset('images/ar/wishdomship.obj')}};
            mtl: {{asset('images/ar/wishdomship.mtl')}}">
        </a-entity>    </a-marker>
    <a-entity camera></a-entity>
</a-scene>
</body>
</html>



{{--
<body style='margin : 0px; overflow: hidden;'>
<a-scene embedded arjs='sourceType: webcam;'>
    <a-assets>
        <a-asset-item id="ship-obj" src="ship_model/ship.obj"></a-asset-item>
        <a-asset-item id="ship-mtl" src="ship_model/ship.mtl"></a-asset-item>
    </a-assets>
    <!-- Using the asset management system. -->
    <a-entity obj-model="obj: #ship-obj; mtl: #ship-mtl"></a-entity>
    <a-marker-camera type='pattern' url='patt.ship'></a-marker-camera>
</a-scene>
</body>--}}


{{--SIGUR MERGER
<html>
<script src="https://aframe.io/releases/0.6.1/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/build/aframe-ar.js"> </script>
<body style='margin : 0px; overflow: hidden;'>
<a-scene embedded arjs>
    <a-marker preset="hiro">

        </a-entity>
    </a-marker>
    <a-entity camera></a-entity>
</a-scene>
</body>
</html>
--}}