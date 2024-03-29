<?php

/**
 * BasePos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string $tel
 * @property string $website
 * @property float $lat
 * @property float $lng
 * @property string $tags
 * @property integer $file_id
 * @property integer $member_id
 * @property integer $ower_id
 * @property integer $pos_category_id
 * @property integer $pos_sub_category_id
 * @property integer $is_public
 * @property string $editer
 * @property integer $type
 * @property string $meta
 * @property integer $del_flag
 * @property integer $rank
 * @property File $File
 * @property Member $Member
 * @property PosCategory $PosCategory
 * @property Doctrine_Collection $PosRentHouse
 * @property Doctrine_Collection $PosCheckin
 * @property Doctrine_Collection $PosComment
 * @property Doctrine_Collection $PosFollow
 * @property Doctrine_Collection $PosLog
 * @property Doctrine_Collection $PosPhoto
 * @property Doctrine_Collection $PosWarn
 * @property Doctrine_Collection $PosSponsor
 * @property Doctrine_Collection $PosDeal
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method string              getDescription()         Returns the current record's "description" value
 * @method string              getAddress()             Returns the current record's "address" value
 * @method string              getTel()                 Returns the current record's "tel" value
 * @method string              getWebsite()             Returns the current record's "website" value
 * @method float               getLat()                 Returns the current record's "lat" value
 * @method float               getLng()                 Returns the current record's "lng" value
 * @method string              getTags()                Returns the current record's "tags" value
 * @method integer             getFileId()              Returns the current record's "file_id" value
 * @method integer             getMemberId()            Returns the current record's "member_id" value
 * @method integer             getOwerId()              Returns the current record's "ower_id" value
 * @method integer             getPosCategoryId()       Returns the current record's "pos_category_id" value
 * @method integer             getPosSubCategoryId()    Returns the current record's "pos_sub_category_id" value
 * @method integer             getIsPublic()            Returns the current record's "is_public" value
 * @method string              getEditer()              Returns the current record's "editer" value
 * @method integer             getType()                Returns the current record's "type" value
 * @method string              getMeta()                Returns the current record's "meta" value
 * @method integer             getDelFlag()             Returns the current record's "del_flag" value
 * @method integer             getRank()                Returns the current record's "rank" value
 * @method File                getFile()                Returns the current record's "File" value
 * @method Member              getMember()              Returns the current record's "Member" value
 * @method PosCategory         getPosCategory()         Returns the current record's "PosCategory" value
 * @method Doctrine_Collection getPosRentHouse()        Returns the current record's "PosRentHouse" collection
 * @method Doctrine_Collection getPosCheckin()          Returns the current record's "PosCheckin" collection
 * @method Doctrine_Collection getPosComment()          Returns the current record's "PosComment" collection
 * @method Doctrine_Collection getPosFollow()           Returns the current record's "PosFollow" collection
 * @method Doctrine_Collection getPosLog()              Returns the current record's "PosLog" collection
 * @method Doctrine_Collection getPosPhoto()            Returns the current record's "PosPhoto" collection
 * @method Doctrine_Collection getPosWarn()             Returns the current record's "PosWarn" collection
 * @method Doctrine_Collection getPosSponsor()          Returns the current record's "PosSponsor" collection
 * @method Doctrine_Collection getPosDeal()             Returns the current record's "PosDeal" collection
 * @method Pos                 setId()                  Sets the current record's "id" value
 * @method Pos                 setTitle()               Sets the current record's "title" value
 * @method Pos                 setDescription()         Sets the current record's "description" value
 * @method Pos                 setAddress()             Sets the current record's "address" value
 * @method Pos                 setTel()                 Sets the current record's "tel" value
 * @method Pos                 setWebsite()             Sets the current record's "website" value
 * @method Pos                 setLat()                 Sets the current record's "lat" value
 * @method Pos                 setLng()                 Sets the current record's "lng" value
 * @method Pos                 setTags()                Sets the current record's "tags" value
 * @method Pos                 setFileId()              Sets the current record's "file_id" value
 * @method Pos                 setMemberId()            Sets the current record's "member_id" value
 * @method Pos                 setOwerId()              Sets the current record's "ower_id" value
 * @method Pos                 setPosCategoryId()       Sets the current record's "pos_category_id" value
 * @method Pos                 setPosSubCategoryId()    Sets the current record's "pos_sub_category_id" value
 * @method Pos                 setIsPublic()            Sets the current record's "is_public" value
 * @method Pos                 setEditer()              Sets the current record's "editer" value
 * @method Pos                 setType()                Sets the current record's "type" value
 * @method Pos                 setMeta()                Sets the current record's "meta" value
 * @method Pos                 setDelFlag()             Sets the current record's "del_flag" value
 * @method Pos                 setRank()                Sets the current record's "rank" value
 * @method Pos                 setFile()                Sets the current record's "File" value
 * @method Pos                 setMember()              Sets the current record's "Member" value
 * @method Pos                 setPosCategory()         Sets the current record's "PosCategory" value
 * @method Pos                 setPosRentHouse()        Sets the current record's "PosRentHouse" collection
 * @method Pos                 setPosCheckin()          Sets the current record's "PosCheckin" collection
 * @method Pos                 setPosComment()          Sets the current record's "PosComment" collection
 * @method Pos                 setPosFollow()           Sets the current record's "PosFollow" collection
 * @method Pos                 setPosLog()              Sets the current record's "PosLog" collection
 * @method Pos                 setPosPhoto()            Sets the current record's "PosPhoto" collection
 * @method Pos                 setPosWarn()             Sets the current record's "PosWarn" collection
 * @method Pos                 setPosSponsor()          Sets the current record's "PosSponsor" collection
 * @method Pos                 setPosDeal()             Sets the current record's "PosDeal" collection
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePos extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pos');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'id identifies pos',
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'title is of pos',
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'comment' => 'desc is of pos',
             ));
        $this->hasColumn('address', 'string', null, array(
             'type' => 'string',
             'comment' => 'address is of pos',
             ));
        $this->hasColumn('tel', 'string', 20, array(
             'type' => 'string',
             'comment' => 'tel is of pos',
             'length' => 20,
             ));
        $this->hasColumn('website', 'string', 255, array(
             'type' => 'string',
             'comment' => 'website is of pos',
             'length' => 255,
             ));
        $this->hasColumn('lat', 'float', null, array(
             'type' => 'float',
             'comment' => 'latitude theo google map',
             'length' => '',
             ));
        $this->hasColumn('lng', 'float', null, array(
             'type' => 'float',
             'comment' => 'longitude theo google map',
             'length' => '',
             ));
        $this->hasColumn('tags', 'string', 255, array(
             'type' => 'string',
             'comment' => 'tags is of pos',
             'length' => 255,
             ));
        $this->hasColumn('file_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'File id',
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => 'id is of poster',
             'length' => 4,
             ));
        $this->hasColumn('ower_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'id is of location',
             'length' => 4,
             ));
        $this->hasColumn('pos_category_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'id identifies category',
             'length' => 4,
             ));
        $this->hasColumn('pos_sub_category_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'id identifies sub_category',
             'length' => 4,
             ));
        $this->hasColumn('is_public', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => '1',
             'comment' => 'trang thai of pos_checkin',
             'length' => 1,
             ));
        $this->hasColumn('editer', 'string', 255, array(
             'type' => 'string',
             'comment' => 'danh sach member_id duoc phep edit pos,moi member_id cach nhau bang dau phay ',
             'length' => 255,
             ));
        $this->hasColumn('type', 'integer', 1, array(
             'type' => 'integer',
             'default' => '1',
             'comment' => 'Loại địa điểm cho thường, hay địa điểm đặc biệt',
             'length' => 1,
             ));
        $this->hasColumn('meta', 'string', null, array(
             'type' => 'string',
             'comment' => 'Chứa các thông tin về title, description, address, tel, website của địa điểm',
             ));
        $this->hasColumn('del_flag', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'comment' => 'Xóa : = 1',
             'length' => 1,
             ));
        $this->hasColumn('rank', 'integer', 4, array(
             'type' => 'integer',
             'default' => 0,
             'comment' => 'Xếp hạng địa điểm',
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
        $this->hasOne('File', array(
             'local' => 'file_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Member', array(
             'local' => 'ower_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('PosCategory', array(
             'local' => 'pos_category_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('PosRentHouse', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosCheckin', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosComment', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosFollow', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosLog', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosPhoto', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosWarn', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosSponsor', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $this->hasMany('PosDeal', array(
             'local' => 'id',
             'foreign' => 'pos_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}