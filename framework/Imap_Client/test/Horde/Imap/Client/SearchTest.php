<?php
/**
 * Tests for the Search Query object.
 *
 * PHP version 5
 *
 * @category Horde
 * @package  Imap_Client
 * @author   Michael Slusarz <slusarz@horde.org>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Imap_Client
 */

/**
 * Tests for the Search Query object.
 *
 * Copyright 2011 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Horde
 * @package  Imap_Client
 * @author   Michael Slusarz <slusarz@horde.org>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @link     http://pear.horde.org/index.php?package=Imap_Client
 */
class Horde_Imap_Client_SearchTest extends PHPUnit_Framework_TestCase
{
    public function testOrQueries()
    {
        $ob = new Horde_Imap_Client_Search_Query();

        $ob2 = new Horde_Imap_Client_Search_Query();
        $ob2->flag('\\deleted', false);
        $ob2->headerText('from', 'ABC');

        $ob3 = new Horde_Imap_Client_Search_Query();
        $ob3->flag('\\deleted', true);
        $ob3->headerText('from', 'DEF');

        $ob->orSearch(array($ob2, $ob3));

        $this->assertEquals(
            'OR (DELETED FROM DEF) (UNDELETED FROM ABC)',
            strval($ob)
        );
    }

}
