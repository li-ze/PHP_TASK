<?php

/* class Model_Position extends Orm\Model {
	protected static $_table_name = 't_position';
	protected static $_primary_key = array('position_id');
	protected static $_properties = array(
			'position_id',
			'position' => array(
					'data_type'   => 'varchar',
					// 对数据的验证，此处为必须
					'validation'  => array('required'),
			),
	);

	public static function list_position(){
		return self::find('all');
	}


} */
namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Model;
class Position extends Model {
	/**
	 * 列出所有的职位
	 */
	public static function list_position() {
		return DB::query('SELECT * FROM t_position')->execute();
	}

	public static function get_position($position_id){
		return DB::query("SELECT * FROM t_position
				WHERE position_id =$position_id")->execute();
	}

}