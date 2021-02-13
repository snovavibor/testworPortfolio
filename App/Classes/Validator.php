<?php


class Validator
{
    
    public static function ch_filter(&$data)
    {
        foreach ($data as $val) {

            $val = trim($val);
            $val = stripslashes($val);
            $val = strip_tags($val);
            $val = htmlentities($val);
        }

        return $data;
    }


    /**
     * проверяет на пустоту полей формы 
     *
     * @param [array] $data
     * @return void
     */
    public static function chekData(&$data)
    {
        foreach ($data as &$val) {
            if (empty($val)) {
                return true;
            }
        }
        return false;
    }
}