<?php

namespace Mukuru\Services;

use Illuminate\Support\MessageBag;
use Mukuru\Interfaces\OrderRepositoryInterface;
use Mukuru\Interfaces\RateRepositoryInterface;
use Mukuru\Traits\ErrorTrait;

class CreateOrderService
{
    use ErrorTrait;

    public function createFromUsd(OrderRepositoryInterface $orderRepo, RateRepositoryInterface $rateRepo, $amount,
                                  $dryRun=true)
    {
        $buy = $rateRepo->rate->rate * $amount;

        return $this->buildOrder($orderRepo, $rateRepo, $amount, $buy, $dryRun);
    }

    public function createToUsd(OrderRepositoryInterface $orderRepo, RateRepositoryInterface $rateRepo, $amount,
                                $dryRun=true)
    {
        $pay = $amount / $rateRepo->rate->rate;

        return $this->buildOrder($orderRepo, $rateRepo, $pay, $amount, $dryRun);
    }

    protected function buildOrder(OrderRepositoryInterface $orderRepo, RateRepositoryInterface $rateRepo, $paid,
                                  $bought, $dryRun=true)
    {
        //As far as I am aware, you should round totals before performing discounts/surcharges etc? But I stand to be corrected here
        $paid = round($paid, 2);
        $bought = round($bought, 2);
        $surcharge = round($rateRepo->getSurcharge($paid), 2);
        $discount = 0; //calulcated post invoice save

        $orderRepo->order->fill([
            'currency_from' => $rateRepo->rate->from,
            'currency_to' => $rateRepo->rate->to,
            'rate' => $rateRepo->rate->rate,
            'amount_paid' => $paid,
            'amount_bought' => $bought,
            'amount_surcharge' => $surcharge,
            'amount_discount' => $discount,
            'amount_total' => $paid + $surcharge - $discount,
        ]);

        if(!$dryRun) {
            if($orderRepo->save()) {
                $orderRepo->postSave();
            }else{
                $this->setErrors(new MessageBag([
                    'generic' => ['There was a problem saving the order']
                ]));
                return false;
            }
        }

        return $orderRepo->order;
    }
}
