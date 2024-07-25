<?php

namespace App\services;

use Symfony\Component\HttpFoundation\Response;

class ApiResponseFormat
{

    public static function success($data,$message,$statusCode=Response::HTTP_OK)
    {
        return response()->json([
            "Status"    =>  true,
            "Data"      =>  $data,
            "Message"   => $message,

            ],$statusCode );
    }

    public static function error($data,$message , $response_code=Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response()->json([
            "Status"    =>  false,
            "Errors"    =>  $data,
            "errors"    => $message,
            ],$response_code);
    }

    public static function successPagination($data,$message,$currentPage,$totalPages,$totalRecords,$perPage){
        return response()->json([
            "Status"    =>true,
            "Data"      =>$data,
            "Message"   => $message,
            "currentPage"=>$currentPage,
            "totalPages"=>$totalPages,
            "totalRecords"=>$totalRecords,
            "numberOfRecourdsPerPage"=>$perPage,
            "related"=>false
            ], Response::HTTP_OK);
    }

}
