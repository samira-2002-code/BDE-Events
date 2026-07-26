<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion | BDE Events</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="min-h-screen bg-[#f5f1eb] flex items-center justify-center px-6">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">

        <div class="bg-[#2d2a26] py-8 text-center">

            <div class="w-20 h-20 mx-auto rounded-full bg-[#d4af37] flex items-center justify-center shadow-lg">

                <i data-lucide="calendar-heart"
                    class="w-10 h-10 text-[#2d2a26]"></i>

            </div>

            <h1 class="text-3xl font-bold text-white mt-5">
                BDE Events
            </h1>

            <p class="text-gray-300 mt-2">
                Connectez-vous à votre espace
            </p>

        </div>

        <div class="p-8">

            @if(session('success'))
            <div class="mb-5 bg-green-100 text-green-700 border border-green-300 rounded-xl p-3">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-5 bg-red-100 text-red-700 border border-red-300 rounded-xl p-3">
                <ul class="space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">

                @csrf

                <div>

                    <label class="text-gray-700 font-semibold">
                        Adresse Email
                    </label>

                    <div class="mt-2 flex items-center border rounded-xl px-4 bg-gray-50">

                        <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>

                        <input
                            type="email"
                            name="email"
                            class="w-full p-4 bg-transparent outline-none"
                            placeholder="email@enaa.ma"
                            required>

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 font-semibold">
                        Mot de passe
                    </label>

                    <div class="mt-2 flex items-center border rounded-xl px-4 bg-gray-50">

                        <i data-lucide="lock-keyhole"
                            class="w-5 h-5 text-gray-400"></i>

                        <input
                            type="password"
                            name="password"
                            class="w-full p-4 bg-transparent outline-none"
                            placeholder="********"
                            required>

                    </div>

                </div>

                <button
                    class="w-full bg-[#2d2a26] hover:bg-black duration-300 text-white py-4 rounded-xl font-semibold tracking-wide">

                    Se connecter

                </button>

            </form>

            <div class="text-center mt-8">

                <p class="text-gray-500">

                    Vous n'avez pas encore de compte ?

                </p>

                <a href="{{ route('register') }}"
                    class="inline-block mt-2 text-[#b68d2c] font-semibold hover:underline">

                    Créer un compte

                </a>

            </div>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>