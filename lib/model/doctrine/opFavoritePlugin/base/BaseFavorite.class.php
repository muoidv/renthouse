<?php

/**
 * BaseFavorite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id_to
 * @property integer $member_id_from
 * @property Member $Member
 * @property Member $Member_2
 * 
 * @method integer  getId()             Returns the current record's "id" value
 * @method integer  getMemberIdTo()     Returns the current record's "member_id_to" value
 * @method integer  getMemberIdFrom()   Returns the current record's "member_id_from" value
 * @method Member   getMember()         Returns the current record's "Member" value
 * @method Member   getMember2()        Returns the current record's "Member_2" value
 * @method Favorite setId()             Sets the current record's "id" value
 * @method Favorite setMemberIdTo()     Sets the current record's "member_id_to" value
 * @method Favorite setMemberIdFrom()   Sets the current record's "member_id_from" value
 * @method Favorite setMember()         Sets the current record's "Member" value
 * @method Favorite setMember2()        Sets the current record's "Member_2" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFavorite extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('favorite');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id_to', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id_from', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));


        $this->index('member_id_from_INDEX', array(
             'fields' => 
             array(
              0 => 'member_id_from',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id_to',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Member as Member_2', array(
             'local' => 'member_id_from',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}