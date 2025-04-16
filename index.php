<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valinka & Adi Wedding</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      overflow: hidden;
    }

    .font-romantic {
      font-family: 'Great Vibes', cursive;
    }

    .petal {
      position: fixed;
      top: -50px;
      width: 20px;
      height: 20px;
      background-image: url('sakura.png'); /* Pakai file lokal */
      background-size: contain;
      background-repeat: no-repeat;
      pointer-events: none;
      animation: fall linear infinite;
    }

    @keyframes fall {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(110vh) rotate(360deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body class="bg-pink-50 flex items-center justify-center min-h-screen relative">

  <!-- Daun bunga jatuh -->
  <script>
    function createPetal() {
      const petal = document.createElement("div");
      petal.classList.add("petal");

      // Posisi acak di X
      petal.style.left = Math.random() * window.innerWidth + "px";

      // Lama waktu animasi acak
      const duration = Math.random() * 5 + 5;
      petal.style.animationDuration = duration + "s";

      document.body.appendChild(petal);

      // Hapus setelah jatuh
      setTimeout(() => {
        petal.remove();
      }, duration * 1000);
    }

    setInterval(createPetal, 300);
  </script>

  <!-- Konten utama -->
  <div class="text-center p-10 bg-white rounded-3xl shadow-2xl max-w-xl w-full z-10 relative">
    <h1 class="text-5xl font-romantic text-pink-600 mb-2">Valinka & Adi</h1>
    <p class="text-gray-600 mb-6 text-lg italic">Dengan Cinta Kami Mengundang Anda</p>

    <img src="https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?auto=format&fit=crop&w=800&q=80" 
         alt="Wedding" 
         class="rounded-xl mx-auto mb-8 shadow-md w-full h-60 object-cover">

    <div class="flex flex-col gap-4">
      <a href="checkin.php" class="bg-pink-500 hover:bg-pink-600 text-white py-3 px-6 rounded-lg font-semibold shadow-md transition">
        💌 Hadir dan Check-In
      </a>
      <a href="dashboard.php" class="bg-white border-2 border-pink-400 text-pink-500 hover:bg-pink-50 py-3 px-6 rounded-lg font-semibold shadow-md transition">
        📊 Lihat Dashboard
      </a>
    </div>
  </div>
</body>
</html>
