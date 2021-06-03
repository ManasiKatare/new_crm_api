<?php

namespace Modules\Core\Http\Controllers\Backend;

use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Modules\Core\Http\Controllers\ApiBaseController;

use Modules\Core\Services\Common\CountryService;
use Modules\Core\Transformers\Response\CountrypMinifiedResource;

use Symfony\Component\HttpFoundation\Response;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * Controller for Country Data
 */
class CountryController extends ApiBaseController
{

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Get All Country Collection
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Modules\Core\Services\Common\CountryService $service
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *     path="/meta/country",
     *     tags={"Meta"},
     *     operationId="api.meta.get.country.all",
     *     security={{"omni_token":{}}},
     *     @OA\Response(response=200, description="Request was successfully executed."),
     *     @OA\Response(response=401, description="Authorization Error"),
     *     @OA\Response(response=500, description="Internal Server Error")
     * )
     */
    public function index(Request $request, CountryService $service, string $subdomain)
    {
        try {
            //Get Org Hash 
            $orgHash = $this->getOrgHashInRequest($request, $subdomain);

            //Get IP Address
            $ipAddress = $this->getIpAddressInRequest($request);

            //Create payload
            $payload = collect($request);

            //Fetch data from service
            $result = $service->index($payload, true);

            //Transform data
            $data = new CountrypMinifiedResource($result);

            //Send response data
            return $this->response->success(compact('data'));
            
        } catch(AccessDeniedHttpException $e) {
            return $this->response->fail([], Response::HTTP_UNAUTHORIZED);
        } catch(Exception $e) {
            return $this->response->fail([], Response::HTTP_BAD_REQUEST);
        }
    } //Function ends

} //Class ends