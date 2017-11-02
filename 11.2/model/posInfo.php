<?php
namespace Model;

class PosInfo extends \Model
{

    public static function get_pos($e_id)
    {
        $sql = "SELECT position FROM position p
                    INNER JOIN employee e
                            ON p.p_id = e.p_id
                    WHERE e_id = $e_id";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function get_position()
    {
        $sql = "SELECT * from  position";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function get_pid($position)
    {
        $sql = "SELECT p_id FROM position WHERE position = '$position'";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }
}