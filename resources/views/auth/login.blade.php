<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion | BDE Events</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-700 flex items-center justify-center">

<div class="bg-white w-full max-w-md rounded-3xl shadow-2xl p-8">

    <div class="text-center mb-8">

        <div class="w-20 h-20 rounded-full bg-blue-100 mx-auto flex items-center justify-center">
            <i data-lucide="graduation-cap" class="w-10 h-10 text-blue-600"></i>
        </div>

        <h1 class="text-3xl font-bold mt-5">
            BDE Events
        </h1>

        <p class="text-gray-500 mt-2">
            Connectez-vous à votre espace étudiant
        </p>

    </div>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">

        @csrf

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

                <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>

                <input
                    type="password"
                    name="password"
                    class="w-full p-3 outline-none"
                    placeholder="********"
                    required>

            </div>

        </div>

        <button
            class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-semibold">

            Se connecter

        </button>

    </form>

    <p class="text-center mt-6 text-gray-500">

        Pas encore de compte ?

        <a href="{{ route('register') }}" class="text-blue-600 font-semibold">
            S'inscrire
        </a>

    </p>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>