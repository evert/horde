<?php
/**
 * Create ulaform base tables
 *
 * Copyright 2010-2011 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (GPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * @author   Vilius Šumskas <vilius@lnk.lt>
 * @category Horde
 * @license  http://www.fsf.org/copyleft/gpl.html GPL
 * @package  Ulaform
 */
class UlaformBaseTables extends Horde_Db_Migration_Base
{
    /**
     * Upgrade.
     */
    public function up()
    {
        $tableList = $this->tables();

        if (!in_array('ulaform_forms', $tableList)) {
            $t = $this->createTable('turba_objects', array('autoincrementKey' => false));
            $t->column('form_id', 'integer', array('null' => false));
            $t->column('user_uid', 'string', array('limit' => 255, 'null' => false));
            $t->column('form_name', 'string', array('limit' => 255, 'null' => false));
            $t->column('form_action', 'string', array('limit' => 255, 'null' => false));
            $t->column('form_params', 'text', array('null' => false));
            $t->column('form_onsubmit', 'text');
            $t->primaryKey(array('form_id'));
            $t->end();
        }

        if (!in_array('ulaform_fields', $tableList)) {
            $t = $this->createTable('ulaform_fields', array('autoincrementKey' => false));
            $t->column('field_id', 'integer', array('null' => false));
            $t->column('form_id', 'integer', array('null' => false));
            $t->column('field_name', 'string', array('limit' => 255, 'null' => false));
            $t->column('field_order', 'integer', array('default' => 0, 'null' => false));
            $t->column('field_label', 'string', array('limit' => 255, 'null' => false));
            $t->column('field_type', 'string', array('limit' => 255, 'default' => 'text', 'null' => false));
            $t->column('field_params', 'text');
            $t->column('field_required', 'integer', array('default' => 0, 'null' => false));
            $t->column('field_readonly', 'integer', array('default' => 0, 'null' => false));
            $t->column('field_desc', 'string', array('limit' => 255));
            $t->primaryKey(array('field_id'));
            $t->end();
        }

    }

    /**
     * Downgrade to 0
     */
    public function down()
    {
        $this->dropTable('ulaform_forms');
        $this->dropTable('ulaform_fields');
    }

}