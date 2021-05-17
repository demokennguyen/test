<?php

$app_root = dirname(__FILE__);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
