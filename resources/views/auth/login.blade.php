<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="m-0 p-0 overflow-hidden flex justify-center items-center min-h-screen font-sans">

    <!-- Background Canvas -->
    <canvas id="networkBg" class="fixed top-0 left-0 w-full h-full -z-10 bg-gray-100"></canvas>

    <!-- Login Card -->
    <div class="relative z-10 p-8 rounded-2xl shadow-2xl w-full max-w-md text-center bg-white/90 backdrop-blur-sm transition-all duration-300 hover:shadow-blue-500/50 hover:shadow-[0_0_50px_rgba(13,111,196,0.6)] hover:scale-105">

        <h2 class="text-3xl font-bold mb-6 text-blue-600 transition-all duration-300 hover:scale-110">
            SMART CITY
        </h2>

        <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div class="text-left">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full px-4 py-3 bg-gray-200 text-black border-none rounded-lg text-base transition-shadow duration-300 focus:outline-none focus:shadow-[0_0_12px_rgba(13,111,196,0.8)]"
                    placeholder="masukkan email"
                >
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div id="emailError" class="hidden text-red-500 text-sm mt-1"></div>
            </div>

            <!-- Password -->
            <div class="text-left">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="w-full px-4 py-3 pr-12 bg-gray-200 text-black border-none rounded-lg text-base transition-shadow duration-300 focus:outline-none focus:shadow-[0_0_12px_rgba(13,111,196,0.8)]"
                        placeholder="masukkan password"
                    >
                    <button
                        type="button"
                        id="togglePassword"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-transparent border-none cursor-pointer text-gray-500 hover:text-gray-700 transition-colors"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                <div id="passwordError" class="hidden text-red-500 text-sm mt-1"></div>
            </div>

            <!-- Captcha -->
            <div class="text-left">
                <label for="captchaInput" class="block text-sm font-medium text-gray-700 mb-1">Captcha</label>
                <div class="flex items-center gap-3 mb-2">
                    <canvas
                        id="captchaCanvas"
                        width="120"
                        height="40"
                        class="rounded-lg shadow-md"
                    ></canvas>
                    <button
                        type="button"
                        id="refreshCaptcha"
                        class="px-4 py-2 bg-blue-600 text-white border-none rounded-lg cursor-pointer hover:bg-blue-400 transition-colors duration-300 text-xl font-bold"
                    >
                        ↻
                    </button>
                </div>
                <input
                    type="text"
                    id="captchaInput"
                    placeholder="Masukkan captcha"
                    required
                    class="w-full px-4 py-3 bg-gray-200 text-black border-none rounded-lg text-base transition-shadow duration-300 focus:outline-none focus:shadow-[0_0_12px_rgba(13,111,196,0.8)]"
                >
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="w-full px-4 py-3 bg-blue-600 text-white border-none rounded-lg text-base font-medium cursor-pointer transition-all duration-300 hover:bg-blue-300 hover:scale-105 shadow-lg hover:shadow-xl"
            >
                Login
            </button>

            <!-- Error Message -->
            <div id="errorMsg" class="hidden text-red-500 text-sm mt-2"></div>
        </form>
    </div>

    <script>
        // ======================= Background Animasi =======================
        const canvas = document.getElementById('networkBg');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];
        const numParticles = 80;
        const maxDistance = 120;

        for (let i = 0; i < numParticles; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 2 + 1,
                dx: (Math.random() - 0.5) * 1.2,
                dy: (Math.random() - 0.5) * 1.2
            });
        }

        function drawParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "#0077ff";
            particles.forEach(p => {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fill();
            });
        }

        function drawLines() {
            for (let a = 0; a < numParticles; a++) {
                for (let b = a + 1; b < numParticles; b++) {
                    let dist = Math.hypot(
                        particles[a].x - particles[b].x,
                        particles[a].y - particles[b].y
                    );
                    if (dist < maxDistance) {
                        ctx.strokeStyle = `rgba(0, 119, 255, ${(1 - dist / maxDistance)})`;
                        ctx.lineWidth = 0.7;
                        ctx.beginPath();
                        ctx.moveTo(particles[a].x, particles[a].y);
                        ctx.lineTo(particles[b].x, particles[b].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function moveParticles() {
            particles.forEach(p => {
                p.x += p.dx;
                p.y += p.dy;
                if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
            });
        }

        function animate() {
            drawParticles();
            drawLines();
            moveParticles();
            requestAnimationFrame(animate);
        }
        animate();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });

        // ======================= Captcha Generator =======================
        const captchaCanvas = document.getElementById("captchaCanvas");
        const captchaCtx = captchaCanvas.getContext("2d");
        let captchaValue = "";

        function generateCaptchaText(length = 5) {
            const chars = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789";
            let text = "";
            for (let i = 0; i < length; i++) {
                text += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return text;
        }

        function drawCaptcha() {
            captchaValue = generateCaptchaText();

            // Background
            captchaCtx.fillStyle = "#f0f0f0";
            captchaCtx.fillRect(0, 0, captchaCanvas.width, captchaCanvas.height);

            // Text
            for (let i = 0; i < captchaValue.length; i++) {
                const fontSize = 20 + Math.random() * 6;
                captchaCtx.font = `${fontSize}px Arial`;
                captchaCtx.fillStyle = `rgb(${50+Math.random()*100},${50+Math.random()*100},${200+Math.random()*55})`;

                const angle = (Math.random() - 0.5) * 0.5;
                captchaCtx.save();
                captchaCtx.translate(20 + i * 20, 25);
                captchaCtx.rotate(angle);
                captchaCtx.fillText(captchaValue[i], 0, 0);
                captchaCtx.restore();
            }

            // Noise lines
            for (let i = 0; i < 5; i++) {
                captchaCtx.strokeStyle = "#0077ff55";
                captchaCtx.beginPath();
                captchaCtx.moveTo(Math.random() * 120, Math.random() * 40);
                captchaCtx.lineTo(Math.random() * 120, Math.random() * 40);
                captchaCtx.stroke();
            }
        }
        drawCaptcha();
        document.getElementById("refreshCaptcha").addEventListener("click", drawCaptcha);

        // ======================= Show Password Toggle =======================
        const togglePasswordBtn = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePasswordBtn.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Ganti ke icon eye-slash (mata dicoret)
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                `;
            } else {
                passwordInput.type = "password";
                // Ganti ke icon eye (mata normal)
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                `;
            }
        });

        // ======================= Validasi Login =======================
        const loginForm = document.getElementById("loginForm");
        const errorMsg = document.getElementById("errorMsg");

        loginForm.addEventListener("submit", function(e) {
            const captchaInput = document.getElementById("captchaInput").value.trim();

            if (captchaInput !== captchaValue) {
                e.preventDefault();
                errorMsg.textContent = "Captcha salah!";
                errorMsg.classList.remove("hidden");
                drawCaptcha();
                return;
            }

            // Captcha benar, form akan di-submit ke Laravel
            errorMsg.classList.add("hidden");
        });
    </script>
</body>
</html>
