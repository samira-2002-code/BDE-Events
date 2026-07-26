<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription | BDE Events</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-700 via-purple-700 to-pink-600 flex items-center justify-center">

<div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-8">

    <div class="text-center mb-8">

        <div class="w-20 h-20 rounded-full bg-indigo-100 mx-auto flex items-center justify-center">

            <i data-lucide="user-plus" class="w-10 h-10 text-indigo-600"></i>

        </div>

        <h1 class="text-3xl font-bold mt-5">
            Créer un compte
        </h1>

        <p class="text-gray-500 mt-2">
            Rejoignez la plateforme BDE Events
        </p>

    </div>

    @if ($errors->any())

        <div class="bg-red-100 border border-red-300 rounded-xl p-4 mb-5">

            <ul class="text-red-700 text-sm space-y-1">

                @foreach ($errors->all() as $error)

                    <li>• {{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-5">

        @csrf

        <div>

            <label class="font-medium">Nom complet</label>

            <div class="flex items-center border rounded-xl mt-2 px-3">

                <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>

                <input
                    type="text"
                    name="name"
                    class="w-full p-3 outline-none"
                    placeholder="Votre nom"
                    required>

            </div>

        </div>

        <div>

            <label class="font-medium">Email</label>

            <div class="flex items-center border rounded-xl mt-2 px-3">

                <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>

                <input
                    type="email"
                    name="email"
                    class="w-full p-3 outline-none"
                    placeholder="email@enaa.ma"
                    required>

            </div>

        </div>

        <div>

            <label class="font-medium">Mot de passe</label>

            <div class="flex items-center border rounded-xl mt-2 px-3">

                <i data-lucide="shield-lock" class="w-5 h-5 text-gray-400"></i>

                <input
                    type="password"
                    name="password"
                    class="w-full p-3 outline-none"
                    placeholder="********"
                    required>

            </div>

        </div>

        <button
            class="w-full bg-indigo-600 hover:bg-indigo-700 transition text-white py-3 rounded-xl font-semibold">

            Créer un compte

        </button>

    </form>

    <p class="text-center mt-6 text-gray-500">

        Déjà inscrit ?

        <a href="{{ route('login') }}" class="text-indigo-600 font-semibold">
            Se connecter
        </a>

    </p>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>