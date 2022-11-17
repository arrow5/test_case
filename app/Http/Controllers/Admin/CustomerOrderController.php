<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerOrderRequest;
use App\Http\Resources\Admin\CustomerOrder\CustomerOrderItemResource;
use App\Http\Resources\Admin\CustomerOrder\CustomerOrderResource;
use App\Http\Resources\Admin\DeliveryType\DeliveryTypeResource;
use App\Http\Resources\Admin\PaymentType\PaymentTypeResource;
use App\Models\CustomerOrder;
use App\Repositories\Interfaces\CustomerOrderInterface;
use App\Repositories\Interfaces\DeliveryTypeInterface;
use App\Repositories\Interfaces\PaymentTypeInterface;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    private $customerOrder;
    private $deliveryType;
    private $paymentType;

    public function __construct(CustomerOrderInterface $customerOrder,DeliveryTypeInterface $deliveryType,PaymentTypeInterface $paymentType)
    {
        $this->customerOrder = $customerOrder;
        $this->deliveryType = $deliveryType;
        $this->paymentType = $paymentType;
    }
    /**
     * @OA\Get(
     *      path="/api/admin/customerorders",
     *      tags={"Customer orders"},
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
        return CustomerOrderResource::collection($this->customerOrder->getAll());
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
     *      path="/api/admin/customerorders/store",
     *      tags={"Customer orders"},
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
     *               @OA\Property(
     *                   property="client_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="status_id",
     *                   type="interger",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="delivery_type_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="payment_type_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="sum",
     *                   type="float",
     *                   example="2000.00",
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
    public function store(CustomerOrderRequest $request)
    {
        $this->customerOrder->store($request->only((new CustomerOrder())->getFillable()));
        return response()->noContent(201);
    }

    /**
     * @OA\Get(
     *      path="/api/admin/customerorders/show/{id}",
     *      tags={"Customer orders"},
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

        return (new CustomerOrderItemResource($this->customerOrder->getShow($id)))->additional([
            'DeliveryTypes' => DeliveryTypeResource::collection($this->deliveryType->getAll()),
            'paymentTypes' => PaymentTypeResource::collection($this->paymentType->getAll()),
        ]);
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
     *      path="/api/admin/customerorders/update/{id}",
     *      tags={"Customer orders"},
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
     *                   property="client_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="status_id",
     *                   type="interger",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="delivery_type_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="payment_type_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="sum",
     *                   type="float",
     *                   example="2000.00",
     *              ),
     *
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
    public function update(CustomerOrderRequest $request, $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/customerorders/destroy/{id}",
     *      tags={"Customer orders"},
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
