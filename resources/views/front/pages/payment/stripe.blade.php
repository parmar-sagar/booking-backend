<x-front.master-layout>
    <div id="barba-wrapper" aria-live="polite">
        <div class="barba-container">
            <div class="section">
                <div class="row row--g-10">
                    <div class="col-12 col-lg-6 col-xxl-6 offset-xxl-3">
                    <figure class="bg-media--glasses"> <img src="fonts/wm-glasses.svg" alt="Background"> </figure>
                    <form id="form-submit" class="form form--contact animated fadeInUp active" method="POST" id="paymentForm" action="{{ url('payment/stripe-payment')}}">
                        @csrf
                        <h2 class="headline-3 color-white mb-5em">Stripe Payment</h2>
                        <input type="hidden" name="random_id" value="{{ $booking->random_id }}">
                        <input type="hidden" name="amount" value="{{ $booking->total }}">
                        <div class="form__row">
                            <div class="form__group"> 
                                <input type="text" name="fullName" id="fullName" placeholder="Full name (on the card)" class="form__input" required="">
                                <!--<label class="form__label">Full name (on the card)</label> -->
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__group"> 
                                <input type="text" name="cardNumber" id="cardNumber" placeholder="Card number" class="form__input" required="">
                                <!--<label class="form__label" for="cardNumber">Card number</label> -->
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__group">
                                <div class="input-group">
                                <select class="form__input" name="month" style="width: 40%;">
                                    <option value="">MM</option>
                                    @foreach(range(1, 12) as $month)
                                    <option value="{{$month}}">{{$month}}</option>
                                    @endforeach
                                </select>
                                <select class="form__input" name="year" style="width: 40%;">
                                    <option value="">YYYY</option>
                                    @foreach(range(date('Y'), date('Y') + 10) as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="cvv" id="cvv" class="form__input" placeholder="CVV" required="" style="width:20%; margin:0">
                                </div>
                            </div>
                        </div>
                        <div class="form__row text-align-right"> 
                            <button class="btn btn--white btn--full" type="submit">Pay {{ $booking->total }}</button> 
                        </div>
                        <div class="loading"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front.master-layout>
<script>
    $("#form-submit").validate();
</script>