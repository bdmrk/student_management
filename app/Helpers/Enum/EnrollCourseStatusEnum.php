<?php
/**
 * Created by PhpStorm.
 * User: latif
 * Date: 3/8/19
 * Time: 12:35 AM
 */

namespace App\Helpers\Enum;


class EnrollCourseStatusEnum extends BasicEnum
{
    const Running = "Running";
    const Passed = "Passed";
    const Failed = "Failed";
    const Retake = "Retake";
}