<?php

/**
 * BasePosCheckin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pos_id
 * @property integer $member_id
 * @property integer $status
 * @property integer $is_public
 * @property integer $pos_category_id
 * @property Pos $Pos
 * @property Member $Member
 * @property PosCategory $PosCategory
 * 
 * @method integer     getId()              Returns the current record's "id" value
 * @method integer     getPosId()           Returns the current record's "pos_id" value
 * @method integer     getMemberId()        Returns the current record's "member_id" value
 * @method integer     getStatus()          Returns the current record's "status" value
 * @method integer     getIsPublic()        Returns the current record's "is_public" value
 * @method integer     getPosCategoryId()   Returns the current record's "pos_category_id" value
 * @method Pos         getPos()             Returns the current record's "Pos" value
 * @method Member      getMember()          Returns the current record's "Member" value
 * @method PosCategory getPosCategory()     Returns the current record's "PosCategory" value
 * @method PosCheckin  setId()              Sets the current record's "id" value
 * @method PosCheckin  setPosId()           Sets the current record's "pos_id" value
 * @method PosCheckin  setMemberId()        Sets the current record's "member_id" value
 * @method PosCheckin  setStatus()          Sets the current record's "status" value
 * @method PosCheckin  setIsPublic()        Sets the current record's "is_public" value
 * @method PosCheckin  setPosCategoryId()   Sets the current record's "pos_category_id" value
 * @method PosCheckin  setPos()             Sets the current record's "Pos" value
 * @method PosCheckin  setMember()          Sets the current record's "Member" value
 * @method PosCheckin  setPosCategory()     Sets the current record's "PosCategory" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePosCheckin extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pos_checkin');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'id identifies pos_checkin',
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
        $this->hasColumn('pos_category_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'id identifies category',
             'length' => 4,
             ));
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

        $this->hasOne('PosCategory', array(
             'local' => 'pos_category_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}