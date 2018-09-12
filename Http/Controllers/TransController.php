<?php

namespace Modules\Page\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BdTrans;

use AjaxResponse;
class TransController extends Controller
{
    public function trans(Request $request)
    {
        try{
            $slug = $request->get('slug');
            $res = empty($slug) ? '' : BdTrans::slug($slug);
        }catch(Exception $e){
            return AjaxResponse::fail('',['error'=>$e->getMessage()]);
        }

        return AjaxResponse::success('', ['res' => $res ]);
    }
}
