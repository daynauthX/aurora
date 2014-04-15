<?php
class Error { 
    public static function show($num = -1){
        $return = array();
        
        switch ($num):
            case '1':
                $return['error'] = $num;
                $return['message'] = 'Operation could not be completed';
                break;
            default:
                $return['error'] = -1;
                $return['message'] = 'Default error message';
        endswitch;
                
        return Response::json($return);
    }

}

