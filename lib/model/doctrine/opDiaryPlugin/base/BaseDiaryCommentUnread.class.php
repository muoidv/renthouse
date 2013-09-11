<?php

/**
 * BaseDiaryCommentUnread
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $diary_id
 * @property integer $member_id
 * @property Diary $Diary
 * @property Member $Member
 * 
 * @method integer            getDiaryId()   Returns the current record's "diary_id" value
 * @method integer            getMemberId()  Returns the current record's "member_id" value
 * @method Diary              getDiary()     Returns the current record's "Diary" value
 * @method Member             getMember()    Returns the current record's "Member" value
 * @method DiaryCommentUnread setDiaryId()   Sets the current record's "diary_id" value
 * @method DiaryCommentUnread setMemberId()  Sets the current record's "member_id" value
 * @method DiaryCommentUnread setDiary()     Sets the current record's "Diary" value
 * @method DiaryCommentUnread setMember()    Sets the current record's "Member" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDiaryCommentUnread extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('diary_comment_unread');
        $this->hasColumn('diary_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Diary', array(
             'local' => 'diary_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'owningSide' => true));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}