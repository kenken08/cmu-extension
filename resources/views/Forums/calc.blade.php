<?php
    function days($f,$t){
        
        $et = new DateTime($t);
        $date1 = new DateTime($f); 
        $date2 = $date1->diff($et);
        $date2 = $date2->days;
        
        $now = date_format(NOW(), 'Y-m-d');
        $now = new DateTime($now);
        $diff = $now->diff($et);
        $diff = $diff->days;
        $dateElapsed = $date2 - $diff;

        $progress = (($date2 - $diff)/$date2) * 50;
        $progress = (int)$progress;

        if($now <= $date1){
            return 0;
        }
        elseif($now >= $et){
            return 50;
        }
        else{
            return $progress;
        }
    }
    
    function datec($dc,$td){
        $dcon = new DateTime($dc);
        $tda = new DateTime($td);

        echo "From:&nbsp;&nbsp;&nbsp;&nbsp;".$dcon->format('F j, Y') ."&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;". $tda->format('F j, Y');
    }
?>