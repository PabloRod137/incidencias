<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Alpe - Acceso al Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center p-4 font-sans antialiased bg-cover bg-center bg-no-repeat relative" style="background-image: url('https://alpeformacion.es/wp-content/uploads/2026/03/70-ANOS-WEB.jpg');">
    <!-- Overlay for better contrast -->
    <div class="absolute inset-0 bg-blue-900/40 backdrop-blur-[1px]"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="p-8 pb-6 bg-slate-800 text-center">
                <h1 class="text-2xl font-black text-white uppercase tracking-tighter">Academia Alpe</h1>
                <p class="text-blue-400 text-sm font-medium mt-1">Gestión de Incidencias</p>
            </div>

            <div class="p-8">
                <header class="mb-8">
                    <h2 class="text-xl font-bold text-slate-800">Iniciar Sesión</h2>
                    <p class="text-slate-500 text-sm mt-1">Introduce tus credenciales para continuar</p>
                </header>

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Correo Electrónico</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-800"
                               placeholder="tu@email.com" required autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs font-semibold mt-1.5 flex items-center gap-1">
                                <span>⚠️</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Contraseña</label>
                        <input type="password" id="password" name="password" 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-800"
                               placeholder="••••••••" required>
                        @error('password')
                            <p class="text-red-500 text-xs font-semibold mt-1.5 flex items-center gap-1">
                                <span>⚠️</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-[0.98]">
                            ACCEDER AL PANEL
                        </button>
                    </div>

                </form>
            </div>

            <footer class="p-6 bg-slate-50 border-t border-slate-100 text-center">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">&copy; 2026 Alpe - Sistema de Control Privado</p>
            </footer>
        </div>
        
        <div class="mt-6 text-center">
            <p class="text-slate-400 text-xs">Si has olvidado tu contraseña, contacta con administración.</p>
        </div>
    </div>

</body>
</html>