<?php
require_once __DIR__ . '/vendor/autoload.php';

use Parsedown;

$markdown = $_POST['markdown'] ?? '';
$action = $_POST['action'] ?? 'display';

$parser = new Parsedown();
$html = $parser->text($markdown);

if ($action === 'download') {
    header('Content-Type: text/html');
    header('Content-Disposition: attachment; filename="converted.html"');
    echo $html;
} else {
    echo $html;
}
