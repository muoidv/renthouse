<?php

/**
 * BaseDiaryComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $diary_id
 * @property integer $member_id
 * @property integer $number
 * @property string $body
 * @property boolean $has_images
 * @property Diary $Diary
 * @property Member $Member
 * @property Doctrine_Collection $DiaryCommentImages
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getDiaryId()            Returns the current record's "diary_id" value
 * @method integer             getMemberId()           Returns the current record's "member_id" value
 * @method integer             getNumber()             Returns the current record's "number" value
 * @method string              getBody()               Returns the current record's "body" value
 * @method boolean             getHasImages()          Returns the current record's "has_images" value
 * @method Diary               getDiary()              Returns the current record's "Diary" value
 * @method Member              getMember()             Returns the current record's "Member" value
 * @method Doctrine_Collection getDiaryCommentImages() Returns the current record's "DiaryCommentImages" collection
 * @method DiaryComment        setId()                 Sets the current record's "id" value
 * @method DiaryComment        setDiaryId()            Sets the current record's "diary_id" value
 * @method DiaryComment        setMemberId()           Sets the current record's "member_id" value
 * @method DiaryComment        setNumber()             Sets the current record's "number" value
 * @method DiaryComment        setBody()               Sets the current record's "body" value
 * @method DiaryComment        setHasImages()          Sets the current record's "has_images" value
 * @method DiaryComment        setDiary()              Sets the current record's "Diary" value
 * @method DiaryComment        setMember()             Sets the current record's "Member" value
 * @method DiaryComment        setDiaryCommentImages() Sets the current record's "DiaryCommentImages" collection
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDiaryComment extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('diary_comment');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('diary_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('number', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('has_images', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));


        $this->index('diary_id_number', array(
             'fields' => 
             array(
              0 => 'diary_id',
              1 => 'number',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Diary', array(
             'local' => 'diary_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('DiaryCommentImage as DiaryCommentImages', array(
             'local' => 'id',
             'foreign' => 'diary_comment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}