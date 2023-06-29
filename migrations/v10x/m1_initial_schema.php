<?php
/**
 *
 * Group Edit Time extension for the phpBB Forum Software package
 *
 * @copyright (c) 2023, Kailey Snay, https://www.snayhomelab.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kaileymsnay\groupedittime\migrations\v10x;

class m1_initial_schema extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_column_exists($this->table_prefix . 'groups', 'group_edit_time');
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v330\v330'];
	}

	/**
	 * Update database schema
	 */
	public function update_schema()
	{
		return [
			'add_columns'		=> [
				$this->table_prefix . 'groups'		=> [
					'group_enable_edit_time'			=> ['BOOL', 0],
					'group_edit_time'					=> ['UINT', 0],
				],
			],
		];
	}

	/**
	 * Revert database schema
	 */
	public function revert_schema()
	{
		return [
			'drop_columns'		=> [
				$this->table_prefix . 'groups'		=> [
					'group_enable_edit_time',
					'group_edit_time',
				],
			],
		];
	}
}
