<?php
/**
 * @package     Joomla.Cli
 * @subpackage  JConsole
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Command\Sqlsync\Profile;

use JConsole\Command\JCommand;
use Sqlsync\Model\Profile\ProfilesModel;

defined('JCONSOLE') or die;

/**
 * Class Profile
 *
 * @package     Joomla.Cli
 * @subpackage  JConsole
 *
 * @since       3.2
 */
class Profile extends JCommand
{
	/**
	 * An enabled flag.
	 *
	 * @var bool
	 */
	public static $isEnabled = true;

	/**
	 * Console(Argument) name.
	 *
	 * @var  string
	 */
	protected $name = 'profile';

	/**
	 * The command description.
	 *
	 * @var  string
	 */
	protected $description = 'Profiles.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'profile <cmd><command></cmd> <option>[option]</option>';

	/**
	 * Configure command information.
	 *
	 * @return void
	 */
	public function configure()
	{
		// $this->addArgument();
	}

	/**
	 * Execute this command.
	 *
	 * @return int|void
	 */
	protected function doExecute()
	{
		$model = new ProfilesModel;

		$profiles = $model->getItems();

		$this->out();

		foreach ($profiles as $profile)
		{
			$this->out(($profile->is_current ? '*' : ' ') . ' ', false);

			$this->out($profile->title);
		}
	}
}
