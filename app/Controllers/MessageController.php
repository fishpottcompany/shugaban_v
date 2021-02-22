<?php

class MessageController 
{

    function show_messge($using_live_mode, $messageModelObject, $terminate)
    {
        if(!$using_live_mode){
            var_dump($messageModelObject);
        }

        if($terminate){
            exit;
        }
    }

}