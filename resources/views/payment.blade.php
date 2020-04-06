@extends('layouts.app')
@section('head')
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
    </style>

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pay for subscription</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <input id="card-holder-name" type="text" class="form-control" placeholder="Card Holder">
                    <select name="plan" id="subscription-plan" class="form-control my-3">
                        @foreach ($plans as $key=>$plan)
                            <option value="{{$key}}">{{$plan}}</option>
                        @endforeach
                    </select>

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"></div>

                    <button class="mt-2 btn btn-sm btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        window.addEventListener('load', () => {
            const stripe = Stripe('{{env('STRIPE_KEY')}}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const plan = document.getElementById('subscription-plan').value;
                cardButton.innerHTML = 'Please wait...';
                cardButton.setAttribute('disabled', 'true');
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );

                if (error) {
                    cardButton.innerHTML = 'Error!';
                    cardButton.setAttribute('disabled', 'false');
                    console.log("Error: ", error);
                } else {
                    // The card has been verified successfully...
                    // cardButton.attr('disabled', false);
                    axios.post('/subscribe',{
                        payment_method: setupIntent.payment_method,
                        plan
                    }).then(res => {
                        console.log("success: ", setupIntent.payment_method);
                        cardButton.innerHTML = 'Success!';
                    }).catch(err=>console.error)
                }
            });
        })
        
    </script>

@endsection