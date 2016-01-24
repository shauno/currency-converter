<?php

namespace Mukuru\Services;

use GuzzleHttp\Client;
use Illuminate\Support\MessageBag;
use Mukuru\Models\Rate;
use Mukuru\Traits\ErrorTrait;

class UpdateRatesService
{
    use ErrorTrait;

    protected $rate;
    protected $client;

    public function __construct(Rate $rate, Client $client)
    {
        $this->rate = $rate;
        $this->client = $client;
    }

    public function update()
    {
        $rates = $this->client->get('/api/live?access_key='.env('JSON_RATE_API_KEY').'&currencies=ZAR,GBP,EUR,KES&source=USD&format=1');

        $data = json_decode($rates->getBody()->getContents());

        if ($rates->getStatusCode() === 200 && $data->success === true) {
            //Loop through all returned rates
            foreach ($data->quotes as $currency => $rate) {
                // get rate row for each quote (TODO, consider auto creating new rates here, allowing new rates to be added dynamically?)
                $rateModel = $this->rate->where('from', '=', 'USD')->where('to', '=', substr($currency, 3))->first();

                if ($rateModel) {
                    $rateModel->rate = $rate;
                    $rateModel->save();
                }
            }
        } else {
            $this->setErrors(new MessageBag([
                $data->error->code => [$data->error->info],
            ]));

            return false;
        }

        return true;
    }
}
