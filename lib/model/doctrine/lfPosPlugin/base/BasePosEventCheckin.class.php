<?php

/**
 * BasePosEventCheckin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pos_event_id
 * @property integer $member_id
 * @property integer $status
 * @property integer $is_public
 * @property PosEvent $PosEvent
 * @property Member $Member
 * 
 * @method integer         getId()           Returns the current record's "id" value
 * @method integer         getPosEventId()   Returns the current record's "pos_event_id" value
 * @method integer         getMemberId()     Returns the current record's "member_id" value
 * @method integer         getStatus()       Returns the current record's "status" value
 * @method integer         getIsPublic()     Returns the current record's "is_public" value
 * @method PosEvent        getPosEvent()     Returns the current record's "PosEvent" value
 * @method Member          getMember()       Returns the current record's "Member" value
 * @method PosEventCheckin setId()           Sets the current record's "id" value
 * @method PosEventCheckin setPosEventId()   Sets the current record's "pos_event_id" value
 * @method PosEventCheckin setMemberId()     Sets the current record's "member_id" value
 * @method PosEventCheckin setStatus()       Sets the current record's "status" value
 * @method PosEventCheckin setIsPublic()     Sets the current record's "is_public" value
 * @method PosEventCheckin setPosEvent()     Sets the current record's "PosEvent" value
 * @method PosEventCheckin setMember()       Sets the current record's "Member" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePosEventCheckin extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pos_event_checkin');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'id identifies pos_checkin',
             'length' => 4,
             ));
        $this->hasColumn('pos_event_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'id identifies pos',
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'id is of poster',
             'length' => 4,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => '0',
             'comment' => 'status is of pos_checkin',
             'length' => 1,
             ));
        $this->hasColumn('is_public', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => '1',
             'comment' => 'trang thai of pos_checkin',
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PosEvent', array(
             'local' => 'pos_event_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}