<?php

namespace app\widgets\filter;

use ishop\Cache;
use RedBeanPHP\R;

class Filter
{   
    public $groups;
    public $attrs;
    public $tpl;
    public $filter;

    public function __construct($filter = null, $tpl=''){
        $this->filter = $filter;
        $this->tpl = $tpl ? $tpl : __DIR__.'/filter_tpl.php';
        $this->run();
    }

    protected function run(){
        $cache = Cache::instance();
        $this->groups = $cache->get('filter_group');
        if(!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 3600*24);
        }
        $this->attrs = $cache->get('filter_attrs');
        if(!$this->attrs){
            $this->attrs = self::getAttrs();
            $cache->set('filter_attrs', $this->attrs, 3600*24);
        }
        echo $this->getHtml();
    }

    protected function getHtml(){
        ob_start();
        $filter = explode(',', self::getFilter());
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getGroups(){
        return R::getAssoc('SELECT id, title FROM attribute_group');
    }
    
    protected static function getAttrs(){
        $data =  R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach ($data as $key => $value) {
            $attrs[$value['attr_group_id']][$key] = $value['value'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#",'',$_GET['filter']);
            return $filter;
        }
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter);
        $cache = Cache::instance();
        $attr_groups = $cache->get('filter_attrs');

        if(!$attr_groups){
            $attr_groups = self::getAttrs();
        }
        $selected_groups = [];
        foreach ($attr_groups as $attr_group_id=>$attrs){
            foreach ($attrs as $attr_id=>$value){
                if (in_array($attr_id, $filters)){
                    $selected_groups[]=$attr_group_id;
                    break;
                }
            }
        }
        return count($selected_groups);
    }

}