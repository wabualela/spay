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
 * SPAY Sudani Payment enrol plugin implementation.
 *
 * @package    enrol_spay
 * @copyright  2010 Petr Skoda  {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");
require_once($CFG->dirroot . '/enrol/locallib.php');

/**
 * Check if the given password match a group enrolment key in the specified course.
 *
 * @param  int $courseid            course id
 * @param  string $enrolpassword    enrolment password
 * @return bool                     True if match
 * @since  Moodle 3.0
 */
function enrol_spay_check_group_enrolment_key($courseid, $enrolpassword)
{
    global $DB;

    $found = false;
    $groups = $DB->get_records('groups', array('courseid' => $courseid), 'id ASC', 'id, enrolmentkey');

    foreach ($groups as $group) {
        if (empty($group->enrolmentkey)) {
            continue;
        }
        if ($group->enrolmentkey === $enrolpassword) {
            $found = true;
            break;
        }
    }
    return $found;
}

class enrol_spay_enrol_form extends moodleform
{
    protected $instance;
    protected $toomany = false;

    /**
     * Overriding this function to get unique form id for multiple spay enrolments.
     *
     * @return string form identifier
     */
    protected function get_form_identifier()
    {
        $formid = $this->_customdata->id . '_' . get_class($this);
        return $formid;
    }

    public function definition()
    {
        global $USER, $OUTPUT, $CFG, $DB;
        $mform = $this->_form;
        $instance = $this->_customdata;
        $this->instance = $instance;
        $plugin = enrol_get_plugin('spay');
        
        $record = $DB->get_record('enrol_spay', array('instanceid' => $instance->id, 'userid' => $USER->id, 'courseid' => $instance->courseid),'*', IGNORE_MISSING);
        $services = array();
            foreach (explode("\n", $plugin->get_config('servicecodes')) as $service) {
                $tmp = explode("|", $service);
                $services[$tmp[0]]['code'] =  $tmp[1];
                $services[$tmp[0]]['cost'] =  intval($tmp[2]);
            }
            
        $heading = $plugin->get_instance_name($instance);
        $mform->addElement('header', 'spayheader', $heading);

        if ($record) {
            
            $mform->addElement('text', 'pin', get_string('pin', 'enrol_spay'));
            $mform->setType('pin', PARAM_INT);
            $mform->addHelpButton('pin', 'pin', 'enrol_spay');

            $mform->addElement('static', '', get_string('subscriptioncost', 'enrol_spay'), $services[$heading]['cost'] . ' ' . get_string('subscriptionamount', 'enrol_spay'));
            
            $this->add_action_buttons(false, get_string('enrolmenow', 'enrol_spay'));
        } else {

            $mform->addElement('text', 'msisdn', get_string('msisdn', 'enrol_spay'));
            $mform->setType('msisdn', PARAM_TEXT);
            $mform->addHelpButton('msisdn', 'msisdn', 'enrol_spay');

            
         
            $mform->addElement('static', '', get_string('subscriptioncost', 'enrol_spay'), $services[$heading]['cost'] . get_string('subscriptionamount', 'enrol_spay'));
            
            $this->add_action_buttons(false, get_string('enrolme', 'enrol_spay'));
        }



        $mform->addElement('hidden', 'servicecost');
        $mform->setType('servicecost', PARAM_INT);
        $mform->setDefault('servicecost', $services[$heading]['cost']);

        $mform->addElement('hidden', 'servicecode');
        $mform->setType('servicecode', PARAM_TEXT);
        $mform->setDefault('servicecode', $services[$heading]['code']);

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        $mform->setDefault('id', $instance->courseid);

        $mform->addElement('hidden', 'instance');
        $mform->setType('instance', PARAM_INT);
        $mform->setDefault('instance', $instance->id);
    }

    public function validation($data, $files)
    {
        global $DB, $CFG;

        $errors = parent::validation($data, $files);
        $instance = $this->instance;
        
        if ($this->toomany) {
            $errors['notice'] = get_string('error');
            return $errors;
        }

       if(array_key_exists('msisdn', $data) && $data['msisdn'] === ''){
            $errors['msisdn'] = get_string('msisdnempty', 'enrol_spay');
        }
        
        if( array_key_exists('msisdn', $data) && 
            preg_match("/^[0-9]/", $data['msisdn']) &&
            strlen($data['msisdn']) !== 12
            ){
            $errors['msisdn'] = get_string('misdnnotvalid', 'enrol_spay');
            
        }

        if(array_key_exists('pin', $data) && $data['pin'] === ''){
            $errors['pin'] = get_string('pinempty', 'enrol_spay');
        }

        return $errors;
    }
}
