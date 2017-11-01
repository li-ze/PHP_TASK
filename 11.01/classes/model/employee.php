<?php
namespace Model;
use Fuel\Core\DB;
use Fuel\Core\Model;
class Employee extends Model {
    /**
     * employee_idで社員情報をもらえる
     * @param $employee_id
     * @return object
     */
     public static function get_employee($employee_id){
        // 社員情報を取り出す
        return DB::query("SELECT t_employee.*, t_position.`position` AS `position`, t_affiliation.affiliation AS affiliation
                         FROM t_employee
                         LEFT JOIN t_position
                         ON t_employee.position_id = t_position.position_id
                         LEFT JOIN t_affiliation
                         ON t_employee.affiliation_id = t_affiliation.affiliation_id
                         WHERE employee_id = $employee_id
                         AND is_deleted = 0")
         ->execute();
    }

    /**
     * 全部の社員情報
     */
 public static function list_employee() {
        return DB::query('SELECT t_employee.*, t_position.`position` AS `position`, t_affiliation.affiliation AS affiliation
                         FROM t_employee
                         LEFT JOIN t_position
                         ON t_employee.position_id = t_position.position_id
                         LEFT JOIN t_affiliation
                         ON t_employee.affiliation_id = t_affiliation.affiliation_id
                         WHERE is_deleted = 0
        ')->execute();
    }

    /**
     * 根据输入条件查询员工
     * @param $condition
     * @return mixed
     */
    public static function search_employee($condition) {
         $condition = '\'%'.$condition.'%\'';
        return DB::query("SELECT t_employee.*, t_position.`position` AS `position`, t_affiliation.affiliation AS affiliation
                         FROM t_employee
                         LEFT JOIN t_position
                         ON t_employee.position_id = t_position.position_id
                         LEFT JOIN t_affiliation
                         ON t_employee.affiliation_id = t_affiliation.affiliation_id
                         WHERE t_position.position LIKE $condition
                         OR t_affiliation.affiliation LIKE $condition
                         OR name LIKE $condition
                         OR kana LIKE $condition
       ")->execute();
    }
    /**
     * 添加员工信息
     * @param $employee_props: position_id, affiliation_id, name, kana
     * @return list list($insert_id, $rows_affected)
     */
    public static function insert_employee($employee_props) {
         $employee_props['is_deleted'] = 0;
         return DB::insert('t_employee')
         ->set($employee_props)
         ->execute();
    }
    /**
     * 更新员工信息
     * @param $employee_props: employee_id, position_id, affiliation_id, name, kana
     * @return Integer 修改的条数
     */
    public static function update_employee($employee_props) {
         return DB::update('t_employee')
         ->set($employee_props)
         ->where('employee_id', '=', $employee_props['employee_id'])
         ->execute();
    }
    /**
     * 删除员工信息
     * @param $employee_id
     * @return Integer 删除的条数
     */
    public static function delete_employee($employee_id) {
         return DB::update('t_employee')
         ->value("is_deleted","1")
         ->where('employee_id', '=', $employee_id)
         ->execute();
    }
}
