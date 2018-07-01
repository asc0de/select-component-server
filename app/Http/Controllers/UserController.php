<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchString = $request->query("search");

        $users = array((object) array(
            'id'=>1,
            'imgUrl'=>"https://pp.userapi.com/c841339/v841339466/51b24/unRuQrPG6kA.jpg?ava=1v",
            'name'=>"Илья Суховей",
            'university'=> "БГТУ (Военмех)",
            'pageAddress'=>'o_o__oo'
        ), (object) array(
            'id'=>2,
            'imgUrl'=>"https://pp.userapi.com/c846021/v846021248/79dc8/VdouMjPTBy0.jpg?ava=1",
            'name'=>"Альбина Деханова",
            'university'=> "",
            'pageAddress'=>'id103458256'
        ), (object) array(
            'id'=>3,
            'imgUrl'=>"https://pp.userapi.com/c841338/v841338120/3b14c/kjybYosMc_0.jpg?ava=1",
            'name'=>"Василий Котов",
            'university'=> "",
            'pageAddress'=>'vasya_kotoff'
        ), (object) array(
            'id'=>4,
            'imgUrl'=>"https://pp.userapi.com/c624626/v624626708/3fdbe/z1YhrwafU64.jpg?ava=1",
            'name'=>"Марина Полякова",
            'university'=> "СПбГХФА",
            'pageAddress'=>'marina_poliakova'
        ), (object) array(
            'id'=>5,
            'imgUrl'=>"https://pp.userapi.com/c629320/v629320419/3349a/V3t3mqmJMiE.jpg?ava=1",
            'name'=>"Максим Левшин",
            'university'=> "СПбГХФА",
            'pageAddress'=>'id6939419'
        ));

        if ($searchString == "") { 
            $filteredUsers = $users;
        } else {
            $filteredUsers = array_filter(
                $users,
                function ($item) use ($searchString) {
                    return strpos($item->pageAddress, $searchString) !== false;
                }
            );
        };

        return response()->json($filteredUsers, 200, [ 'Content-Type' => 'application/json; charset=utf-8' ], JSON_UNESCAPED_UNICODE );
    }
}