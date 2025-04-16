<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Guestbook - Valinka & Adi</title>
    <meta name="referrer" content="origin">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"
        integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Open+Sans:ital,wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.transparenttextures.com/patterns/paper-fibers.png');
            background-repeat: repeat;
            font-family: 'Georgia', serif;
        }

        h1,
        h2 {
            font-family: 'Dancing Script', cursive;
        }

        .fall-flowers {
            position: fixed;
            top: -10%;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 10;
        }

        .flower {
            position: absolute;
            width: 30px;
            height: 30px;
            background-image: url('sakura.png');
            background-size: contain;
            background-repeat: no-repeat;
            animation: fall 10s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .bg-gradient-romantic {
            background: linear-gradient(to right, #F9D8D3, #F3A8B6, #F0B2A6);
        }

        .text-rose-700 {
            color: #D13F77;
            /* Soft rose color */
        }

        .text-rose-500 {
            color: #F96D82;
            /* Soft pink rose */
        }

        .bg-rose-500 {
            background-color: #F96D82;
        }

        .bg-rose-100 {
            background-color: #F9D8D3;
        }

        .border-rose-500 {
            border-color: #F96D82;
        }

        .hover\:bg-rose-50:hover {
            background-color: #F9E2E3;
        }
    </style>
</head>

<body class="bg-gradient-romantic min-h-screen font-serif">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-rose-700 mb-2">Valinka & Adi's Guestbook</h1>
                <p class="text-lg text-gray-600">Scan your QR code to share this beautiful day with us</p>
                <div class="w-24 h-1 bg-rose-500 rounded-full mx-auto mt-4"></div>
            </div>

            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 p-6 bg-rose-50">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold text-rose-700">QR Code Scanner</h2>
                            <button id="toggleCamera"
                                class="bg-rose-500 text-white px-3 py-1 rounded-full text-sm hover:bg-rose-600 transition">
                                <i class="fas fa-camera mr-1"></i> Toggle Camera
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="cameraSelect" class="block text-sm font-medium text-rose-700 mb-1">Select Camera</label>
                            <select id="cameraSelect"
                                class="w-full rounded-lg border-gray-300 focus:border-rose-500 focus:ring-rose-500">
                                <option value="">Loading cameras...</option>
                            </select>
                        </div>

                        <div id="reader" class="mb-4"></div>

                        <div class="text-center">
                            <p class="text-gray-600 mb-3">Don't have a QR code?</p>
                            <button id="manualEntryBtn"
                                class="bg-white text-rose-500 border border-rose-500 px-4 py-2 rounded-lg hover:bg-rose-50 transition">
                                <i class="fas fa-keyboard mr-2"></i> Enter Manually
                            </button>
                        </div>
                    </div>

                    <div class="md:w-1/2 p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Guest Information</h2>
                        <form id="guestForm" class="space-y-6" method="post" action="javascript:void(0);">
                            <div class="relative border border-gray-300 rounded-lg px-3 pt-4 pb-2 bg-white focus-within:ring-2 focus-within:ring-rose-500">
                                <input type="text" id="name" name="name" required onchange="handleFormChange()"
                                    class="peer w-full bg-transparent focus:outline-none text-sm placeholder-transparent"
                                    placeholder="Full Name" />
                                <label for="name"
                                    class="absolute left-3 top-2 text-gray-500 text-xs transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-xs peer-focus:text-rose-500">
                                    Nama Lengkap
                                </label>
                            </div>

                            <div class="relative border border-gray-300 rounded-lg px-3 pt-4 pb-2 bg-gray-100 focus-within:ring-2 focus-within:ring-rose-500">
                                <input type="text" id="checkinTime" name="checkinTime" readonly onchange="handleFormChange()"
                                    class="peer w-full bg-transparent focus:outline-none text-sm placeholder-transparent"
                                    placeholder="Check-in Time" />
                                <label for="checkinTime"
                                    class="absolute left-3 top-2 text-gray-500 text-xs transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-xs peer-focus:text-rose-500">
                                    Check-in Time
                                </label>
                            </div>

                            <button type="submit" id="submitBtn"
                                class="w-full bg-rose-500 text-white py-3 px-4 rounded-2xl font-semibold hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300 transition-all duration-300 ease-in-out flex items-center justify-center shadow-md">
                                <i class="fas fa-heart mr-2 text-white"></i> Check In with Love
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4 text-center">
                    <div class="w-20 h-20 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                        <i class="fas fa-check-circle text-rose-500 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">You're In!</h3>
                    <p class="text-gray-600 mb-6">Thanks for being a part of our special day.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="fall-flowers">
        <div class="flower" style="left:10%; animation-delay: 0s;"></div>
        <div class="flower" style="left:25%; animation-delay: 2s;"></div>
        <div class="flower" style="left:40%; animation-delay: 4s;"></div>
        <div class="flower" style="left:55%; animation-delay: 1s;"></div>
        <div class="flower" style="left:70%; animation-delay: 3s;"></div>
        <div class="flower" style="left:85%; animation-delay: 5s;"></div>
    </div>



    <script>
        function handleFormChange() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';

            // Ambil data dari form
            const formData = {
                name: document.getElementById('name').value,
                checkinTime: document.getElementById('checkinTime').value,
                keterangan: document.getElementById('keterangan').value
            };

            // Kirim data ke save.php menggunakan fetch
            fetch('save.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', // Pastikan menggunakan JSON
                    },
                    body: JSON.stringify(formData) // Kirim data sebagai JSON
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    showSuccessModal(); // Menampilkan modal sukses
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('Error saving data. Please try again.');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-user-check mr-2"></i> Check In';
                });
        }

        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            const form = document.getElementById('guestForm');
            const nameInput = document.getElementById('name');
            const checkinInput = document.getElementById('checkinTime');

            // Tampilkan modal
            modal.classList.remove('hidden');
            modal.classList.add('show');

            // Reset form
            form.reset();

            // Set ulang checkinTime dengan format lokal (Bahasa Indonesia)
            const now = new Date();

            const formattedDate = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });

            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const formattedTime = `${hours}:${minutes}`;

            checkinInput.value = `${formattedDate} - ${formattedTime}`;

            // Fokus ke input nama setelah reset
            setTimeout(() => {
                nameInput.focus();
            }, 100);

            // Tutup otomatis modal setelah 3 detik
            setTimeout(() => {
                modal.classList.remove('show'); // untuk animasi fade out
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 500);
            }, 3000);
        }


        document.addEventListener('DOMContentLoaded', function() {
            // Initialize variables
            let scanner = null;
            let currentCameraId = null;
            let cameras = [];
            let isManualEntry = false;
            const config = {
                fps: 10,
                qrbox: function(viewfinderWidth, viewfinderHeight) {
                    const minEdgePercentage = 0.7; // gunakan 70% dari sisi terkecil
                    const minEdge = Math.min(viewfinderWidth, viewfinderHeight);
                    return {
                        width: minEdge * minEdgePercentage,
                        height: minEdge * minEdgePercentage
                    };
                },
                rememberLastUsedCamera: true,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            };
            // Set current time
            // Set current time
            const now = new Date();

            const formattedDate = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });


            // Ambil jam dan menit manual biar pasti pakai titik dua
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const formattedTime = `${hours}:${minutes}`;

            document.getElementById('checkinTime').value = `${formattedDate} - ${formattedTime}`;

            // Initialize QR Scanner
            function initScanner() {
                if (scanner) {
                    scanner.clear();
                }



                scanner = new Html5Qrcode("reader");

                // Get camera devices
                Html5Qrcode.getCameras().then(devices => {
                    if (devices && devices.length) {
                        cameras = devices;

                        const cameraSelect = document.getElementById('cameraSelect');
                        cameraSelect.innerHTML = ''; // clear previous options

                        devices.forEach((device, index) => {
                            const option = document.createElement('option');
                            option.value = device.id;
                            option.text = device.label || `Camera ${index + 1}`;
                            cameraSelect.appendChild(option);
                        });

                        // Pilih default kamera (back jika ada)
                        const backCam = devices.find(device => /back/i.test(device.label));
                        currentCameraId = backCam ? backCam.id : devices[0].id;
                        cameraSelect.value = currentCameraId;

                        startScanner(currentCameraId);
                    } else {
                        console.error('No cameras found');
                        showManualEntry();
                    }
                }).catch(err => {
                    console.error('Camera access error:', err);
                    showManualEntry();
                });

            }

            // Start scanner with specific camera
            function startScanner(cameraId) {
                scanner.start(
                    cameraId,
                    config,
                    onScanSuccess,
                    onScanError
                ).catch(err => {
                    console.error('Scanner start error:', err);
                    showManualEntry();
                });
            }

            // Toggle between front and back camera
            document.getElementById('toggleCamera').addEventListener('click', function() {
                if (cameras.length > 1) {
                    scanner.stop().then(() => {
                        currentCameraId = currentCameraId === cameras[0].id ? cameras[1].id : cameras[0].id;
                        startScanner(currentCameraId);
                    }).catch(err => {
                        console.error('Error stopping scanner:', err);
                    });
                } else {
                    alert('Only one camera available');
                }
            });

            // Handle successful scan
            function onScanSuccess(decodedText, decodedResult) {
                console.log(`Scan result: ${decodedText}`);

                // Parse QR code data (assuming it's JSON)
                try {
                    const guestData = decodedText

                    // Auto-fill form
                    document.getElementById('name').value = decodedText;
                    document.getElementById('name').focus(); // fallback

                    // Show success feedback
                    document.getElementById('reader').classList.add('success-animation');
                    setTimeout(() => {
                        document.getElementById('reader').classList.remove('success-animation');
                    }, 2000);

                    // Stop scanner after successful scan
                    scanner.stop().catch(err => {
                        console.error('Error stopping scanner:', err);
                    });

                    // Focus on the message field for user input
                    // Panggil handleFormChange() untuk mengeksekusi proses setelah perubahan input
                    handleFormChange();
                    // document.getElementById('guestForm').submit();


                } catch (e) {
                    console.error('Error parsing QR code data:', e);
                    // If not JSON, assume it's just the name
                    document.getElementById('name').value = decodedText;
                    document.getElementById('name').focus(); // fallback
                }
            }

            // Handle scan error
            function onScanError(errorMessage) {
                // console.error('Scan error:', errorMessage);
            }

            // Show manual entry form
            function showManualEntry() {
                isManualEntry = true;
                document.getElementById('reader').style.display = 'none';
                document.getElementById('toggleCamera').style.display = 'none';
                document.getElementById('manualEntryBtn').style.display = 'none';
                document.getElementById('name').focus();
            }

            // Manual entry button
            document.getElementById('manualEntryBtn').addEventListener('click', function() {
                showManualEntry();
            });

            // Form submission (now triggered automatically after scan)
            document.getElementById('submitBtn').addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara tradisional (menggunakan GET)

                const submitBtn = document.getElementById('submitBtn');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';

                // Ambil data dari form
                const formData = {
                    name: document.getElementById('name').value,
                    checkinTime: document.getElementById('checkinTime').value,
                    keterangan: document.getElementById('keterangan').value
                };

                // Kirim data ke save.php menggunakan fetch
                fetch('save.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json', // Pastikan menggunakan JSON
                        },
                        body: JSON.stringify(formData) // Kirim data sebagai JSON
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                        showSuccessModal(); // Menampilkan modal sukses
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('Error saving data. Please try again.');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<i class="fas fa-user-check mr-2"></i> Check In';
                    });
            });



            // Show success modal
            function showSuccessModal() {
                document.getElementById('successModal').classList.remove('hidden');
            }
            document.getElementById('cameraSelect').addEventListener('change', function(e) {
                const selectedCameraId = e.target.value;
                if (selectedCameraId && selectedCameraId !== currentCameraId) {
                    scanner.stop().then(() => {
                        currentCameraId = selectedCameraId;
                        startScanner(currentCameraId);
                    }).catch(err => {
                        console.error('Error switching camera:', err);
                    });
                }
            });


            // // Close modal
            // document.getElementById('closeModal').addEventListener('click', function() {
            //     document.getElementById('successModal').classList.add('hidden');

            //     // Reset form and restart scanner (unless in manual mode)
            //     document.getElementById('guestForm').reset();
            //     document.getElementById('checkinTime').value = new Date().toLocaleString();

            //     if (!isManualEntry && scanner) {
            //         initScanner();
            //     }
            // });

            // Initialize scanner on page load
            initScanner();
        });
    </script>
</body>

</html>