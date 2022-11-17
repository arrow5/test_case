<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyRequest;
use App\Http\Resources\Admin\Currency\CurrencyItemResource;
use App\Http\Resources\Admin\Currency\CurrencyResource;
use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $currency;

    public function __construct(CurrencyInterface $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @OA\Get(
     *      path="/api/admin/currencies",
     *      tags={"Currencies"},
     *      summary="All currencies",
     *      description="Return json list currencies",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation", @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function index()
    {
        return CurrencyResource::collection($this->currency->getAll());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/admin/currencies/store",
     *      tags={"Currencies"},
     *      summary="Creates a new currency",
     *      description="returns status",
     *     security={
     *     		{"bearerAuth":{}}
     *   	},
     *      @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *              @OA\Property(
     *                   property="name",
     *                   type="string",
     *                   example="Доллар США",
     *              ),
     *              @OA\Property(
     *                   property="short_name",
     *                   type="string",
     *                   example="доллар",
     *              ),
     *              @OA\Property(
     *                   property="name_iso",
     *                   type="string",
     *                   example="USD",
     *              ),
     *              @OA\Property(
     *                   property="code_iso",
     *                   type="string",
     *                   example="840",
     *              ),
     *              @OA\Property(
     *                   property="symbol_iso",
     *                   type="string",
     *                   example="$",
     *              ),
     *              @OA\Property(
     *                   property="name1",
     *                   type="string",
     *                   example="Доллар",
     *              ),
     *              @OA\Property(
     *                   property="name2",
     *                   type="string",
     *                   example="Доллара",
     *              ),
     *              @OA\Property(
     *                   property="name3",
     *                   type="string",
     *                   example="Долларов",
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(CurrencyRequest $request)
    {
        $this->currency->store($request->only((new Currency())->getFillable()));
        return response()->noContent(201);
    }

    /**
     * @OA\Get(
     *      path="/api/admin/currencies/show/{id}",
     *      tags={"Currencies"},
     *      summary="Single currency data",
     *      description="Returns json",
     *     security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description = "id",
     *          in="path",
     *          example="1",
     *          	@OA\Schema(
     *          		type="integer"
     *          	)
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation", @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show($id)
    {
        return new CurrencyItemResource($this->currency->getShow($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/admin/currencies/update/{id}",
     *      tags={"Currencies"},
     *      summary="Зміна даних клієнта",
     *      description="Повертає статус",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="id акаунта",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example="1"
     *          )
     *      ),
     *      @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *               @OA\Property(
     *                   property="name",
     *                   type="string",
     *                   example="Доллар США",
     *              ),
     *              @OA\Property(
     *                   property="short_name",
     *                   type="string",
     *                   example="доллар",
     *              ),
     *              @OA\Property(
     *                   property="name_iso",
     *                   type="string",
     *                   example="USD",
     *              ),
     *              @OA\Property(
     *                   property="code_iso",
     *                   type="string",
     *                   example="840",
     *              ),
     *              @OA\Property(
     *                   property="symbol_iso",
     *                   type="string",
     *                   example="$",
     *              ),
     *              @OA\Property(
     *                   property="name1",
     *                   type="string",
     *                   example="Доллар",
     *              ),
     *              @OA\Property(
     *                   property="name2",
     *                   type="string",
     *                   example="Доллара",
     *              ),
     *              @OA\Property(
     *                   property="name3",
     *                   type="string",
     *                   example="Долларов",
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function update(CurrencyRequest $request, $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/currencies/destroy/{id}",
     *      tags={"Currencies"},
     *      summary="Видалити клієнта",
     *      description="Повертає статус",
     *     security={
     *     		{"bearerAuth":{}}
     *   	},
     *      @OA\Parameter(
     *          name="id",
     *          description="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *                  type="integer",
     *                  example="1"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        //
    }
}
