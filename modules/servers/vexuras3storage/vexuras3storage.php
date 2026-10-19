<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\S3Storage\Module;
use Vexura\Whmcs\S3Storage\Registrar;
use Vexura\Whmcs\S3Storage\Automation;

/** S3 Storage: WHMCS MetaData callback. */
function vexuras3storage_MetaData(): array
{
    return ['DisplayName' => 'Vexura · S3 Storage', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** S3 Storage: WHMCS ConfigOptions callback. */
function vexuras3storage_ConfigOptions(): array
{
    return Module::config('s3-storage');
}

/** S3 Storage: WHMCS TestConnection callback. */
function vexuras3storage_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** S3 Storage: WHMCS ClientArea callback. */
function vexuras3storage_ClientArea(array $params): array
{
    return Module::clientArea('s3-storage', $params);
}

/** S3 Storage: WHMCS AdminCustomButtonArray callback. */
function vexuras3storage_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** S3 Storage: WHMCS CreateAccount callback. */
function vexuras3storage_CreateAccount(array $params): string
{
    return Module::run('s3-storage', 'create', $params);
}

/** S3 Storage: WHMCS RefreshStatus callback. */
function vexuras3storage_RefreshStatus(array $params): string
{
    return Module::run('s3-storage', 'create', $params);
}

/** S3 Storage: WHMCS SyncPaidInvoices callback. */
function vexuras3storage_SyncPaidInvoices(array $params): string
{
    return Module::run('s3-storage', 'sync', $params);
}

/** S3 Storage: WHMCS TerminateAccount callback. */
function vexuras3storage_TerminateAccount(array $params): string
{
    return Module::run('s3-storage', 'terminate', $params);
}

/** S3 Storage: WHMCS SuspendAccount callback. */
function vexuras3storage_SuspendAccount(array $params): string
{
    return Module::run('s3-storage', 'suspend', $params);
}

/** S3 Storage: WHMCS UnsuspendAccount callback. */
function vexuras3storage_UnsuspendAccount(array $params): string
{
    return Module::run('s3-storage', 'unsuspend', $params);
}
