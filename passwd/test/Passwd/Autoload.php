<?php
/**
 * Setup autoloading for the tests.
 *
 * Copyright 2011 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category   Horde
 * @package    Passwd
 * @subpackage UnitTests
 * @license    http://www.fsf.org/copyleft/gpl.html GPL
 */

$mappings = array('Passwd' => dirname(__FILE__) . '/../../lib/');
require_once 'Horde/Test/Autoload.php';

/* Catch strict standards */
error_reporting(E_ALL | E_STRICT);

/** Load the basic test definition */
require_once dirname(__FILE__) . '/TestCase.php';