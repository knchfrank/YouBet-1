<?php

function getConnection() {
    define('DB_SERVER', 'db.maintenance.pupu.life');
    define('DB_USERNAME', 'developer');
    define('DB_PASSWORD', 'pNMyyv2xXOh1kMzO');
    define('DB_NAME', 'youbet');
    return new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
}