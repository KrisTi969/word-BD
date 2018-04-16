<?php
/**
 * Created by PhpStorm.
 * User: crys_
 * Date: 14.04.2018
 * Time: 15:22
 */
?>
<script src="https://aframe.io/releases/0.6.1/aframe.min.js"></script>
<script src="https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>
<script src="https://jeromeetienne.github.io/AR.js/aframe/build/aframe-ar.js"></script>

<body style='margin : 0px; overflow: hidden;'>
<a-scene embedded arjs='sourceType: webcam;'>

    <a-marker preset='hiro'>
        <!--Adding a glTF 2.0 model to your scene-->
        <a-entity
                gltf-model-next="src: url(/path/to/nameOfFile.gltf);"
        >
        </a-entity>

    </a-marker>

    <a-entity camera></a-entity>
</a-scene>
</body>


{{--<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no,user-scalable=no,maximum-scale=1">
    <title>Examples • Animation</title>
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/examples/vendor/aframe/build/aframe.min.js"></script>
    <script src="https://aframe.io/releases/0.8.2/aframe.min.js"></script>
    <script src="../bundle.js"></script>
    <script src="https://rawgit.com/feiss/aframe-environment-component/master/dist/aframe-environment-component.min.js"></script>
</head>
<body>
<a-scene environment="preset: checkerboard">
    <!-- Player -->
    <!-- Animation
         See: http://threejs.org/examples/#webgl_animation_scene
    -->
    <a-entity position="0 1 0"
              animation-mixer="clip: *;"
              gltf-model="src: url(https://raw.githubusercontent.com/KhronosGroup/glTF-Sample-Models/master/2.0/AnimatedMorphSphere/glTF/AnimatedMorphSphere.gltf);">
    </a-entity>
</a-scene>
</body>
</html>--}}
{{--
<body>
<a-scene>
    <a-entity
            obj-model="obj: url(https://rishavjayswal.github.io/augmented-reality/resources/couch.obj);
            mtl: url(https://rishavjayswal.github.io/augmented-reality/resources/couch.mtl)">
    </a-entity>
</a-scene>
</body>
--}}


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


{{--       <!doctype HTML>
<html>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/examples/vendor/aframe/build/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/build/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
<a-scene embedded arjs>
    <a-assets>
        <a-asset-item id="ship-obj" src="{{asset('images/ar/TV/LCD TV.obj')}}"></a-asset-item>
        <a-asset-item id="ship-mtl" src="{{asset('images/ar/TV/LCD TV.mtl')}}"></a-asset-item>
    </a-assets>
    <a-marker preset="hiro">
        <a-entity obj-model="obj: #ship-obj; mtl: #ship-mtl"></a-entity>
    </a-marker>
    <a-entity camera></a-entity>
</a-scene>
</body>
</html>--}}