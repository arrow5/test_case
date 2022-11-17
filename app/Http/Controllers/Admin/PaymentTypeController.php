<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentTypeRequest;
use App\Http\Resources\Admin\DeliveryType\DeliveryTypeResource;
use App\Http\Resources\Admin\PaymentType\PaymentTypeItemResource;
use App\Models\PaymentType;
use App\Repositories\Interfaces\PaymentTypeInterface;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    private $paymentType;

    public function __construct(PaymentTypeInterface $paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @OA\Get(
     *      path="/api/admin/paymenttypes",
     *      tags={"Payment types"},
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
        $paymentTypes = $this->paymentType->getAll();
        return DeliveryTypeResource::collection($paymentTypes);
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
     *      path="/api/admin/paymenttypes/store",
     *      tags={"Payment types"},
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
     *              @OA\Property(
     *                   property="name",
     *                   type="string",
     *                   example="Visa",
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
    public function store(PaymentTypeRequest $request)
    {
        $this->paymentType->store($request->only((new PaymentType())->getFillable()));
        return response()->noContent(201);
    }

    /**
     * @OA\Get(
     *      path="/api/admin/paymenttypes/show/{id}",
     *      tags={"Payment types"},
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
        return new PaymentTypeItemResource($this->paymentType->getShow($id));
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
     *      path="/api/admin/paymenttypes/update/{id}",
     *      tags={"Payment types"},
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
     *                   example="Master Card",
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
    public function update(PaymentTypeRequest $request, $id)
    {
        $this->paymentType->update($id,$request->only((new PaymentType())->getFillable()));
        return response()->noContent(200);
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/paymenttypes/destroy/{id}",
     *      tags={"Payment types"},
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
        $this->paymentType->destroy($id);
        return response()->noContent(200);
    }
}
