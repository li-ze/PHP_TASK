<?php
/*  class Model_Affiliation extends Orm\Model{

	protected static $_table_name = 't_affiliation';
	protected static $_primary_key = array('affiliation_id');
	protected static $properties = array(
		'affiliation_id',
		'affiliation' =>array(
				'data_type'   => 'varchar',
				'validation'  =>array('required'),

		),
	);


	public static function list_affiliation(){
		return self ::find( 'all');
	}

}  */


namespace Model;
use Fuel\Core\Model;
use Fuel\Core\DB;

class Affiliation extends Model{
	/**
	 * 列出所有的 Affiliation
	 */
	public static function list_affiliation(){
return	DB::query('SELECT * FROM t_affiliation')->execute();

	}

	public static function get_affiliation($affiliation_id){
		return DB::query("SELECT * FROM t_affiliation
						WHERE affiliation_id = $affiliation_id")->execute();

	}
}


