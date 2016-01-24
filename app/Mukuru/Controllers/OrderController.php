<?php

namespace Mukuru\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Mukuru\Factories\OrderRepositoryFactory;
use Mukuru\Factories\RateRepositoryFactory;
use Mukuru\Services\CreateOrderService;

class OrderController extends Controller
{

    protected $createOrder;

    protected $orderRepoFactory;

    protected $rateRepoFactory;

    public function __construct(CreateOrderService $createOrder, OrderRepositoryFactory $orderRepoFactory,
                                RateRepositoryFactory $rateRepoFactory)
    {
        $this->createOrder = $createOrder;
        $this->orderRepoFactory = $orderRepoFactory;
        $this->rateRepoFactory = $rateRepoFactory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response('Not implemented', 501);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('Not implemented', 501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO, create custom validation rule and use laravel validation instead
        if(!$request->has('amount_from_usd') && !$request->has('amount_to_usd')) {
            return response(new MessageBag([
                'generic' => ['Either "amount_to_usd" or "amount_from_usd" needs to be sent']
            ]), 400);
        }

        $rateRepo = $this->rateRepoFactory->create($request->get('currency'));

        if(!$rateRepo) {
            return response(new MessageBag([
                'generic' => ['Please provide a valid currency to convert']
            ]), 400);
        }

        $orderRepo = $this->orderRepoFactory->create($request->get('currency'));

        if($request->has('amount_to_usd')) {
            $order = $this->createOrder->createToUsd($orderRepo, $rateRepo, $request->get('amount_to_usd'),
                $request->get('dry_run'));

        }else if($request->has('amount_from_usd')) {
            $order = $this->createOrder->createFromUsd($orderRepo, $rateRepo, $request->get('amount_from_usd'),
                $request->get('dry_run'));

        }

        if($order) {
            return $order;
        }

        return response($this->createOrder->getErrors(), 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response('Not implemented', 501);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response('Not implemented', 501);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response('Not implemented', 501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response('Not implemented', 501);
    }
}
