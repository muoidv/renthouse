<?php

/**
 * BaseDiaryCommentImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $diary_comment_id
 * @property integer $file_id
 * @property DiaryComment $DiaryComment
 * @property File $File
 * 
 * @method integer           getId()               Returns the current record's "id" value
 * @method integer           getDiaryCommentId()   Returns the current record's "diary_comment_id" value
 * @method integer           getFileId()           Returns the current record's "file_id" value
 * @method DiaryComment      getDiaryComment()     Returns the current record's "DiaryComment" value
 * @method File              getFile()             Returns the current record's "File" value
 * @method DiaryCommentImage setId()               Sets the current record's "id" value
 * @method DiaryCommentImage setDiaryCommentId()   Sets the current record's "diary_comment_id" value
 * @method DiaryCommentImage setFileId()           Sets the current record's "file_id" value
 * @method DiaryCommentImage setDiaryComment()     Sets the current record's "DiaryComment" value
 * @method DiaryCommentImage setFile()             Sets the current record's "File" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDiaryCommentImage extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('diary_comment_image');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('diary_comment_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('file_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('DiaryComment', array(
             'local' => 'diary_comment_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('File', array(
             'local' => 'file_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}