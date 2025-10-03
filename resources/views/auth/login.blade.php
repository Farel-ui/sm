 <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        /* Background Canvas */
        #networkBg {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
        }

        /* Login Card */
        .login-container {
            position: relative;
            z-index: 1;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 380px;
            text-align: center;
            transition: box-shadow 0.4s ease, transform 0.3s ease;
        }
        .login-container:hover {
            box-shadow: 0 0 1px rgba(13, 111, 196, 0.8), 0 0 55px rgba(13, 111, 196, 0.6);
            transform: scale(1.02);
        }

        /* Judul */
        h2 {
            margin-bottom: 1.5rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        h2:hover { transform: scale(1.05); }

        /* Input Group */
        .form-group { margin-bottom: 1rem; text-align: left; }
        label { font-size: 0.9rem; margin-bottom: 0.3rem; display: block; }
        input {
            width: 100%;
            padding: 0.7rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            transition: box-shadow 0.3s ease;
        }
        input:focus { outline: none; box-shadow: 0 0 12px rgba(13, 111, 196, 0.8); }

        /* Tombol Login */
        .login-btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Pesan Error */
        .error-msg {
            color: red;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        /* Tombol Tema */
        .theme-toggle {
            position: absolute;
            top: 15px;
            left: 15px;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
        }

        /* Captcha */
        .captcha-box { display: flex; align-items: center; gap: 10px; }
        canvas#captchaCanvas { border-radius: 8px; }
        .refresh-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* ==================== Light Mode ==================== */
        body.light #networkBg { background: #f5f5f5; }
        body.light .login-container {
            background: rgba(255,255,255,0.9);
            color: black;
        }
        body.light h2 { color: #0077ff; }
        body.light label { color: #333; }
        body.light input { background: #eaeaea; color: black; }
        body.light .login-btn { background: #0d6fc4; color: white; }
        body.light .login-btn:hover { background: rgb(164, 211, 252); }
        body.light .theme-toggle { color: black; background: rgba(0,0,0,0.1); }
        body.light .refresh-btn { background: #0d6fc4; color: white; }

        /* ==================== Dark Mode ==================== */
        body.dark #networkBg { background: #1f1f1f; }
        body.dark .login-container {
            background: rgba(31, 31, 31, 0.85);
            color: white;
        }
        body.dark h2 { color: #0d6fc4; }
        body.dark label { color: #bbb; }
        body.dark input { background: #2a2a2a; color: white; }
        body.dark .login-btn { background: #0d6fc4; color: white; }
        body.dark .login-btn:hover { background: rgb(164, 211, 252); }
        body.dark .theme-toggle { color: white; background: rgba(255,255,255,0.1); }
        body.dark .refresh-btn { background: #0d6fc4; color: white; }
    </style>

    <canvas id="networkBg"></canvas>

    <!-- Tombol Tema -->
    <button class="theme-toggle" id="toggleTheme">Dark Mode</button>

    <!-- Login Form -->
    <div class="login-container">
        <h2>BOGOR SMART</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="error-msg" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="error-msg" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Captcha -->
            <div class="form-group">
                <label for="captchaInput">Captcha</label>
                <div class="captcha-box">
                    <canvas id="captchaCanvas" width="120" height="40"></canvas>
                    <button type="button" class="refresh-btn" id="refreshCaptcha">↻</button>
                </div>
                <input type="text" id="captchaInput" placeholder="Masukkan captcha" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
            <div class="error-msg" id="errorMsg">Captcha salah!</div>
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
            ctx.fillStyle = document.body.classList.contains("light") ? "#0077ff" : "#0d6fc4";
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
                        ctx.strokeStyle = document.body.classList.contains("light")
                            ? `rgba(0, 119, 255, ${(1 - dist / maxDistance)})`
                            : `rgba(13, 111, 196, ${(1 - dist / maxDistance)})`;
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
            const isLight = document.body.classList.contains("light");

            // Background
            captchaCtx.fillStyle = isLight ? "#f0f0f0" : "#2a2a2a";
            captchaCtx.fillRect(0, 0, captchaCanvas.width, captchaCanvas.height);

            // Text
            for (let i = 0; i < captchaValue.length; i++) {
                const fontSize = 20 + Math.random() * 6;
                captchaCtx.font = `${fontSize}px Arial`;
                captchaCtx.fillStyle = isLight
                    ? `rgb(${50+Math.random()*100},${50+Math.random()*100},${200+Math.random()*55})`
                    : `rgb(${150+Math.random()*100},${150+Math.random()*100},${255})`;

                const angle = (Math.random() - 0.5) * 0.5;
                captchaCtx.save();
                captchaCtx.translate(20 + i * 20, 25);
                captchaCtx.rotate(angle);
                captchaCtx.fillText(captchaValue[i], 0, 0);
                captchaCtx.restore();
            }

            // Noise lines
            for (let i = 0; i < 5; i++) {
                captchaCtx.strokeStyle = isLight ? "#0077ff55" : "#0d6fc455";
                captchaCtx.beginPath();
                captchaCtx.moveTo(Math.random() * 120, Math.random() * 40);
                captchaCtx.lineTo(Math.random() * 120, Math.random() * 40);
                captchaCtx.stroke();
            }
        }
        drawCaptcha();
        document.getElementById("refreshCaptcha").addEventListener("click", drawCaptcha);

        // ======================= Validasi Login =======================
        const loginForm = document.querySelector("form");
        const errorMsg = document.getElementById("errorMsg");

        loginForm.addEventListener("submit", function(e) {
            const captchaInput = document.getElementById("captchaInput").value.trim();

            if (captchaInput !== captchaValue) {
                e.preventDefault();
                errorMsg.textContent = "Captcha salah!";
                errorMsg.style.display = "block";
                drawCaptcha(); // ganti captcha baru
                return;
            }
            // If captcha correct, allow form submit to Laravel
        });

        // ======================= Toggle Tema =======================
        const toggleTheme = document.getElementById("toggleTheme");
        toggleTheme.addEventListener("click", () => {
            document.body.classList.toggle("dark");
            document.body.classList.toggle("light");
            toggleTheme.textContent = document.body.classList.contains("dark") ? "Light Mode" : "Dark Mode";
            drawCaptcha(); // redraw captcha sesuai tema
        });

        // Set initial class
        document.body.classList.add("light");
    </script>

