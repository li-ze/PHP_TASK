<?php
namespace Model;

class EmpInfo extends \Model
{

    public static function get_info()
    {
        $sql = "SELECT e.e_id , e.e_name1 , e.e_name2 , e.e_img , e.e_info , a.affiliation , p.position
                    FROM employee e
                 INNER JOIN affiliation a ON e.a_id = a.a_id
                 INNER JOIN position p  ON e.p_id = p.p_id
                 where deleted='0'";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function get_emp($e_id)
    {
        $sql = "SELECT * FROM employee where e_id='$e_id' and deleted='0' ";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function del_emp($e_id)
    {
        $query = \DB::update('employee')->value('deleted', '1')->where('e_id', $e_id)->execute();
        return $query;
    }

    public static function add_emp($data)
    {
        $query = \DB::insert('employee')->set($data)->execute();
        return $query;
    }

    public static function add_id()
    {
        $sql = " SELECT auto_increment FROM information_schema.tables where table_schema='php_test' and table_name='employee' ";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function up_emp($data)
    {
        $query = \DB::update('employee')->set($data)
            ->where('e_id', $data['e_id'])
            ->execute();
        return $query;
    }
}
