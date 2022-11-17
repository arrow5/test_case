<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GoodInterface;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    private $good;
    public function __construct(GoodInterface $good)
    {
        $this->good = $good;
    }

    /**
     * @OA\Get(
     *      path="/api/admin/goods",
     *      tags={"Goods"},
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
        //
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
     *      path="/api/admin/goods/store",
     *      tags={"Goods"},
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
     *                   property="first_name",
     *                   type="string",
     *                   example="Андрій",
     *              ),
     *              @OA\Property(
     *                   property="last_name",
     *                   type="string",
     *                   example="Мельник",
     *              ),
     *              @OA\Property(
     *                   property="phone",
     *                   type="string",
     *                   example="+38(095)-022-81-26",
     *              ),
     *              @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   example="vagary18",
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
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/api/admin/goods/show/{id}",
     *      tags={"Goods"},
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
        //
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
     *      path="/api/admin/goods/update/{id}",
     *      tags={"Goods"},
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
     *                   property="login",
     *                   type="string",
     *                   example="_bigmir_smile_",
     *              ),
     *              @OA\Property(
     *                   property="phone",
     *                   type="string",
     *                   example="+38(095)-022-81-26",
     *              ),
     *              @OA\Property(
     *                   property="email_password",
     *                   type="string",
     *                   example="vagary18",
     *              ),
     *              @OA\Property(
     *                   property="session",
     *                   type="string",
     *                   example="49943231002%3AyrQ4nK302XxHUW%3A18",
     *              ),
     *              @OA\Property(
     *                   property="bussines_instagram_account_id",
     *                   type="string",
     *                   example="17841444782304448",
     *              ),
     *              @OA\Property(
     *                   property="date_created",
     *                   type="string",
     *                   example="2022-05-18",
     *              ),
     *              @OA\Property(
     *                   property="password",
     *                   type="string",
     *                   example="vagary18",
     *              ),
     *              @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   example="ruslan.orelec123@gmail.com",
     *              ),
     *              @OA\Property(
     *                   property="category_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="country_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="parent_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="proxy_id",
     *                   type="integer",
     *                   example="1",
     *              ),
     *              @OA\Property(
     *                   property="user_agent_id",
     *                   type="integer",
     *                   example="1",
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/goods/destroy/{id}",
     *      tags={"Goods"},
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
