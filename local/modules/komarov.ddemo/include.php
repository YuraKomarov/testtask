<?php
Bitrix\Main\Loader::registerAutoloadClasses(
    "komarov.ddemo",
    array(
        "Komarov\\Ddemo\\Test" => "lib/test.php",
        "Komarov\\Ddemo\\LinkType" => "lib/LinkType.php",
        "Komarov\\Ddemo\\hlMigration" => "install/db/hlMigration.php",
    )
);