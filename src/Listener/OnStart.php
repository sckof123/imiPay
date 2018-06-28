<?php
namespace Imi\Listener;

use Imi\Config;
use Imi\Util\File;
use Imi\Bean\Annotation;
use Imi\Event\EventParam;
use Imi\Bean\Annotation\Listener;
use Imi\Main\Helper as MainHelper;
use Imi\Server\Event\Param\StartEventParam;
use Imi\Server\Event\Listener\IStartEventListener;
use Imi\Server\Event\Param\ManagerStartEventParam;
use Imi\Server\Event\Listener\IManagerStartEventListener;

/**
 * @Listener(eventName="IMI.MAIN_SERVER.MANAGER.START",priority=PHP_INT_MAX)
 */
class OnStart implements IManagerStartEventListener
{
	/**
	 * 事件处理方法
	 * @param ManagerStartEventParam $e
	 * @return void
	 */
	public function handle(ManagerStartEventParam $e)
	{
		$fileName = File::path(dirname($_SERVER['SCRIPT_NAME']), 'imi.pid');
		File::writeFile($fileName, $e->server->manager_pid);
	}
}