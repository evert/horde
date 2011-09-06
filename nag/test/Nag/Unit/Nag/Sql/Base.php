<?php
/**
 * Test the core Nag class with a SQL backend.
 *
 * PHP version 5
 *
 * @category   Horde
 * @package    Nag
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/nag
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, version 2
 */

/**
 * Test the core Nag class with a SQL backend.
 *
 * Copyright 2011 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (GPLv2). If you did not
 * receive this file, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @category   Horde
 * @package    Nag
 * @subpackage UnitTests
 * @author     Gunnar Wrobel <wrobel@pardus.de>
 * @link       http://www.horde.org/apps/nag
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, version 2
 */
class Nag_Unit_Nag_Sql_Base extends Nag_Unit_Nag_Base
{
    public static function setUpBeforeClass()
    {
        self::$setup->setup(
            array(
                'Horde_Perms' => array(
                    'factory' => 'Perms',
                    'method' => 'Null',
                ),
                'Horde_Group' => array(
                    'factory' => 'Group',
                    'method' => 'Mock',
                ),
                'Horde_Share_Base' => array(
                    'factory' => 'Share',
                    'method' => 'Sqlng',
                    'params' => array(
                        'user' => 'test@example.com',
                        'app' => 'nag'
                    ),
                ),
            )
        );
        self::$setup->makeGlobal(
            array(
                'nag_shares' => 'Horde_Share_Base',
            )
        );
        parent::setUpBeforeClass();
    }
}