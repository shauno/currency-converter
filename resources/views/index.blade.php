@extends('layouts/default')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-12">

                    <form class="form-inline" id="quote-form-1">
                        How much would

                        <input type="text" class="form-control amount" size="5" placeholder="eg 100">

                        <select class="form-control currency">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->to }}">{{ $currency->to }}</option>
                            @endforeach
                        </select>

                        Cost me in USD?

                        <br />
                        <button type="submit" class="btn btn-primary" id="quote-1">Quote &raquo;</button>

                    </form>

                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-lg-12">

                    <form class="form-inline" id="quote-form-2">
                        How much would

                        <div class="input-group">
                            <div class="input-group-addon">USD</div>
                            <input type="text" class="form-control amount" size="5" placeholder="eg 100">
                        </div>

                        buy me in

                        <select class="form-control currency">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->to }}">{{ $currency->to }}</option>
                            @endforeach
                        </select>

                        <br />
                        <button type="submit" class="btn btn-primary">Quote &raquo;</button>
                    </form>

                </div>
            </div>

        </div>

        <div class="col-lg-6" id="quote-results">
            <table class="table" id="quote-table" style="display: none;">
                <tr>
                    <td>Currency</td>
                    <td>Amount</td>
                    <td>Surchage</td>
                    <td>Total</td>
                </tr>

                <tr>
                    <td id="quote-currency"></td>
                    <td id="quote-amount"></td>
                    <td id="quote-surcharge"></td>
                    <td id="quote-total"></td>
                </tr>

                <tr>
                    <td colspan="4" align="right">
                        <button type="button" class="btn btn-primary" id="quote-order">Purchase</button>
                        <span id="quote-message" style="display: none;"></span>
                    </td>
                </tr>

            </table>
        </div>
    </div>

@endsection