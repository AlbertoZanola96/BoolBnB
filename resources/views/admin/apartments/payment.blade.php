@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1>payment</h1>
                <form id="payment-form" action="{{ route('admin.apartments.sponsor.checkout', ['slug' => $apartment->slug, 'sponsor_id' => $sponsor->id]) }}" method="post">
                    @csrf
                    @method('POST')
            
                    <div id="dropin-container"></div>
                    <input type="submit">
                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                </form>
            
                <!-- pass client token to js  -->
                <div id="clientToken" class="d-none">
                    @php
                        echo $clientToken;
                    @endphp
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        const form = document.getElementById('payment-form');
        let token = document.getElementById('clientToken');
        braintree.dropin.create({
            authorization: token.innerHTML,
            container: document.getElementById('dropin-container'),
        // ...plus remaining configuration
        }, (error, dropinInstance) => {
        // Use `dropinInstance` here
        // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) console.error(error);

                // Step four: when the user is ready to complete their
                //   transaction, use the dropinInstance to get a payment
                //   method nonce for the user's selected payment method, then add
                //   it a the hidden field before submitting the complete form to
                //   a server-side integration
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
                });
            });
        });
        console.log(token);
    </script>
@endsection