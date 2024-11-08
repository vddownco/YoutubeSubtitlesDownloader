# YouTube Subtitles Downloader
Simple PHP implementation to download YouTube subtitles
# How to Use?
First, run:
```shel
composer update
```
No libraries or dependencies are required; Composer will only be used for autoloading classes.

A practical example of how to obtain the subtitles of a YouTube video:

```php
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

```

# When login is required
If you are using it outside your home network, for example in the cloud, you may need to log in to get the YouTube 
subtitles, to do this you can do the following. 

- Get YouTube login cookies
- Place the cookies inside the file `my_yt_cookie_file.txt`
- Uncomment the line:
```php
//$cookie_file = __DIR__."/my_yt_cookie_file.txt";
//$CaptionHandle->loginWithCookieFile($cookie_file);
 ```
This is because YouTube may require login.

# Chrome/Edge Extension
How do I get cookies? One way is to use an extension that allows you to download cookies. 
Choose a secure one because your cookie data could allow anyone to log into your account. 

A popular one is this one: https://chromewebstore.google.com/detail/cclelndahbckbenkjhflpdbgdldlbecc

I recommend that you always check the code before using it.

Avoid using your main account.

**Download cookies in Netscape format**

# That's all
I hope this code is useful and that you make excellent use of it.