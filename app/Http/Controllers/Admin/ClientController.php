<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Http\Resources\Admin\Client\ClientItemResource;
use App\Http\Resources\Admin\Client\ClientResource;
use App\Models\Client;
use App\Repositories\Interfaces\ClientInterface;

class ClientController extends Controller
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @OA\Get(
     *      path="/api/admin/clients",
     *      tags={"Clients"},
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
      $clients = $this->client->getAll();
      return ClientResource::collection($clients);
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
     *      path="/api/admin/clients/store",
     *      tags={"Clients"},
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
     *                   example="+38(095)-000-00-00",
     *              ),
     *              @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   example="example@gmail.com",
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
    public function store(ClientRequest $request)
    {
        $this->client->store($request->only((new Client())->getFillable()));
        return response()->noContent(201);
    }

    /**
     * @OA\Get(
     *      path="/api/admin/clients/show/{id}",
     *      tags={"Clients"},
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
        return new ClientItemResource($this->client->getShow($id));
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
     *      path="/api/admin/clients/update/{id}",
     *      tags={"Clients"},
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
     *                   example="+38(095)-000-00-00",
     *              ),
     *              @OA\Property(
     *                   property="email",
     *                   type="string",
     *                   example="example@gmail.com",
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
    public function update(ClientRequest $request, $id)
    {
        $this->client->update($id,$request->only((new Client())->getFillable()));
        return response()->noContent(200);
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/clients/destroy/{id}",
     *      tags={"Clients"},
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
        $this->client->destroy($id);
        return response()->noContent(200);
    }
}
