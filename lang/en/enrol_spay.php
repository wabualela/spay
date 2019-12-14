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
 * Strings for component 'enrol_spay', language 'en'.
 *
 * @package    enrol_spay
 * @copyright  2015 Dualcube, Arkaprava Midya, Parthajeet Chakraborty
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$string['addtogroup'] = 'Add to group';
$string['addtogroup_help'] = 'If you select a group here, then when a user completes the payment process and is enrolled in this course, they will be added to this group.';
$string['assignrole'] = 'Assign role';
$string['assignrole_help'] = 'If you select a role here, then when a user completes the payment process and is enrolled in this course, they will be assigned this role.';
$string['btntext']= 'Pay Now';
$string['cost'] = 'Enrol cost';
$string['cost_desc'] = 'Cost in Sudanese Pound (SDG)';
$string['costerror'] = 'The enrolment cost is not numeric';
$string['costorkey'] = 'Please choose one of the following methods of enrolment.';
$string['customwelcomemessage'] = 'Custom welcome message';
$string['customwelcomemessage_help'] = 'If you enter some text here, it will be shown instead of the standard text "This course requires a payment for entry." on the Enrolment options page that students see when they attempt to access a course they are not enrolled in. If you leave this blank, the standard text will be used.';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during SPAY (Sudani Payment) enrolments';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['enrolenddaterror'] = 'Enrolment end date cannot be earlier than start date';
$string['enrolmentnew']='New Enrolment';
$string['enrolmentnewuser']='New User Enrolment';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid. If set to zero, the enrolment duration will be unlimited by default.';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['expiredaction'] = 'Enrolment expiration action';
$string['expiredaction_help'] = 'Select action to carry out when user enrolment expires. Please note that some user data and settings are purged from course during course unenrolment.';
$string['mailadmins'] = 'Notify admin';
$string['mailstudents'] = 'Notify students';
$string['mailteachers'] = 'Notify teachers';
$string['messageprovider:spay_enrolment'] = 'SPAY (Sudani Payment) enrolment messages';
$string['nocost'] = 'There is no cost associated with enrolling in this course!';
$string['paymentthanks']='Thanks for your payment';
$string['spay:config'] = 'Configure SPAY (Sudani Payment) enrol instances';
$string['spay:manage'] = 'Manage enrolled users';
$string['spay:unenrol'] = 'Unenrol users from course';
$string['spay:unenrolself'] = 'Unenrol self from the course';
$string['spayaccepted'] = 'SPAY payments accepted';
$string['pluginname'] = 'SPAY Sudani Payment';
$string['pluginname_desc'] = 'The SPAY Sudani Payment module allows you to set up paid courses.  If the cost for any course is zero, then students are not asked to pay for entry.  There is a site-wide cost that you set here as a default for the whole site and then a course setting that you can set for each course individually. The course cost overrides the site cost.';
$string['sendpaymentbutton'] = 'Send payment via SPAY (Sudani Payment)';
$string['status'] = 'Allow SPAY (Sudani Payment) enrolments';
$string['status_desc'] = 'Allow users to use SPAY (Sudani Payment) to enrol into a course by default.';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';
$string['messageprovider:spay_enrolment'] = 'Message Provider';
$string['maxenrolled'] = 'Max enrolled users';
$string['maxenrolled_help'] = 'Specifies the maximum number of users that can spay enrol. 0 means no limit.';
$string['maxenrolledreached'] = 'Maximum number of users allowed to spay-enrol was already reached.';
$string['canntenrol'] = 'Enrolment is disabled or inactive';
$string['spay:config'] = 'Configure spay'; 
$string['spay:manage'] = 'Manage spay'; 
$string['spay:unenrol'] = 'Unenrol spay';
$string['spay:unenrolself'] = 'Unenrolself spay'; 
$string['charge_description1'] = "create customer for email receipt";
$string['charge_description2'] = 'Charge for Course Enrolment Cost.';
$string['spay_sorry'] = "Sorry, you can not use the script that way.";

$string['url'] = "SPAY API Entry Point";
$string['url_desc'] = "The SPAY API entry point";
$string['providerkey'] = "SPAY Provider Key";
$string['providerkey_desc'] = "The SPAY Provider Key for D2EL";
$string['servicecodes'] = "SPAY Service Code";
$string['servicecodes_desc'] = "The SPAY Service Code of  D2EL";
$string['username'] = "SPAY Username";
$string['username_desc'] = "SPAY Username for D2EL";
$string['passwd'] = "SPAY Password";
$string['passwd_desc'] = "SPAY Based64 Encrypted Password for D2EL";

$string['newenrols'] = 'Allow new enrolments';
$string['newenrols_desc'] = 'Allow users to self enrol into new courses by default.';
$string['newenrols_help'] = 'This setting determines whether a user can enrol into this course.';
$string['expirynotifyall'] = 'Teacher and enrolled user';
$string['expirynotifyenroller'] = 'Teacher only';
$string['longtimenosee'] = 'Unenrol inactive after';
$string['longtimenosee_help'] = 'If users haven\'t accessed a course for a long time, then they are automatically unenrolled. This parameter specifies that time limit.';
$string['sendcoursewelcomemessage'] = 'Send course welcome message';
$string['sendcoursewelcomemessage_help'] = 'When a user self enrols in the course, they may be sent a welcome message email. If sent from the course contact (by default the teacher), and more than one user has this role, the email is sent from the first user to be assigned the role.';
$string['sendexpirynotificationstask'] = "Self enrolment send expiry notifications task";

$string['msisdn'] = 'Mobile Number';
$string['msisdnempty'] = 'Mobile Number can\'t be empty.';
$string['misdnnotvalid'] = 'please enter a valid sudani number.';
$string['msisdn_help'] = 'Sudani phone number e.g +249-123-456-789';
$string['pin'] = 'PIN';
$string['pinempty'] = 'Verification PIN can\'t be empty.';
$string['pinnotvalid'] = 'iIvalid Verification PIN.';
$string['pin_help'] = 'Verification PIN code that send to your mobile nubmer';
$string['subscriptioncost'] = 'Subscription Cost';
$string['subscriptionamount'] = ' SDG';

$string['enrolme'] = 'Enrol me';
$string['enrolmenow'] = 'Continue';
