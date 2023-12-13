<?php require_once "vistas/parte_superior.php"?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" href="./styles.css" rel="stylesheet"/>
  </head>
  <body>
  
  <model-viewer src="logo.glb" ar ar-modes="webxr scene-viewer quick-look" camera-controls poster="poster.webp" shadow-intensity="1">
      <div class="progress-bar hide" slot="progress-bar">
        <iframe src="http://localhost/akiapp/model/" style="border:0"  height="200" width="300" title="Iframe Example"></iframe>
      </div>
      <button slot="ar-button" id="ar-button">
          View in your space
      </button>
      <div id="ar-prompt">
          <img src="ar_hand_prompt.png">
      </div>
    </model-viewer>  
    <script src="script.js"></script>
    <!-- Loads <model-viewer> for browsers: -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.2.0/model-viewer.min.js"></script>



    <style>
      .img-container {
        text-align: center;
      }
      
    </style>
    <div class="img-container"> <!-- Block parent element -->
      <img src="../imgs/Dashboards.png"  width="80%" alt="John Doe">
    </div>
    <br><br><br>
  </body>
</html>