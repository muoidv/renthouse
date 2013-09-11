<?php

/**
 * PluginPosComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginPosComment extends BasePosComment
{
    public function getSubContent($length = null){
        if(!isset($length)) $length = 60;
        if(strlen($this->getContent())>$length){
          $space = strrpos($this->getContent(), " ", -(strlen($this->getContent()) - $length));
          $str = substr($this->getContent(),0,$space).'...';
          return $str;
        }else{
          return $this->getContent();
        }
    }
}