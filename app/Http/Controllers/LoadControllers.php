<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiRest\ApiRestController;

class LoadControllers extends Controller
{
    protected static $request;
  
    public function __construct(Request $request)
    {
        self::$request = $request;
    }
    /**
     * @method ApiRest
     * @return @var string json    
     */
    public static function ApiRest(): string // json 
    {
        ApiRestController::ServerMethod();
        try {
            $control = new ApiRestController(self::$request);
            return  json_encode($control::getFunction());
        } catch (Exception $th) {
            return self::printError($th);
        }
    }
    /**
     * @var self::printError (private)
     * @param class[Exception]
     * @return string
     */
    private static function printError($error): string // json 
    {
        return json_encode([
            "message" => $error->getMessage(),
            "file" => $error->getFile(),
            "line" => $error->getLine(),
        ]);
    }
}


