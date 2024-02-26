<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin settings
 *
 *
 * @package    local_culcourse_visibility
 * @copyright  2017 Amanda Doughty
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    global $DB;

    $settings = new admin_settingpage('local_culcourse_visibility', 'CUL Course Visibility');
    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_configcheckbox(
        'local_culcourse_visibility/showcourses',
        get_string('showcourses', 'local_culcourse_visibility'),
        get_string('showcourses_desc', 'local_culcourse_visibility'),
        1
        )
    );

    // Add setting for days before course start date to show courses
    $settings->add(new admin_setting_configtext(
        'local_culcourse_visibility/daysbeforeshow',
        get_string('daysbeforeshow', 'local_culcourse_visibility'),
        get_string('daysbeforeshow_desc', 'local_culcourse_visibility'),
        7, // Default value: 7 days
        PARAM_INT // Type of parameter: integer
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_culcourse_visibility/hidecourses',
        get_string('hidecourses', 'local_culcourse_visibility'),
        get_string('hidecourses_desc', 'local_culcourse_visibility'),
        0
        )
    );

    // Add setting for days after course end date to hide courses
    $settings->add(new admin_setting_configtext(
        'local_culcourse_visibility/daysafterhide',
        get_string('daysafterhide', 'local_culcourse_visibility'),
        get_string('daysafterhide_desc', 'local_culcourse_visibility'),
        30, // Default value: 30 days
        PARAM_INT // Type of parameter: integer
    ));

}

