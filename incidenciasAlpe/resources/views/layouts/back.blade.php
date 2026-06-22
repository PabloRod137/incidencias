<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Academia Alpe') - Gestión de Incidencias</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity duration-300"></div>

    <!-- Mobile Navbar -->
    <div class="md:hidden flex items-center justify-between bg-alpe-blue text-white p-4 sticky top-0 z-30 shadow-md">
        <strong class="text-lg">Academia Alpe</strong>
        <button id="hamburger" class="text-2xl focus:outline-none">☰</button>
    </div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed md:relative flex flex-col w-64 h-full bg-alpe-blue-dark text-white p-5 shadow-xl transition-all duration-300 -translate-x-full md:translate-x-0 z-50">
            <div class="mb-8 pb-6 border-b border-white/10 flex flex-col items-center">
                <img src="https://alpeformacion.es/wp-content/uploads/2019/08/logotipo-alpe-formacion.png" alt="Alpe Formación" class="h-12 w-auto brightness-0 invert">
                <span class="mt-2 text-xs font-bold text-alpe-orange uppercase tracking-tighter">Gestión de Incidencias</span>
            </div>
            
            <div class="mb-6 px-2 py-3 bg-white/5 rounded-lg">
                <p class="text-xs text-white/40 uppercase tracking-wider mb-1">Usuario</p>
                <p class="font-semibold truncate">{{ Auth::user()->name }}</p>
            </div>

            <nav class="flex-1 space-y-1">
                @php
                    $currentRoute = Route::currentRouteName();
                    $navItems = [
                        ['route' => 'back.index', 'label' => 'Dashboard', 'icon' => '📊'],
                        ['route' => 'incidencias.index', 'label' => 'Incidencias', 'icon' => '🎫'],
                        ['route' => 'usuarios.index', 'label' => 'Usuarios', 'icon' => '👥'],
                        ['route' => 'aulas.index', 'label' => 'Aulas', 'icon' => '🏫'],
                        ['route' => 'categorias.index', 'label' => 'Categorías', 'icon' => '📁'],
                        ['route' => 'comentarios.index', 'label' => 'Comentarios', 'icon' => '💬'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-colors {{ str_contains($currentRoute, explode('.', $item['route'])[0]) ? 'bg-alpe-orange text-white shadow-lg shadow-orange-900/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <span>{{ $item['icon'] }}</span>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto pt-6 border-t border-slate-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-red-400 hover:bg-red-500/10 rounded-lg transition-colors">
                        <span>🚪</span>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <div class="flex-1 overflow-y-auto p-4 md:p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded shadow-sm flex items-center gap-3">
                        <span class="text-xl">✅</span>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded shadow-sm flex items-center gap-3">
                        <span class="text-xl">❌</span>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 md:p-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            const toggleSidebar = () => {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            };

            hamburger?.addEventListener('click', toggleSidebar);
            overlay?.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking links on mobile
            const links = sidebar?.querySelectorAll('nav a');
            links?.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768 && !sidebar.classList.contains('-translate-x-full')) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>

</body>
</html>

