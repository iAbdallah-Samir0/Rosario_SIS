<?php
/**
 * Resources module Menu entries
 *
 * @uses $menu global var
 *
 * @see  Menu.php in root folder
 * 
 * @package RosarioSIS
 * @subpackage modules
 */

$menu['SimpleReport']['admin'] = [
	'title' => _( 'SimpleReport' ),
	'default' => 'SimpleReport/SimpleReport.php',
	'SimpleReport/SimpleReport.php' => _( 'SimpleReport' ),
] + issetVal( $menu['SimpleReport']['admin'], [] );

$menu['SimpleReport']['teacher'] = [
	'title' => _( 'SimpleReport' ),
	'default' => 'SimpleReport/SimpleReport.php',
	'SimpleReport/SimpleReport.php' => _( 'SimpleReport' ),
] + issetVal( $menu['SimpleReport']['teacher'], [] );

$menu['Resources']['parent'] = $menu['SimpleReport']['teacher'] + issetVal( $menu['SimpleReport']['parent'], [] );
