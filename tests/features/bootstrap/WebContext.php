<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class WebContext implements Context
{
	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context instance.
	 * You can also pass arbitrary arguments to the
	 * context constructor through behat.yml.
	 */
	public function __construct()
	{
	}

	/**
	 * @Given there is a fresh instance of :arg1 with database :arg2
	 */
	public function thereIsAFreshInstanceOfWithDatabase($arg1, $arg2)
	{
		$joomla   = $this->splitVersion($arg1);
		$database = $this->splitVersion($arg2);

		echo "Checking if " . implode(':', $joomla) . " can be installed with " . implode(':', $database);

		$this->validateApp($joomla, ['joomla']);
		$this->validateApp($database, ['mysql', 'postresql']);

		throw new PendingException();
	}

	/**
	 * @param $arg
	 *
	 * @return array
	 */
	protected function splitVersion($arg)
	{
		$app = explode(' ', $arg, 2);

		if (count($app) == 1)
		{
			$app[1] = 'latest';
		}

		if ($app[0] == 'latest')
		{
			$app = array_reverse($app);
		}

		array_walk($app, function (&$item)
		{
			$item = strtolower($item);
		});

		return $app;
	}

	/**
	 * @param $app
	 * @param $supported
	 */
	protected function validateApp($app, $supported)
	{
		if (!in_array($app[0], $supported))
		{
			$appList = implode(', ', $supported);
			throw new UnexpectedValueException("{$app[0]} is not supported. Use one of [{$appList}]");
		}
	}

	/**
	 * @When I install the extension :arg1
	 */
	public function iInstallTheExtension($arg1)
	{
		throw new PendingException();
	}

	/**
	 * @Then I should see :arg1 in the :arg2 menu
	 */
	public function iShouldSeeInTheMenu($arg1, $arg2)
	{
		throw new PendingException();
	}
}
