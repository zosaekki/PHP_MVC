<h1>hello, <?=$_GET["url"]?></h1>
<?php
    require_once 'application/libs/Config.php';
    require_once 'application/libs/Autoload.php';
    new application\libs\Application();