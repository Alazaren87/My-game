<?php

class View {
    
    function render($content_view, $tpl = 'tpl_view.php', $data = null){
        
        if(is_array($data)) {
            extract($data, EXTR_OVERWRITE);
        }
        
        include 'application/view/'.$tpl;
    }
}
