<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Contract\ApplicationInterface;
use Hyperf\Contract\ConfigInterface;
use Hyperf\DbConnection\Db;
use Hyperf\Di\ClassLoader;
use Hyperf\Engine\DefaultOption;
use Swoole\Runtime;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use function Hyperf\Config\config;
use function Swoole\Coroutine\run;

/**
 * This file is part of Hyperf.
 *
 * @see     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');

error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');

Runtime::enableCoroutine(true);

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require BASE_PATH . '/vendor/autoload.php';

! defined('SWOOLE_HOOK_FLAGS') && define('SWOOLE_HOOK_FLAGS', DefaultOption::hookFlags());

ClassLoader::init();

$container = require BASE_PATH . '/config/container.php';

run(function () {
  //  Db::getConnection()->statement('CREATE DATABASE IF NOT EXISTS `' . config('db_testing') . '`');
});

$config = $container->get(ConfigInterface::class);

if ($config->get('app_env') === 'dev' || $config->get('app_env') === 'testing') {
    $config->set('databases.default.database','testing');
}

$container->get(ApplicationInterface::class);

run(function () use ($container) {
    $container->get('Hyperf\Database\Commands\Migrations\FreshCommand')->run(
        new StringInput(''),
        new ConsoleOutput()
    );
});