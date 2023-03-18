<?php

class get_uniqueID
{
    function ID_generator($aid)
    {        
        try {
                $now = new DateTime();
                $dt = $now->format('Y-m-d H:i:s');
                $dt1 = $now->format('m-Y-d H:i:s');
                $dt2 = $now->format('d-m-Y H:i:s');
                $dttime = $now->format('Y-m-d H:i:s');
                $id =  $aid.round($dt).round($dt1).round($dt2).round(microtime(true));
                return $id;
            }
            catch (Exception $e)
            {			
                return "Failed to login " .$e->getMessage();
            }
    }
}