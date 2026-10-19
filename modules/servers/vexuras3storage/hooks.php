<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\S3Storage\Module;
use Vexura\Whmcs\S3Storage\Registrar;
use Vexura\Whmcs\S3Storage\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('s3-storage', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('s3-storage', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('s3-storage'); });
