<?php
$directory = '';
$canzoni = glob($directory.'*mp3');
foreach($canzoni as $song){
    $song = str_replace($directory, '', $song);
    $output = str_replace('.mp3', '', $song);
    echo "Converting ".$song." to $output.raw".PHP_EOL.PHP_EOL;
    @exec("ffmpeg -i '$song' -f s16le -ac 1 -ar 48000 -acodec pcm_s16le '$output.raw'");
    @exec("sudo rm '$song'");
}