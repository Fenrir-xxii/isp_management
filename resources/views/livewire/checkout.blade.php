<div>
    {{-- <h1>{{ $status }}</h1> --}}
    <div id="liqpay_checkout"></div>
    {{-- <button wire:click="updateStatus('New Value')">Update Status</button> --}}
</div>

@push('custom-scripts')
    <!-- LiqPay -->
    <script>
        window.LiqPayCheckoutCallback = function() {
            LiqPayCheckout.init({
                // data: "eyAidmVyc2lvbiIgOiAzLCAicHVibGljX2tleSIgOiAieW91cl9wdWJsaWNfa2V5IiwgImFjdGlv" +
                //     "biIgOiAicGF5IiwgImFtb3VudCIgOiAxLCAiY3VycmVuY3kiIDogIlVTRCIsICJkZXNjcmlwdGlv" +
                //     "biIgOiAiZGVzY3JpcHRpb24gdGV4dCIsICJvcmRlcl9pZCIgOiAib3JkZXJfaWRfMSIgfQ==",
                // signature: "QvJD5u9Fg55PCx/Hdz6lzWtYwcI=",
                data: "{{ $data }}",
                signature: "{{ $signature }}",
                embedTo: "#liqpay_checkout",
                language: "en",
                mode: "embed" // embed || popup
            }).on("liqpay.callback", function(data) {
                console.log("Status", data.status);
                console.log("Data", data);
                @this.call('setStatus', data.status);
            }).on("liqpay.ready", function(data) {
                // ready
            }).on("liqpay.close", function(data) {
                // close
            });
        };

        // document.addEventListener('DOMContentLoaded', function() {
        //     window.LiqPayCheckoutCallback = function() {
        //         LiqPayCheckout.init({
        //             // data: "eyAidmVyc2lvbiIgOiAzLCAicHVibGljX2tleSIgOiAieW91cl9wdWJsaWNfa2V5IiwgImFjdGlv" +
        //             //     "biIgOiAicGF5IiwgImFtb3VudCIgOiAxLCAiY3VycmVuY3kiIDogIlVTRCIsICJkZXNjcmlwdGlv" +
        //             //     "biIgOiAiZGVzY3JpcHRpb24gdGV4dCIsICJvcmRlcl9pZCIgOiAib3JkZXJfaWRfMSIgfQ==",
        //             // signature: "QvJD5u9Fg55PCx/Hdz6lzWtYwcI=",
        //             data: "{{ $data }}",
        //             signature: "{{ $signature }}",
        //             embedTo: "#liqpay_checkout",
        //             language: "en",
        //             mode: "embed" // embed || popup
        //         }).on("liqpay.callback", function(data) {
        //             console.log("Status", data.status);
        //             console.log("Data", data);
        //             // console.log("this->status", "$status");
        //             // "@this.set('status', data.status)";
        //             // Livewire.emit('statusUpdated', data.status);
        //             // Livewire.hook('updated', () => {
        //             //     Livewire.emit('setStatus', data.status);
        //             // });
        //             @this.set('status', data.status);
        //             // Livewire.emit('setStatus', data.status);
        //             console.log("this->status", "$status");
        //             // fetch("/checkout/setStatus", {
        //             // 	method: "POST",
        //             // 	headers: {
        //             // 		'Content-Type': "application/json"
        //             // 	},
        //             // 	body: JSON.stringify(data.notify)		// var 1 - PaymentResponse
        //             // 	// body: JSON.stringify({				// var 2 - PaymentResultForm
        //             // })


        //             // Livewire.emitTo('Checkout','setStatus', data.status);
        //             // @this.call('setStatus', data.status);
        //             // @this.set('status', data.status);
        //             // @this.status = data.status;
        //             // console.log("this->status", "{{ $status }}");
        //         }).on("liqpay.ready", function(data) {
        //             // ready
        //         }).on("liqpay.close", function(data) {
        //             // close
        //         });
        //     };
        // });

        //  // Trigger Livewire method directly from script
        //  Livewire.hook('message.sent', (message, component) => {
        //     if (message.updateStatus) {
        //         component.updateStatus(message.updateStatus);
        //     }
        // });

        // // Your custom script to trigger Livewire method
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Replace this with your logic to determine when to update the status
        //     let newStatus = 'New Status';

        //     Livewire.emit('message.sent', {
        //         updateStatus: newStatus,
        //     });
        // });
    </script>
    <script src="//static.liqpay.ua/libjs/checkout.js" async></script>
@endpush
