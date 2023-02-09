<x-front.master-layout>
<main>
    <div class="row row--g-10 pb-2em">
        <div class="col-12 col-lg-10 offset-xxl-1 mt-5">
            <div class="card card--shadow-purple mb-80em">
                <div class="row row--full row--g-10">
                    <div class="col-lg-12 mt-20em mb-20em text-center">
                        <div class="headline-wave headline-wave--center">
                            <h1 class="headline-1">Thanks for Your Order !!</h1>
                            <svg width="100px" height="16px" class="stroke-orange">
                                <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
                            </svg>
                        </div>
                        <div class="row mt-10em">
                            <div class="col-lg-12 col-md-12 col-sm-12 orderD-thanks">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="Thanks-order">
                                            <b>Date</b>-
                                            <span>{{ date('d M Y',strtotime($booking->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="Thanks-order">
                                            <b>Payment Status</b>-
                                            <span>{{ $booking->payment_status }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="Thanks-order">
                                            <b>Status</b>-
                                            <span>{{ $booking->status }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="Thanks-order">
                                            <b>Amount</b>-
                                            <span>AED {{ $booking->total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--full row--g-10">
                    <div class="col-lg-4 mt-20em mb-20em text-center">
                        <a class="btn btn--orange" href="{{ url('/') }}" title="Go To Home">Go To Home</a>
                    </div>
                    <div class="col-lg-4 mt-20em mb-20em text-center">
                        <a class="btn btn--purple" href="{{ url('orders/details/'.$booking->random_id) }}"title="View Order">View Order</a>
                    </div>
                    <div class="col-lg-4 mt-20em mb-20em text-center">
                        <a class="btn btn--black" href="{{url('pdf-download/'.$booking->random_id)}}" target="blank" title="Download PDF">Download PDF</a>
                    </div>
                </div>
                <div class="row row--full row--g-10">
                    <div class="col-lg-4 mt-20em mb-20em text-center">
                    </div>
                    <div class="col-lg-4 mt-20em mb-20em text-center">
                        <table class="card__table">
                            <tbody style="text-align: center">
                                <tr class="font-lg">
                                    <td class="text-center">Order ID</td>
                                    <td>
                                        <svg class="fill-blurple" width="28px" height="28px">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-tour-start"></use>
                                        </svg>
                                    </td>
                                    <td class="text-left">
                                        <time>{{ $booking->random_id }}</time>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4 mt-20em mb-20em text-center"></div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-front.master-layout>