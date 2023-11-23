@extends('layout.main')
@section('container')
    <div class="flex flex-col items-center min-h-screen gap-2 py-24">
        <div class="w-1/2 mx-auto my-auto rounded-md" id="reader"></div>
        <form action="{{route('scan')}}" method="post">
            <input type="hidden" name="barcode" id="barcode">
        </form>
        <input type="file" id="qr-input-file" accept="image/*">
    </div>
    @push('custom-scripts')
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            document.getElementById('barcode').value = decodedText;
        }

        let config = {
            fps: 10,
            qrbox: {
                width: 100,
                height: 100
            },
            rememberLastUsedCamera: true,
            // Only support camera scan type.
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
        };

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", config, /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    @endpush
@endsection
