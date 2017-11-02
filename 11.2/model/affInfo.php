<?php
namespace Model;

class AffInfo extends \Model
{

    public static function get_aff($e_id)
    {
        $sql = "SELECT affiliation FROM affiliation a
                    INNER JOIN employee e
                            ON a.a_id = e.a_id
                    WHERE e_id = $e_id";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function get_affiliation()
    {
        $sql = "SELECT * from  affiliation";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }

    public static function get_aid($affiliation)
    {
        $sql = "SELECT a_id FROM affiliation WHERE affiliation = '$affiliation'";
        $query = \DB::query($sql)->execute();
        return $query->as_array();
    }
}