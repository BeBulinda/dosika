<?php
/*
{
    "require": {
        "php-ffmpeg/php-ffmpeg": "~0.5"
    }
}
$flvfile = "/var/www/html/waspplanet/files/Eko%20Dydda%20-%20Love%20Gone%20Bananas.mp4";
$png_path = "/var/www/html/waspplanet/files/mpeg.flv";
?>

<?php
 if (exec("/var/www/html/waspplanet/ffmpeg-2.6.2/ -i $flvfile -acodec aac -ab 128kb -vcodec mpeg4 -b 1220kb -mbd 1 -s 320x180 $png_path")) 
      { echo "Success"; }
      else { echo "No good"; }
*/
$flvfile = "/var/www/html/waspplanet/files/Eko%20Dydda%20-%20Love%20Gone%20Bananas.mp4";
$ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open($flvfile);
$video
    ->filters()
    ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
    ->synchronize();
$video
    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
    ->save('frame.jpg');
$video
    ->save(new FFMpeg\Format\Video\X264(), '/var/www/html/waspplanet/files/mpeg.webm');
   /* ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
    ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');*/