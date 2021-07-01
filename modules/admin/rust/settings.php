<?php


namespace IPS\rconrust\modules\admin\rust;

/* To prevent PHP errors (extending class does not exist) revealing path */

if (!\defined('\IPS\SUITE_UNIQUE_KEY')) {
	header((isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0') . ' 403 Forbidden');
	exit;
}

/**
 * settings
 */
class _settings extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		\IPS\Dispatcher::i()->checkAcpPermission('settings_manage');
		parent::execute();
	}

	/**
	 * ...
	 *
	 * @return	void
	 */
	protected function manage()
	{
		\IPS\Dispatcher::i()->checkAcpPermission('settings_manage');

		$form = $this->getForm();
		if ($values = $form->values(TRUE)) {
			$form->saveAsSettings($values);
			\IPS\Session::i()->log('acplogs__rust_settings');
			\IPS\Member::clearCreateMenu();
		}

		\IPS\Output::i()->title = \IPS\Member::loggedIn()->language()->addToStack('menu__rust_settings');
		\IPS\Output::i()->output = $form;
	}

	protected function getForm()
	{
		$form = new \IPS\Helpers\Form;

		$form->addTab('rust__gen_settings');
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_ip',
			\IPS\Settings::i()->rust_ip,
			false,
			array(),
			null,
			null,
			null,
			'rust_ip'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_port',
			\IPS\Settings::i()->rust_port,
			false,
			array(),
			null,
			null,
			null,
			'rust_port'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_password',
			\IPS\Settings::i()->rust_password,
			false,
			array(),
			null,
			null,
			null,
			'rust_password'
		));


		$form->addTab('rust__discord');
		$form->add(new \IPS\Helpers\Form\YesNo('enable_discord', \IPS\Settings::i()->enable_discord, TRUE, array('togglesOn' => array('discord_hook', 'botusername', 'discord_author_url', 'discord_title', 'discord_author_name', 'description', 'discord_color',))));
		$form->add(new \IPS\Helpers\Form\Text(
			'discord_hook',
			\IPS\Settings::i()->discord_hook,
			false,
			array(),
			null,
			null,
			null,
			'discord_hook'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'botusername',
			\IPS\Settings::i()->botusername,
			false,
			array(),
			null,
			null,
			null,
			'botusername'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'discord_title',
			\IPS\Settings::i()->discord_title,
			false,
			array(),
			null,
			null,
			null,
			'discord_title'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'description',
			\IPS\Settings::i()->description,
			false,
			array(),
			null,
			null,
			null,
			'description'
		));
		$form->add(new \IPS\Helpers\Form\Color(
			'discord_color',
			\IPS\Settings::i()->discord_color,
			false,
			array(),
			null,
			null,
			null,
			'discord_color'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'discord_author_name',
			\IPS\Settings::i()->discord_author_name,
			false,
			array(),
			null,
			null,
			null,
			'discord_author_name'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'discord_author_url',
			\IPS\Settings::i()->discord_author_url,
			false,
			array(),
			null,
			null,
			null,
			'discord_author_url'
		));







		$form->addTab('rust_product_1_title');
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_1_on', \IPS\Settings::i()->rust_product_1_on, TRUE, array('togglesOn' => array('rust_product_1_comamnd',   'rust_product_1_arguments', 'rust_product_1_steamID', 'rust_product_1_products'))));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_1_comamnd',
			\IPS\Settings::i()->rust_product_1_comamnd,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_1_comamnd'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_1_arguments',
			\IPS\Settings::i()->rust_product_1_arguments,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_1_arguments'
		));
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_1_steamID', \IPS\Settings::i()->rust_product_1_steamID));
		$form->add(new \IPS\Helpers\Form\Node('rust_product_1_products', (\IPS\Settings::i()->rust_product_1_products) ? explode(',', \IPS\Settings::i()->rust_product_1_products) : 0, FALSE, array('class' => '\IPS\nexus\Package',  'multiple' => TRUE), NULL, NULL, NULL, 'rust_product_1_products'));


		$form->addTab('rust_product_2_title');
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_2_on', \IPS\Settings::i()->rust_product_2_on, TRUE, array('togglesOn' => array('rust_product_2_comamnd', 'rust_product_2_arguments', 'rust_product_2_steamID', 'rust_product_2_products'))));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_2_comamnd',
			\IPS\Settings::i()->rust_product_2_comamnd,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_2_comamnd'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_2_arguments',
			\IPS\Settings::i()->rust_product_2_arguments,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_2_arguments'
		));
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_2_steamID', \IPS\Settings::i()->rust_product_2_steamID));
		$form->add(new \IPS\Helpers\Form\Node('rust_product_2_products', (\IPS\Settings::i()->rust_product_2_products) ? explode(',', \IPS\Settings::i()->rust_product_2_products) : 0, FALSE, array('class' => '\IPS\nexus\Package',  'multiple' => TRUE), NULL, NULL, NULL, 'rust_product_2_products'));


		$form->addTab('rust_product_3_title');
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_3_on', \IPS\Settings::i()->rust_product_3_on, TRUE, array('togglesOn' => array('rust_product_3_comamnd',  'rust_product_3_arguments', 'rust_product_3_steamID', 'rust_product_3_products'))));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_3_comamnd',
			\IPS\Settings::i()->rust_product_3_comamnd,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_3_comamnd'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_3_arguments',
			\IPS\Settings::i()->rust_product_3_arguments,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_3_arguments'
		));

		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_3_steamID', \IPS\Settings::i()->rust_product_3_steamID));
		$form->add(new \IPS\Helpers\Form\Node('rust_product_3_products', (\IPS\Settings::i()->rust_product_3_products) ? explode(',', \IPS\Settings::i()->rust_product_3_products) : 0, FALSE, array('class' => 'IPS\nexus\Package',  'multiple' => TRUE), NULL, NULL, NULL, 'rust_product_3_products'));



		$form->addTab('rust_product_4_title');
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_4_on', \IPS\Settings::i()->rust_product_4_on, TRUE, array('togglesOn' => array('rust_product_4_comamnd', 'rust_product_4_arguments',  'rust_product_4_steamID', 'rust_product_4_products'))));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_4_comamnd',
			\IPS\Settings::i()->rust_product_4_comamnd,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_4_comamnd'
		));
		$form->add(new \IPS\Helpers\Form\Text(
			'rust_product_4_arguments',
			\IPS\Settings::i()->rust_product_4_arguments,
			false,
			array(),
			null,
			null,
			null,
			'rust_product_4_arguments'
		));
		$form->add(new \IPS\Helpers\Form\YesNo('rust_product_4_steamID', \IPS\Settings::i()->rust_product_4_steamID));
		$form->add(new \IPS\Helpers\Form\Node('rust_product_4_products', (\IPS\Settings::i()->rust_product_4_products) ? explode(',', \IPS\Settings::i()->rust_product_4_products) : 0, FALSE, array('class' => 'IPS\nexus\Package',  'multiple' => TRUE), NULL, NULL, NULL, 'rust_product_4_products'));




		return $form;
	}
}
