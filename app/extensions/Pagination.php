<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.06.2018
 * Time: 13:37
 */

class Pagination
{
    private $currentPositon;
    private $countOfItems;
    private $countOfAllItems;
    private $page;


    public function __construct()
    {
        $this->currentPositon = 1;
        $this->countOfItems = 6;
        $this->page = 1;
    }

    public function showPage($currentPage, $dataArr){
       // var_dump($dataArr);
        $this->currentPositon = $this->countOfItems * ($currentPage -1) + 1;
        $currentData = null;
        //var_dump($this->currentPositon);

        for($i=$this->currentPositon-1;$i<$this->currentPositon+5;$i++){
            if(isset($dataArr[$i])){
            $currentData[] = $dataArr[$i];
                }
            //var_dump($dataArr[$i]);
        }

        return $currentData;
    }

    public function getLastPage($dataArr){
        $size = sizeof($dataArr);
        //var_dump($size);
        $this->countOfAllItems = ceil($size / $this->countOfItems);
        return $this->countOfAllItems;
    }
}