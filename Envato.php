<?php
# We don’t seek to gain from you — we offer our credibility with every response.
header('Content-Type:application/json');
# Humans are forgetful, that’s why they’re chosen.
if(!file_exists('files')) {
    mkdir('files');
}
# WHEN YOU BUY A WATCH, YOU CAN WATCH THE VIDEOS.
if (!isset($_GET['url']) || !isset($_GET['key'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing parameters']);
    exit;
    }
    if ($_GET['key'] !== 'DavyJones') {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid key']);
    exit;
    }   
# You’re not a pawn — I’m still your A4
function isFind($haystack, $needle) {
return strpos($haystack, $needle) !== false;
}

$link = $_GET['url'];

if (!isFind($link, 'elements.envato.com')) {
http_response_code(400);
echo json_encode(['error' => 'Invalid Envato link']);
exit;
}

$custom = false;
if(isset($_GET['custom'])) {
    if($_GET['custom'] > 0) {
        $custom = true;
    }
}

$filename = $_GET['filename'] ?? "N/A";
if(isFind($link, 'elements.envato.com')) {
    $useragent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36";
    $cookie = 'C:/wamp64/www/n1stock/cookies/envato.txt';
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    $url = 'https://elements.envato.com/api/v1/current_user.json';
    $headers = array(
      'authority: elements.envato.com',
      'accept: application/json',
      'accept-language: en-US,en;q=0.9',
      'if-none-match: W/"84ce030125b54fa0c3c9441f046de502"',
      'referer: https://elements.envato.com/under-the-sea-indie-gig-flyer-9QW7QJM',
      'sec-ch-ua: "Not_A Brand";v="99", "Google Chrome";v="109", "Chromium";v="109"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-fetch-dest: empty',
      'sec-fetch-mode: cors',
      'sec-fetch-site: same-origin',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',
  );
# WHOSE NAME IS THE VOICE IN YOUR EARS ?	  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);

    $response = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);


    preg_match('/^x-csrf-token:\s*([^\r\n]+)/mi', $header, $matches);
    $csrf = $matches[1] ?? null;

    preg_match('/^x-csrf-token-2:\s*([^\r\n]+)/mi', $header, $matches2);
    $csrf2 = $matches2[1] ?? null;
    
    $item = $_GET['url'];
    if(isFind($item, '-')) {
       $item = explode('-', $item);
       $item = $item[(sizeof($item) - 1)];
   }	
# BEAUTY CAN ONLY BE SEEN IN A MIRROR. WE CREATED EVERYTHING IN PAIRS. LOOK INTO YOUR OWN EYES.	
   $url = "https://elements.envato.com/elements-api/items/$item/download_and_license.json";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($ch, CURLOPT_POST, 1);
   $payload = json_encode(array('licenseType' => 'trial'));
   curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
   $headers = array(
    'Content-Type: application/json',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36',
    "x-csrf-token: ".$csrf,
    "x-csrf-token-2: ".$csrf2,
    'Content-Length: ' . strlen($payload),

);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);

   $json = json_decode($result);
# I'm you times two

   $textDownloadUrl = "https://elements.envato.com" . $json->data->attributes->textDownloadUrl;

   $ch = curl_init($textDownloadUrl);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:*/*', 'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36'));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $datalic = curl_exec($ch);
   curl_close($ch);

   $file = file_put_contents("element_license/$item.txt", $datalic);
   $license_url = "http://dl.y4siiiin.com/element_license/$item.txt";

    $download = $json->data->attributes->downloadUrl; // download
    $filename = getBetweenString($download, "filename%2A%3DUTF-8%27%27", "&");
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(!$custom) {
        $file = downloadFile2($download, $item, "ElementEnvato");
        //$mime = getContentType($file);
        //$extension = mimeToExtension($mime);
        $filename = "ElementEnvato_".$item;
        $dir = "files/envato/$filename".($extension ? ".$extension" : "");
        //rename($file, $dir);
    }
    echo json_encode(array('status' => true, 'download' => ($custom ? $download : "http://dl.y4siiiin.com/$dir"), 'license' => $license_url));
}
function requestWebsite($url) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
function isLink($string) {
    $pattern = '/(http[s]?\:\/\/)?(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}/';
    return preg_match($pattern, $string);
}
function getBetweenString($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
function getLineWithString($fileName, $str) {
    $lines = file($fileName);
    foreach($lines as $lineNumber => $line) {
        if(strpos($line, $str) !== false) {
            return $line;
        }
    }
    return -1;
}

function downloadFile2($url, $id, $site) {
    $filename = getBetweenString($url, "filename%2A%3DUTF-8%27%27", "&");
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newfname = $site."_".$id.'.'.$extension;
    if(file_exists($newfname)) {
        return $newfname;
    }
    $file = fopen ($url, 'rb');
    if($file) {
        $newf = fopen("files/envato/".$newfname, 'wb');
        if($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if($file) {
        fclose($file);
    }
    if($newf) {
        fclose($newf);
    }
    return $newfname;
}
function downloadFile($url) {
    $path = parse_url($url, PHP_URL_PATH);
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $filename = pathinfo($path, PATHINFO_FILENAME);
    $newfname = $filename.'.'.$extension;
    if(file_exists($newfname)) {
        return $newfname;
    }
    $file = fopen($url, 'rb');
    if($file) {
        $newf = fopen($newfname, 'wb');
        if($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if($file) {
        fclose($file);
    }
    if($newf) {
        fclose($newf);
    }
    return $newfname;
}
function getFileSize($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $data = curl_exec($ch);
    $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);
    return (int) $size;
}
function isFind($string, $find) {
    $pos = stripos($string, $find);
    if($pos === false) {
        return false;
    }
    return true;
}
function removeBefore($string, $before) {
    $pos = strpos($string, $before);
    return $pos !== false ? substr($string, $pos + strlen($before), strlen($string)) : $in;
}
function removeAfter($string, $remove) {
    if(isFind($string, $remove)) {
        return substr($string, 0, (strpos($string, $remove) + strlen($remove)));
    }
    return $string;
}
function getFileNameFromURL($url) {
    $path = parse_url($url, PHP_URL_PATH);
    return basename($path);
}
function getContentType($file) {
    return mime_content_type($file);
}
function getStringNumbers($string) {
    $return = "";
    for($i = 0; $i < strlen($string); $i++) {
       if(is_numeric($string[$i])) {
           $return .= $string[$i];
       }
   }
   return $return;
}
function randomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function mimeToExtension($mime) {
    $mime_map = [
        'video/3gpp2'                                                               => '3g2',
        'video/3gp'                                                                 => '3gp',
        'video/3gpp'                                                                => '3gp',
        'application/x-compressed'                                                  => '7zip',
        'audio/x-acc'                                                               => 'aac',
        'audio/ac3'                                                                 => 'ac3',
        'application/postscript'                                                    => 'ai',
        'audio/x-aiff'                                                              => 'aif',
        'audio/aiff'                                                                => 'aif',
        'audio/x-au'                                                                => 'au',
        'video/x-msvideo'                                                           => 'avi',
        'video/msvideo'                                                             => 'avi',
        'video/avi'                                                                 => 'avi',
        'application/x-troff-msvideo'                                               => 'avi',
        'application/macbinary'                                                     => 'bin',
        'application/mac-binary'                                                    => 'bin',
        'application/x-binary'                                                      => 'bin',
        'application/x-macbinary'                                                   => 'bin',
        'image/bmp'                                                                 => 'bmp',
        'image/x-bmp'                                                               => 'bmp',
        'image/x-bitmap'                                                            => 'bmp',
        'image/x-xbitmap'                                                           => 'bmp',
        'image/x-win-bitmap'                                                        => 'bmp',
        'image/x-windows-bmp'                                                       => 'bmp',
        'image/ms-bmp'                                                              => 'bmp',
        'image/x-ms-bmp'                                                            => 'bmp',
        'application/bmp'                                                           => 'bmp',
        'application/x-bmp'                                                         => 'bmp',
        'application/x-win-bitmap'                                                  => 'bmp',
        'application/cdr'                                                           => 'cdr',
        'application/coreldraw'                                                     => 'cdr',
        'application/x-cdr'                                                         => 'cdr',
        'application/x-coreldraw'                                                   => 'cdr',
        'image/cdr'                                                                 => 'cdr',
        'image/x-cdr'                                                               => 'cdr',
        'zz-application/zz-winassoc-cdr'                                            => 'cdr',
        'application/mac-compactpro'                                                => 'cpt',
        'application/pkix-crl'                                                      => 'crl',
        'application/pkcs-crl'                                                      => 'crl',
        'application/x-x509-ca-cert'                                                => 'crt',
        'application/pkix-cert'                                                     => 'crt',
        'text/css'                                                                  => 'css',
        'text/x-comma-separated-values'                                             => 'csv',
        'text/comma-separated-values'                                               => 'csv',
        'application/vnd.msexcel'                                                   => 'csv',
        'application/x-director'                                                    => 'dcr',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
        'application/x-dvi'                                                         => 'dvi',
        'message/rfc822'                                                            => 'eml',
        'application/x-msdownload'                                                  => 'exe',
        'video/x-f4v'                                                               => 'f4v',
        'audio/x-flac'                                                              => 'flac',
        'video/x-flv'                                                               => 'flv',
        'image/gif'                                                                 => 'gif',
        'application/gpg-keys'                                                      => 'gpg',
        'application/x-gtar'                                                        => 'gtar',
        'application/x-gzip'                                                        => 'gzip',
        'application/mac-binhex40'                                                  => 'hqx',
        'application/mac-binhex'                                                    => 'hqx',
        'application/x-binhex40'                                                    => 'hqx',
        'application/x-mac-binhex40'                                                => 'hqx',
        'text/html'                                                                 => 'html',
        'image/x-icon'                                                              => 'ico',
        'image/x-ico'                                                               => 'ico',
        'image/vnd.microsoft.icon'                                                  => 'ico',
        'text/calendar'                                                             => 'ics',
        'application/java-archive'                                                  => 'jar',
        'application/x-java-application'                                            => 'jar',
        'application/x-jar'                                                         => 'jar',
        'image/jp2'                                                                 => 'jp2',
        'video/mj2'                                                                 => 'jp2',
        'image/jpx'                                                                 => 'jp2',
        'image/jpm'                                                                 => 'jp2',
        'image/jpeg'                                                                => 'jpeg',
        'image/jpg'                                                                 => 'jpg',
        'image/pjpeg'                                                               => 'jpeg',
        'application/x-javascript'                                                  => 'js',
        'application/json'                                                          => 'json',
        'text/json'                                                                 => 'json',
        'application/vnd.google-earth.kml+xml'                                      => 'kml',
        'application/vnd.google-earth.kmz'                                          => 'kmz',
        'text/x-log'                                                                => 'log',
        'audio/x-m4a'                                                               => 'm4a',
        'audio/mp4'                                                                 => 'm4a',
        'application/vnd.mpegurl'                                                   => 'm4u',
        'audio/midi'                                                                => 'mid',
        'application/vnd.mif'                                                       => 'mif',
        'video/quicktime'                                                           => 'mov',
        'video/x-sgi-movie'                                                         => 'movie',
        'audio/mpeg'                                                                => 'mp3',
        'audio/mpg'                                                                 => 'mp3',
        'audio/mpeg3'                                                               => 'mp3',
        'audio/mp3'                                                                 => 'mp3',
        'video/mp4'                                                                 => 'mp4',
        'video/mpeg'                                                                => 'mpeg',
        'application/oda'                                                           => 'oda',
        'audio/ogg'                                                                 => 'ogg',
        'video/ogg'                                                                 => 'ogg',
        'application/ogg'                                                           => 'ogg',
        'font/otf'                                                                  => 'otf',
        'application/x-pkcs10'                                                      => 'p10',
        'application/pkcs10'                                                        => 'p10',
        'application/x-pkcs12'                                                      => 'p12',
        'application/x-pkcs7-signature'                                             => 'p7a',
        'application/pkcs7-mime'                                                    => 'p7c',
        'application/x-pkcs7-mime'                                                  => 'p7c',
        'application/x-pkcs7-certreqresp'                                           => 'p7r',
        'application/pkcs7-signature'                                               => 'p7s',
        'application/pdf'                                                           => 'pdf',
        'application/octet-stream'                                                  => 'pdf',
        'application/x-x509-user-cert'                                              => 'pem',
        'application/x-pem-file'                                                    => 'pem',
        'application/pgp'                                                           => 'pgp',
        'application/x-httpd-php'                                                   => 'php',
        'application/php'                                                           => 'php',
        'application/x-php'                                                         => 'php',
        'text/php'                                                                  => 'php',
        'text/x-php'                                                                => 'php',
        'application/x-httpd-php-source'                                            => 'php',
        'image/png'                                                                 => 'png',
        'image/x-png'                                                               => 'png',
        'application/powerpoint'                                                    => 'ppt',
        'application/vnd.ms-powerpoint'                                             => 'ppt',
        'application/vnd.ms-office'                                                 => 'ppt',
        'application/msword'                                                        => 'doc',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/x-photoshop'                                                   => 'psd',
        'image/vnd.adobe.photoshop'                                                 => 'psd',
        'audio/x-realaudio'                                                         => 'ra',
        'audio/x-pn-realaudio'                                                      => 'ram',
        'application/x-rar'                                                         => 'rar',
        'application/rar'                                                           => 'rar',
        'application/x-rar-compressed'                                              => 'rar',
        'audio/x-pn-realaudio-plugin'                                               => 'rpm',
        'application/x-pkcs7'                                                       => 'rsa',
        'text/rtf'                                                                  => 'rtf',
        'text/richtext'                                                             => 'rtx',
        'video/vnd.rn-realvideo'                                                    => 'rv',
        'application/x-stuffit'                                                     => 'sit',
        'application/smil'                                                          => 'smil',
        'text/srt'                                                                  => 'srt',
        'image/svg+xml'                                                             => 'svg',
        'application/x-shockwave-flash'                                             => 'swf',
        'application/x-tar'                                                         => 'tar',
        'application/x-gzip-compressed'                                             => 'tgz',
        'image/tiff'                                                                => 'tiff',
        'font/ttf'                                                                  => 'ttf',
        'text/plain'                                                                => 'txt',
        'text/x-vcard'                                                              => 'vcf',
        'application/videolan'                                                      => 'vlc',
        'text/vtt'                                                                  => 'vtt',
        'audio/x-wav'                                                               => 'wav',
        'audio/wave'                                                                => 'wav',
        'audio/wav'                                                                 => 'wav',
        'application/wbxml'                                                         => 'wbxml',
        'video/webm'                                                                => 'webm',
        'image/webp'                                                                => 'webp',
        'audio/x-ms-wma'                                                            => 'wma',
        'application/wmlc'                                                          => 'wmlc',
        'video/x-ms-wmv'                                                            => 'wmv',
        'video/x-ms-asf'                                                            => 'wmv',
        'font/woff'                                                                 => 'woff',
        'font/woff2'                                                                => 'woff2',
        'application/xhtml+xml'                                                     => 'xhtml',
        'application/excel'                                                         => 'xl',
        'application/msexcel'                                                       => 'xls',
        'application/x-msexcel'                                                     => 'xls',
        'application/x-ms-excel'                                                    => 'xls',
        'application/x-excel'                                                       => 'xls',
        'application/x-dos_ms_excel'                                                => 'xls',
        'application/xls'                                                           => 'xls',
        'application/x-xls'                                                         => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
        'application/vnd.ms-excel'                                                  => 'xlsx',
        'application/xml'                                                           => 'xml',
        'text/xml'                                                                  => 'xml',
        'text/xsl'                                                                  => 'xsl',
        'application/xspf+xml'                                                      => 'xspf',
        'application/x-compress'                                                    => 'z',
        'application/x-zip'                                                         => 'zip',
        'application/zip'                                                           => 'zip',
        'application/x-zip-compressed'                                              => 'zip',
        'application/s-compressed'                                                  => 'zip',
        'multipart/x-zip'                                                           => 'zip',
        'text/x-scriptzsh'                                                          => 'zsh',
    ];

    return isset($mime_map[$mime]) ? $mime_map[$mime] : false;
}
function GetBetween($content, $start, $end) {
    $r = explode($start, $content);
    if(isset($r[1])) {
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
