<?php

function    json_validator_response($validator){


    if ($validator->fails()) {
        $errors = "";
        foreach ($validator->messages()->all() as $error){
            $errors .= $error."</br>";
        }

        return redirect('register')->with('danger', true)->with('message',$errors);
    }

}
