<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryTypeRequest;
use App\Http\Resources\Admin\DeliveryType\DeliveryTypeItemResource;
use App\Http\Resources\Admin\DeliveryType\DeliveryTypeResource;
use App\Models\DeliveryType;
use App\Repositories\Interfaces\DeliveryTypeInterface;
use Illuminate\Http\Request;

class DeliveryTypeController extends Controller
{
    private $deliveryType;

    public function __construct(DeliveryTypeInterface $deliveryType)
    {
        $this->deliveryType = $deliveryType;
    }

    /**
     * @OA\Get(
     *      path="/api/admin/deliverytypes",
     *      tags={"Delivery types"},
     *      summary="Сторінка клієнтів",
     *      description="Повертає json список клієнтів",
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
        $deliveryTypes = $this->deliveryType->getAll();
        return DeliveryTypeResource::collection($deliveryTypes);
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
     *      path="/api/admin/deliverytypes/store",
     *      tags={"Delivery types"},
     *      summary="Створити нового клієнта",
     *      description="Повертає статус",
     *     security={
     *     		{"bearerAuth":{}}
     *   	},
     *      @OA\RequestBody(
     *        required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                   property="name",
     *                   type="string",
     *                   example="DHL",
     *              ),
     *              @OA\Property(
     *                   property="active",
     *                   type="boolean",
     *                   example="true",
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
    public function store(DeliveryTypeRequest $request)
    {
        $this->deliveryType->store($request->only((new DeliveryType())->getFillable()));
        return response()->noContent(201);
    }

    /**
     * @OA\Get(
     *      path="/api/admin/deliverytypes/show/{id}",
     *      tags={"Delivery types"},
     *      summary="Дані одного клієнта",
     *      description="Повертає json",
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
        return new DeliveryTypeItemResource($this->deliveryType->getShow($id));
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
     *      path="/api/admin/deliverytypes/update/{id}",
     *      tags={"Delivery types"},
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
     *              @OA\Property(
     *                   property="name",
     *                   type="string",
     *                   example="DHL",
     *              ),
     *              @OA\Property(
     *                   property="active",
     *                   type="boolean",
     *                   example="true",
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
    public function update(DeliveryTypeRequest $request, $id)
    {
        $this->deliveryType->update($id,$request->only((new DeliveryType())->getFillable()));
        return response()->noContent(200);
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/deliverytypes/destroy/{id}",
     *      tags={"Delivery types"},
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
        $this->deliveryType->destroy($id);
        return response()->noContent(200);
    }
}
