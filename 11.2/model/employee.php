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
     public static function get_employee($e_id){
        // 社員情報を取り出す
        return DB::query("SELECT e.* , a.affiliation , p.position
                    FROM employee e
                 INNER JOIN affiliation a ON e.a_id = a.a_id
                 INNER JOIN position p  ON e.p_id = p.p_id
                 where deleted='0'")
         ->execute();
    }
    public static function get_count()
    {
        return DB::query ('SELECT COUNT(*) AS count FROM employee
                 where deleted= 0 ')->execute();

    }

    /**
     * 全部の社員情報
     */
 public static function list_employee() {
        return DB::query('SELECT employee.*, position.`position` AS `position`, affiliation.affiliation AS affiliation
                         FROM employee
                         LEFT JOIN position
                         ON employee.p_id = position.p_id
                         LEFT JOIN affiliation
                         ON employee.a_id = affiliation.a_id
                         WHERE deleted = 0
        ')->execute();
    }

    /**
     * 根据输入条件查询员工
     * @param $condition
     * @return mixed
     */
    public static function search_employee($condition) {
         $condition = '\'%'.$condition.'%\'';
        return DB::query("SELECT employee.*, position.`position` AS `position`, affiliation.affiliation AS affiliation
                         FROM employee
                         LEFT JOIN position
                         ON employee.p_id = position.p_id
                         LEFT JOIN affiliation
                         ON employee.a_id = affiliation.a_id
                         WHERE position.position LIKE $condition
                         OR affiliation.affiliation LIKE $condition
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
         $employee_props['deleted'] = 0;
         return DB::insert('employee')
         ->set($employee_props)
         ->execute();
    }
    /**
     * 更新员工信息
     * @param $employee_props: employee_id, position_id, affiliation_id, name, kana
     * @return Integer 修改的条数
     */
    public static function update_employee($employee_props) {
         return DB::update('employee')
         ->set($employee_props)
         ->where('e_id', '=', $employee_props['e_id'])
         ->execute();
    }
    /**
     * 删除员工信息
     * @param $employee_id
     * @return Integer 删除的条数
     */
    public static function delete_employee($e_id) {
         return DB::update('employee')
         ->value("deleted","1")
         ->where('e_id', '=', $e_id)
         ->execute();
    }
}
