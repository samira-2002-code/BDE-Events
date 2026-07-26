<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDE Events</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#f5f1eb] text-[#2d2a26]">

    <nav class="bg-[#2d2a26] shadow-xl border-b border-[#b68d2c]">

        <div class="max-w-7xl mx-auto flex justify-between items-center px-8 py-5">

            <a href="{{ route('home') }}"
                class="flex items-center gap-3 text-white text-2xl font-bold tracking-wide">

                <div class="w-11 h-11 rounded-full bg-[#b68d2c] flex items-center justify-center">

                    <i data-lucide="calendar-days" class="text-[#2d2a26] w-6 h-6"></i>

                </div>

                BDE Events

            </a>

            <div class="flex items-center gap-8">

                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 text-gray-300 hover:text-[#d4af37] transition">

                    <i data-lucide="house" class="w-5 h-5"></i>

                    Accueil

                </a>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2 text-gray-300 hover:text-[#d4af37] transition">

                    <i data-lucide="layout-dashboard"></i>

                    Dashboard

                </a>

                <a href="{{ route('reservations.index') }}"
                    class="flex items-center gap-2 text-gray-300 hover:text-[#d4af37] transition">

                    <i data-lucide="calendar-check"></i>

                    Réservations

                </a>

                <a href="{{ route('tickets.index') }}"
                    class="flex items-center gap-2 text-gray-300 hover:text-[#d4af37] transition">

                    <i data-lucide="ticket"></i>

                    Tickets

                </a>

            </div>

        </div>

    </nav>

    <main class="max-w-7xl mx-auto py-10 px-6">

        @yield('content')

    </main>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>