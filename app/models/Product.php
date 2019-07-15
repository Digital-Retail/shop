<?php


namespace app\models;


class Product extends AppModel
{
    public function setRecentlyViewed($id) {
        $recentlyViewed = $this->getAllRecentlyViewed();
        if(!$recentlyViewed) {
            setcookie("recentlyView",$id, time()+3600*24,'/');
        }else {
            $recentlyViewed = explode(',',$recentlyViewed);

            if(!in_array($id,$recentlyViewed)) {
                $recentlyViewed[] = $id;
                $strViewed= implode(',',$recentlyViewed);
                setcookie("recentlyView",$strViewed, time()+3600*24,'/');
            }


        }
    }

    public function getRecentlyViewed() {

        $recentlyViewed = $this->getAllRecentlyViewed();
        if($recentlyViewed) {
            $recentlyViewed = explode(',',$recentlyViewed);
            return array_slice($recentlyViewed, -3);
        }
        return false;
    }

    public function getAllRecentlyViewed() {
        if(!empty($_COOKIE['recentlyView'])) {
            return $_COOKIE['recentlyView'];
        }else {
            return false;
        }

    }
}