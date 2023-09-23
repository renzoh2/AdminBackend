<?php

namespace App\Http\Helper;

class ResponseBuilder{

    public static function response($code, $status, $response = null)
    {
        $json['code'] = $code;
        $json['status'] = $status;
        if($response)
        {
            $json = array_merge($json, self::formatData($response));
        }
        
            
        return response()->json($json,$code);
    }

    private static function formatData(array $response)
    {
        $data = null;
        foreach($response as $key => $item)
        {
            $data[$key] = $item;
        }

        return  $data;
    }
}

?>