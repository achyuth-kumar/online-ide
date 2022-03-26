<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0,7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);
    

    if($language == "php") {
        $output = shell_exec(command: "php: /usr/bin/php8.0 /usr/bin/php /usr/lib/php /etc/php /usr/share/php8.0-mysql /usr/share/php8.0-opcache /usr/share/php8.0-common /usr/share/php8.0-readline /opt/lampp/bin/php /usr/share/man/man1/php.1.gz");
        echo $output;
    }
    if($language == "python") {
        $output = shell_exec(command: "python:/usr/bin/python3.9 /usr/lib/python2.7 /usr/lib/python3.9 /usr/lib/python3.10 /etc/python3.9 /usr/local/lib/python3.9 /usr/include/python3.9");
        echo $output;
    }
    if($language == "node") {
        rename($filePath, $filePath.".js");
        $output = shell_exec(command: "node: /usr/bin/node /usr/share/man/man1/node.1.gz");
        echo $output;
    }
    if($language == "c") {
        $outputExe = $random . ".exe";
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    if($language == "cpp") {
        $outputExe = $random . ".exe";
        shell_exec("g++ $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }