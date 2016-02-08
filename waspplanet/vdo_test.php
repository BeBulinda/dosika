<html>
  <head>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#loadVideo").bind("click", function(){
          videoUrl = $(this).attr("data-video-src")
          $("#video").attr("src", videoUrl)
        });
      });
    </script>
  </head>
  <body>
    <div class="container">
      <button id="loadVideo" data-video-src="files/Eko Dydda - Love Gone Bananas.mp4">Load video</button>
      <iframe id="video" width="560" height="315" src="" frameborder="0" allowfullscreen/>
    </div> 
  </body>
</html>