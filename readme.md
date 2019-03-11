# PHP Web Logfile Watcher



## Introduction

This is a PHP-based web log file watching utility similar to the Linux/Unix `tail` command. This utility is currently based around Apache v2 but can be extended in the future to support additional web servers.



## Setup

By default, Apache is not able to view the /var/log/apache2/ log files.
This is necessary for this script to work.

To allow it, you need to enable apache (and therefore php) to run two commands using sudo without a password:

```bash
/usr/bin/tail -f /var/log/apache2/[filename]
/bin/ls /var/log/apache2/[filename]
```



### Step 1)

Run two commands with sudo to enable them:

```bash
sudo echo 'www-data  ALL=(:adm) NOPASSWD:/usr/bin/tail -f /var/log/apache2/*' >> /etc/sudoers
sudo echo 'www-data  ALL=(:adm) NOPASSWD:/bin/ls /var/log/apache2/*' >> /etc/sudoers
```



### Step 2)

Upload this script to your web server.



## Usage:

Just browse to the script you uploaded to your webserver, passing in the name of an apache log
file you want to tail in the format of:
`log=[filename]`

### Example:

`https://site.com/tail.php?log=error.log`



## Customization:

### Themes

There are several themes available that you can switch between.

```css
black_on_white
black_on_gray
white_on_blue
yellow_on_blue
white_on_gray
white_on_black
gray_on_black
gray_on_gray
yellow_on_gray
yellow_on_black
red_on_gray
red_on_black
yellow_on_brown
white_on_brown
white_on_orange
```

By default gray_on_black is enabled. To change this, you can edit the index.php script and update the value on the line:

```php
$style = 'gray_on_black';
```

You can also add additional ones if you so desire, by editing the style.css file.

### Text Size

By default, the text size is 14pt. To change this, you can edit the index.php script and update the value on the line:

```php
$text_size = 14;
```

