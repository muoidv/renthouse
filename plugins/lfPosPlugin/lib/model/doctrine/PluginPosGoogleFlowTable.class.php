<?php

/**
 * PluginPosGoogleFlowTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginPosGoogleFlowTable extends Doctrine_Table
{
    const init = 0; // wait
    const inprocess = 1; // dang chay xu ly
    const finish = 2;
    /**
     * Returns an instance of this class.
     *
     * @return object PluginPosGoogleFlowTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginPosGoogleFlow');
    }
    public function getListGoogleFlow($page = 1, $size = 10){
        $q = $this->createQuery('p');
//        $q->orderBy('p.created_at DESC');
        return $this->getPager($q, $page, $size);
    }
    protected function getPager(Doctrine_Query $q, $page, $size) {
        $pager = new sfDoctrinePager('PosGoogleFlow', $size);
        $pager->setQuery($q);
        $pager->setPage($page);
        return $pager;
    }
}