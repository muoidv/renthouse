<?php

/**
 * BaseIntroFriend
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id_to
 * @property integer $member_id_from
 * @property string $content
 * @property Member $Member
 * @property Member $Member_2
 * @property MemberRelationship $MemberRelationship
 * 
 * @method integer            getId()                 Returns the current record's "id" value
 * @method integer            getMemberIdTo()         Returns the current record's "member_id_to" value
 * @method integer            getMemberIdFrom()       Returns the current record's "member_id_from" value
 * @method string             getContent()            Returns the current record's "content" value
 * @method Member             getMember()             Returns the current record's "Member" value
 * @method Member             getMember2()            Returns the current record's "Member_2" value
 * @method MemberRelationship getMemberRelationship() Returns the current record's "MemberRelationship" value
 * @method IntroFriend        setId()                 Sets the current record's "id" value
 * @method IntroFriend        setMemberIdTo()         Sets the current record's "member_id_to" value
 * @method IntroFriend        setMemberIdFrom()       Sets the current record's "member_id_from" value
 * @method IntroFriend        setContent()            Sets the current record's "content" value
 * @method IntroFriend        setMember()             Sets the current record's "Member" value
 * @method IntroFriend        setMember2()            Sets the current record's "Member_2" value
 * @method IntroFriend        setMemberRelationship() Sets the current record's "MemberRelationship" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseIntroFriend extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('intro_friend');
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
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));


        $this->index('created_at', array(
             'fields' => 
             array(
              0 => 'created_at',
             ),
             ));
        $this->index('member_id_from_member_id_to', array(
             'fields' => 
             array(
              0 => 'member_id_from',
              1 => 'member_id_to',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id_to',
             'foreign' => 'id'));

        $this->hasOne('Member as Member_2', array(
             'local' => 'member_id_from',
             'foreign' => 'id'));

        $this->hasOne('MemberRelationship', array(
             'local' => 'member_id_to',
             'foreign' => 'member_id_to'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}