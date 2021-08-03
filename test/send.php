<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Textmagic\TextmagicClient;

require __DIR__ . '/../vendor/autoload.php';

$client = new TextmagicClient('ashleybailey', 'JuHsUPJjzj1HPZs8Hn3ZYfqyFtzMpe');
$OPTIONS = [
    'from' => 'AshleyParty'
];

$client->Send('This is a test', array('07908171250'), array('from' => 'AshleyParty'));
