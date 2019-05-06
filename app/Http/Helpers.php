<?php
namespace App\Http;
/**
 * Created by PhpStorm.
 * User: latif
 * Date: 2/16/19
 * Time: 9:07 AM
 */

class Helpers
{
    public static function makeOptions($data, $valueField = "id", $optionField = "name", $selectId = null )
    {
        $options = "";

        foreach ($data as $option) {

            $id = $option->{$valueField};
            
            if ($selectId == $id) {
                $options .= "<option value='" . $option->{$valueField} . "' selected>" . $option->{$optionField} . "</option>";
            } else {
                $options .= "<option value='" . $option->{$valueField} . "'>" . $option->{$optionField} . "</option>";
            }
        }

        return $options;
    }

}