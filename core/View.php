<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.05.2018
 * Time: 16:34
 */
class View{

    public function renderAll($page,$data,$template,$css){
       if($data != "") {
           extract($data);
       };
        $content = "";

            $filename = "./app/views/pages/" ."$page". ".php";

            ob_start();
            require $filename;
            $content .= ob_get_clean();

        require_once ROOT."/app/views/templates/".$template.".php";

    }

}

