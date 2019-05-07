<?php
/**
 * Created by PhpStorm.
 * User: latif
 * Date: 3/8/19
 * Time: 12:35 AM
 */

namespace App\Helpers\Enum;


class StudentStatus extends BasicEnum
{
    const Applied = "Applied";
    const Admitted = "Admitted";
    const Rejected = "Rejected";
    const Selected = "Selected";
    const Enrolled = "Enrolled";
    const Completed = "Completed";

}
