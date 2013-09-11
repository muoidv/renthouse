<?php

/**
 * BaseDiary
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id
 * @property string $title
 * @property string $body
 * @property integer $public_flag
 * @property boolean $is_open
 * @property boolean $has_images
 * @property Member $Member
 * @property Doctrine_Collection $DiaryImages
 * @property Doctrine_Collection $DiaryComments
 * @property DiaryCommentUnread $DiaryCommentUnread
 * @property Doctrine_Collection $DiaryCommentUpdate
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getMemberId()           Returns the current record's "member_id" value
 * @method string              getTitle()              Returns the current record's "title" value
 * @method string              getBody()               Returns the current record's "body" value
 * @method integer             getPublicFlag()         Returns the current record's "public_flag" value
 * @method boolean             getIsOpen()             Returns the current record's "is_open" value
 * @method boolean             getHasImages()          Returns the current record's "has_images" value
 * @method Member              getMember()             Returns the current record's "Member" value
 * @method Doctrine_Collection getDiaryImages()        Returns the current record's "DiaryImages" collection
 * @method Doctrine_Collection getDiaryComments()      Returns the current record's "DiaryComments" collection
 * @method DiaryCommentUnread  getDiaryCommentUnread() Returns the current record's "DiaryCommentUnread" value
 * @method Doctrine_Collection getDiaryCommentUpdate() Returns the current record's "DiaryCommentUpdate" collection
 * @method Diary               setId()                 Sets the current record's "id" value
 * @method Diary               setMemberId()           Sets the current record's "member_id" value
 * @method Diary               setTitle()              Sets the current record's "title" value
 * @method Diary               setBody()               Sets the current record's "body" value
 * @method Diary               setPublicFlag()         Sets the current record's "public_flag" value
 * @method Diary               setIsOpen()             Sets the current record's "is_open" value
 * @method Diary               setHasImages()          Sets the current record's "has_images" value
 * @method Diary               setMember()             Sets the current record's "Member" value
 * @method Diary               setDiaryImages()        Sets the current record's "DiaryImages" collection
 * @method Diary               setDiaryComments()      Sets the current record's "DiaryComments" collection
 * @method Diary               setDiaryCommentUnread() Sets the current record's "DiaryCommentUnread" value
 * @method Diary               setDiaryCommentUpdate() Sets the current record's "DiaryCommentUpdate" collection
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDiary extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('diary');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('public_flag', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 1,
             'length' => 1,
             ));
        $this->hasColumn('is_open', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('has_images', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));


        $this->index('created_at', array(
             'fields' => 
             array(
              0 => 'created_at',
             ),
             ));
        $this->index('member_id_created_at', array(
             'fields' => 
             array(
              0 => 'member_id',
              1 => 'created_at',
             ),
             ));
        $this->index('public_flag_craeted_at', array(
             'fields' => 
             array(
              0 => 'public_flag',
              1 => 'created_at',
             ),
             ));
        $this->index('is_open_created_at', array(
             'fields' => 
             array(
              0 => 'is_open',
              1 => 'created_at',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('DiaryImage as DiaryImages', array(
             'local' => 'id',
             'foreign' => 'diary_id'));

        $this->hasMany('DiaryComment as DiaryComments', array(
             'local' => 'id',
             'foreign' => 'diary_id'));

        $this->hasOne('DiaryCommentUnread', array(
             'local' => 'id',
             'foreign' => 'diary_id'));

        $this->hasMany('DiaryCommentUpdate', array(
             'local' => 'id',
             'foreign' => 'diary_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}