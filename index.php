<?php
/* PHP Web Logfile Watcher */

// Style Sheet Class/Theme to use
$style = 'gray_on_black';

// Text Size in Points
$text_size = 14;

// Path to your log directory
$log_dir = '/var/log/apache2/';

// Log Directory permission group
$linux_group = 'adm';

?>
<html>
<head>
<title>PHP Web Logfile Watcher</title>
<link rel="stylesheet" href="style.css">
</head>

<body class="<?=$style?>">
<script type="text/javascript" src="script.js"></script>

<div style="font-size: <?=$text_size?>pt;">
<?php

$input = trim(filter_input(INPUT_GET, 'log', FILTER_SANITIZE_STRING));

// Test for directory traversal
if (strpos($input, '..' . DIRECTORY_SEPARATOR) !== false) {
    die('Directory traversal is not allowed.');
}

// Test for wildcards
if (strpos($input, '*') !== false) {
    die('Wildcards are not allowed.');
}
$log_file = $log_dir . $input;

$file_check = trim(shell_exec("sudo -g $linux_group /bin/ls $log_file"));

if ($log_file == trim($file_check)) {
    $handle = popen("sudo -g $linux_group /usr/bin/tail -f $log_file", 'r');
    while(!feof($handle)) {
        $buffer = fgets($handle);
        echo "<p>$buffer</p>\n";
        ob_flush();
        flush();
    }
    pclose($handle);
} else {
    print "Could not find log file.";
}

?>
</div>
</body>
</html>
