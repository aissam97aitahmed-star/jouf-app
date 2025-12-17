
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/styles.css">

    <style>


    </style>
</head>

<body style="direction: rtl;">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        فتح المودال يدوياً
    </button>


    {{-- Start Scan QR Code Modal --}}
    <div class="modal fade scaan__qr" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <i class="bi bi-upc-scan mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;">مسح رمز QR</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">وجه الكاميرا نحو رمز QR الخاص بك</p>
                    </div>

                    <div id="qr-box">
                        <div id="reader" style="width:100%; height:100%;"></div>

                        <div class="qr-overlay">
                            <span id="qr-loading-text" class="tajawal-regular">جاري المسح...</span>
                        </div>
                    </div>

                    <button id="cancel-scan-button" type="button" class="btn" data-bs-dismiss="modal"
                        style="background-color: #FFFFFF; color: #4B5563; border: 1px solid #D1D5DB; border-radius: 8px; padding: 8px 16px; margin-top: 16px; font-family: 'Tajawal', sans-serif; font-weight: 500;">
                        إلغاء
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Scan QR Code Modal --}}


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


    <script>
        // Use a global variable to manage the scanner instance
        let html5QrcodeScanner = null;

        // Function to handle the successful scan
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById('qr-loading-text').textContent = "تم المسح: " + decodedText;
            console.log(`Scan result: ${decodedText}`, decodedResult);

            // Stop the scanner and close the modal after a successful scan
            if (html5QrcodeScanner) {
                html5QrcodeScanner.stop().then(() => {
                    console.log("QR Code scanning stopped.");
                }).catch(err => {
                    console.error("Error stopping the scanner:", err);
                });
            }
            // Manually close the modal
            var modalElement = document.getElementById('exampleModal');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }
        }

        // Function to start the QR scanner
        function startQrScanner() {
            const qrCodeRegionId = "reader";

            // Initialize the scanner
            // This is the line that required the library to be loaded first
            html5QrcodeScanner = new Html5Qrcode(qrCodeRegionId);

            // Configuration for the scanner
            const config = {
                fps: 10,
                qrbox: { width: 250, height: 250 },
                aspectRatio: 1.0,
                // Ensure supportedScanFormats are available
                supportedScanFormats: [
                    Html5QrcodeSupportedFormats.QR_CODE,
                    Html5QrcodeSupportedFormats.AZTEC
                ],
                // Prefer rear camera if available
                videoConstraints: {
                    facingMode: "environment"
                }
            };

            // Start scanning
            html5QrcodeScanner.start(
                { facingMode: "environment" },
                config,
                onScanSuccess,
                (errorMessage) => {
                    // Non-successful scan attempts can be ignored here
                }
            ).then(() => {
                console.log("Scanner started successfully.");
            }).catch((err) => {
                console.error("Error starting QR scanner:", err);
                document.getElementById('qr-loading-text').textContent = "خطأ في تشغيل الكاميرا.";
            });
        }

        // --- Modal Event Handlers ---
        var exampleModal = document.getElementById('exampleModal');

        // Start scanner when modal is shown
        exampleModal.addEventListener('shown.bs.modal', function () {
            startQrScanner();
        });

        // Stop scanner when modal is hidden (closed)
        exampleModal.addEventListener('hidden.bs.modal', function () {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.stop().then(() => {
                    console.log("QR Code scanning stopped on modal close.");
                    html5QrcodeScanner = null;
                }).catch(err => {
                    console.warn("Could not stop scanner gracefully:", err);
                    html5QrcodeScanner = null;
                });
            }
            // Reset the loading text
            document.getElementById('qr-loading-text').textContent = "جاري المسح...";
        });


        // Auto-open the modal on page load
        window.addEventListener('load', function () {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        });
    </script>
</body>

</html>
