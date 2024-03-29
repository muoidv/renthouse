<?php

/**
 * BaseCommunityEvent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $community_id
 * @property integer $member_id
 * @property string $name
 * @property string $body
 * @property timestamp $event_updated_at
 * @property timestamp $open_date
 * @property string $open_date_comment
 * @property string $area
 * @property timestamp $application_deadline
 * @property integer $capacity
 * @property Member $Member
 * @property Community $Community
 * @property Doctrine_Collection $CommunityEventComment
 * @property Doctrine_Collection $CommunityEventMember
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getCommunityId()           Returns the current record's "community_id" value
 * @method integer             getMemberId()              Returns the current record's "member_id" value
 * @method string              getName()                  Returns the current record's "name" value
 * @method string              getBody()                  Returns the current record's "body" value
 * @method timestamp           getEventUpdatedAt()        Returns the current record's "event_updated_at" value
 * @method timestamp           getOpenDate()              Returns the current record's "open_date" value
 * @method string              getOpenDateComment()       Returns the current record's "open_date_comment" value
 * @method string              getArea()                  Returns the current record's "area" value
 * @method timestamp           getApplicationDeadline()   Returns the current record's "application_deadline" value
 * @method integer             getCapacity()              Returns the current record's "capacity" value
 * @method Member              getMember()                Returns the current record's "Member" value
 * @method Community           getCommunity()             Returns the current record's "Community" value
 * @method Doctrine_Collection getCommunityEventComment() Returns the current record's "CommunityEventComment" collection
 * @method Doctrine_Collection getCommunityEventMember()  Returns the current record's "CommunityEventMember" collection
 * @method CommunityEvent      setId()                    Sets the current record's "id" value
 * @method CommunityEvent      setCommunityId()           Sets the current record's "community_id" value
 * @method CommunityEvent      setMemberId()              Sets the current record's "member_id" value
 * @method CommunityEvent      setName()                  Sets the current record's "name" value
 * @method CommunityEvent      setBody()                  Sets the current record's "body" value
 * @method CommunityEvent      setEventUpdatedAt()        Sets the current record's "event_updated_at" value
 * @method CommunityEvent      setOpenDate()              Sets the current record's "open_date" value
 * @method CommunityEvent      setOpenDateComment()       Sets the current record's "open_date_comment" value
 * @method CommunityEvent      setArea()                  Sets the current record's "area" value
 * @method CommunityEvent      setApplicationDeadline()   Sets the current record's "application_deadline" value
 * @method CommunityEvent      setCapacity()              Sets the current record's "capacity" value
 * @method CommunityEvent      setMember()                Sets the current record's "Member" value
 * @method CommunityEvent      setCommunity()             Sets the current record's "Community" value
 * @method CommunityEvent      setCommunityEventComment() Sets the current record's "CommunityEventComment" collection
 * @method CommunityEvent      setCommunityEventMember()  Sets the current record's "CommunityEventMember" collection
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCommunityEvent extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('community_event');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('community_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('event_updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('open_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('open_date_comment', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('area', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('application_deadline', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('capacity', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasOne('Community', array(
             'local' => 'community_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('CommunityEventComment', array(
             'local' => 'id',
             'foreign' => 'community_event_id'));

        $this->hasMany('CommunityEventMember', array(
             'local' => 'id',
             'foreign' => 'community_event_id'));

        $opcommunitytopicpluginimagesbehavior0 = new opCommunityTopicPluginImagesBehavior();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($opcommunitytopicpluginimagesbehavior0);
        $this->actAs($timestampable0);
    }
}