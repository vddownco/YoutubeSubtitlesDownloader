<?php
require_once __DIR__ . "/bootstrap.php";
$CaptionHandle = new \App\CaptionsHandle();
$video_url = "https://www.youtube.com/watch?v=8ch_H8pt9M8"; // it can be just the ID too

//$cookie_file = __DIR__."/my_yt_cookie_file.txt";
//$CaptionHandle->loginWithCookieFile($cookie_file);
// Uncomment the line above if you need to log in

try {
    $caption_url = $CaptionHandle->getSubtitleURL($video_url);
    if ($caption_url) {
        $captions_content = $CaptionHandle->httpRequest($caption_url);

        // Remove XML/HTML from subtitles - replacing "<" with " <" is to prevent some words from sticking to another
        $captions_content = str_replace("<", " <", $captions_content);
        $captions_content = strip_tags($captions_content);

        echo "Caption content:<br>";
        echo $captions_content;
    } else {
        echo "Couldn't get the URL.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}