<?php

/**
 * Get JobNumber
 * 
 * @param array $job `clientNr` from Table `sem_job_client` must be present
 * 
 * @return string $jobNumber
 */
function getJobNumber($job)
{
    return sprintf(
        '%s_%s_%s',
        substr($job['jobCreateDate'], 2, 6),
        $job['clientNr'],
        $job['jobId']
    );
}

/**
 * Get difference between two dates in Hours
 * 
 * @param string $startDate  - Start date
 * @param string $endDate    - End date
 * @param string $pauseStart - Pause start
 * @param string $pauseEnd   - Pause end
 * @param string $format     - Date format. e.g.: "YmdHi"
 * 
 * @return float $hours
 */
function getNumberOfHoursWorked($startDate, $endDate, $pauseStart, $pauseEnd, $format = "YmdHi")
{
    $start = DateTime::createFromFormat($format, $startDate);
    $end = DateTime::createFromFormat($format, $endDate);
    $workDiff = $start->diff($end);

    $pauseStart = DateTime::createFromFormat($format, $pauseStart);
    $pauseEnd = DateTime::createFromFormat($format, $pauseEnd);

    $pauseDiff = $pauseStart->diff($pauseEnd);

    $hours = floatval((($workDiff->h * 60 + $workDiff->i) - ($pauseDiff->h * 60 + $pauseDiff->i)) / 60);
    $hours = number_format($hours, 2);

    return $hours;
}

/**
 * Load Lang
 * 
 * @param array  $vConfig - Config variables
 * @param String $lang    - Language string e.g. 'de'
 * 
 * @return array $arr_semContent - Array with strings for specific language
 */
function loadLang($vConfig, $lang = 'de')
{
    $path_lang = 'lang/' . $vConfig['layout'] . '/';

    include_once PATH_CNF . $path_lang  . "content_" . $lang . ".inc.php";

    return $arr_semContent;
}

/**
 * Select Lang - Get default language string. e.g. 'de'
 * 
 * @param array $vConfig - Config variables
 * 
 * @return string default language string
 */
function selectLang($vConfig)
{
    if (true === isset($_SESSION['sess_semLanguage']) && false === empty($_SESSION['sess_semLanguage'])) {
        $lang = $_SESSION['sess_semLanguage'];
    } else {
        $lang = $vConfig['portal']['lang'][0];
    }

    return $lang;
}

/**
 * Get Navigation array specific to User Privileges
 * 
 * @param array   $user_privileges - User Privileges from `sem_navi` Table
 * @param integer $navStart        - Starting nav level
 * 
 * @return array $result
 */
function get_navi($user_privileges, $navStart = 0)
{
    include_once PATH_MOD . 'DBService.php';

    $navi = DBService::get_navi($user_privileges, $navStart);
    $result = [];

    foreach ($navi as $nav) {
        $result[] = $nav;

        $subnavi = DBService::get_subnavi($user_privileges, $nav['navId']);

        foreach ($subnavi as $subnav) {
            $result[] = $subnav;
        }
    }

    return $result;
}

/**
 * Replace KSW with Clavey in given string if layout == 'clavey'
 *
 * @param String $string to search for `KSW`
 * 
 * @return String updated string
 */
function ifLayoutIsClaveyReplaceKswWithClavey($string)
{
    global $vConfig;

    if ('clavey' === $vConfig['layout']) {
        $string = str_replace('KSW', 'Clavey', $string);
    }

    return $string;
}

/**
 * Check session is valid
 * 
 * @return Boolean return `true` if session is valid, otherwise return `false`
 */
function sessionIsValid()
{
    if (false === isset($_SESSION['sess_semLoginStatus']) || 'logged-in' !== $_SESSION['sess_semLoginStatus']) {
        return false;
    }

    return true;
}

/**
 * Redirect to login if session has expired
 * 
 * @return void
 */
function redirectToLoginIfSessionHasExpired()
{
    if (false === sessionIsValid()) {
        header("Location: /portal/index.php?sessionError=LG005");
    }
}

/**
 * Helper var dump function with better formatting
 * 
 * @param mixed  $variable     - Variable to dump
 * @param String $variableName - Name of the Variable
 * 
 * @return void
 */
function my_var_dump($variable, $variableName = '')
{
    echo '<div style="border: 1px solid #CCC">';
    echo $variableName;
    echo '<pre style="border: 1px solid #CCC">';
    var_dump($variable);
    echo '</pre>';
    echo '</div>';
}
