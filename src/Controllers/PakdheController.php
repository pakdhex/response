<?php

namespace Pakdhe\Response\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Pakdhe\Response\Traits\ApiResponser;
use Pakdhe\Response\Resources\PaginateJsonResource;
use App;

class PakdheController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponser;
    public function language()
    {
        $langcode = request()->get('lang_code') ?? (env("BAHASA") ?? "id");
        App::setLocale($langcode);
        App::setFallbackLocale($langcode);
    }
    public function response($response){
        if(isset($response["success"])){
            if($response["success"]){
                return $this->successResponse($response["message"] ?? 'success', $response["data"], 200);
            }else{
                return $this->errorResponse($response["message"], $response["error_code"] ?? 401, $response["status_code"] ?? config('errorcode.invalidjson.code'));
            }
        }else{
            return $response;
        }
    }

    public function responsePaginate($response){
        if(isset($response["success"])){
            if($response["success"]){
                return PaginateJsonResource::collection($response["data"])->additional([
                    'status' => 200,
                    'message' => 'success',
                ]);
            }else{
                return $this->errorResponse($response["message"], $response["error_code"] ?? 401, $response["status_code"] ?? config('errorcode.invalidjson.code'));
            }
        }else{
            return $response;
        }
    }
}
