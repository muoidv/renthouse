<?php

/**
 * BasePosSponsor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pos_id
 * @property integer $member_id
 * @property timestamp $expire_date
 * @property string $position
 * @property integer $sort_order
 * @property Pos $Pos
 * @property Member $Member
 * 
 * @method integer    getId()          Returns the current record's "id" value
 * @method integer    getPosId()       Returns the current record's "pos_id" value
 * @method integer    getMemberId()    Returns the current record's "member_id" value
 * @method timestamp  getExpireDate()  Returns the current record's "expire_date" value
 * @method string     getPosition()    Returns the current record's "position" value
 * @method integer    getSortOrder()   Returns the current record's "sort_order" value
 * @method Pos        getPos()         Returns the current record's "Pos" value
 * @method Member     getMember()      Returns the current record's "Member" value
 * @method PosSponsor setId()          Sets the current record's "id" value
 * @method PosSponsor setPosId()       Sets the current record's "pos_id" value
 * @method PosSponsor setMemberId()    Sets the current record's "member_id" value
 * @method PosSponsor setExpireDate()  Sets the current record's "expire_date" value
 * @method PosSponsor setPosition()    Sets the current record's "position" value
 * @method PosSponsor setSortOrder()   Sets the current record's "sort_order" value
 * @method PosSponsor setPos()         Sets the current record's "Pos" value
 * @method PosSponsor setMember()      Sets the current record's "Member" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePosSponsor extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pos_sponsor');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'id identifies pos_sponsor',
             'length' => 4,
             ));
        $this->hasColumn('pos_id', 'integer', 4, array(
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
        $this->hasColumn('expire_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             'comment' => 'ngày hết hạn tài trợ',
             ));
        $this->hasColumn('position', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('sort_order', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('comment', '');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pos', array(
             'local' => 'pos_id',
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