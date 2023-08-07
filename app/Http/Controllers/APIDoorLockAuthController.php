<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoorLockCard;
use App\Models\DoorLockAuthLog;

class APIDoorLockAuthController extends Controller
{
    public function auth(Request $request)
    {
        $approved = DoorLockCard::where('uid', $request['uid'])->first();
        if ($approved) {
            $result = DoorLockAuthLog::create([
                'uid' => $approved['uid'],
                'location' => $request['location'],
                'approved' => true
            ]);
            return ([
                'response' => true,
                'data' => $result
            ]);
        }else{
            $result = DoorLockAuthLog::create([
                'uid' => $request['uid'],
                'location' => $request['location'],
                'approved' => false
            ]);
            return ([
                'response' => true,
                'data' => [
                    'approved' => false,
                    'message' => 'auth failed'
                ]
            ]);
        }
    }
}
