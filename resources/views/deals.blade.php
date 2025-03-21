<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelEasy - Aanbiedingen</title>
<<<<<<< HEAD
    
=======

>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65
    <!-- Fonts & TailwindCSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        body { font-family: 'Figtree', sans-serif; }
        .primary-color { background-color: #0B4A88; }
        .secondary-color { background-color: #24B4E2; }
        .text-primary { color: #0B4A88; }
        .text-secondary { color: #24B4E2; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
<<<<<<< HEAD
    
    <!-- ✅ NAVBAR (EXACT zoals Home) -->
    <nav class="bg-white shadow-md py-4 relative">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="text-xl font-semibold text-primary">TravelEasy</a>
            <div class="hidden md:flex space-x-6 mx-auto">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary">Over Ons</a>
                <a href="{{ route('deals') }}" class="text-gray-700 hover:text-primary">Aanbiedingen</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary">Contact</a>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="border border-primary text-primary px-4 py-2 rounded-md hover:bg-primary hover:text-white transition">Log in</a>
                <a href="{{ route('register') }}" class="px-4 py-2 secondary-color text-white rounded-md hover:bg-blue-700 transition">Registreren</a>
            </div>
        </div>
    </nav>

    <!-- ✅ HERO SECTIE (GELIJK AAN HOME) -->
    <header class="relative bg-cover bg-center h-screen flex items-center justify-center text-white text-center"
        style="background-image: url('{{ asset('img/deals-background.jpg') }}');"> 
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 container mx-auto">
            <h1 class="text-4xl font-bold">Top Aanbiedingen</h1>
            <p class="mt-4 text-lg">Bekijk onze beste deals en bespaar op je volgende reis!</p>
            <a href="#offers" class="mt-6 inline-block px-6 py-3 bg-white text-primary font-semibold rounded-md hover:bg-gray-200">Bekijk Aanbiedingen</a>
        </div>
    </header>

    <section id="offers" class="py-16 bg-white text-center">
=======

<!-- ✅ NAVBAR (EXACT zoals Home) -->
<nav class="bg-white shadow-md py-4 relative">
    <div class="container mx-auto flex justify-between items-center px-6">
        <a href="#" class="text-xl font-semibold text-primary">TravelEasy</a>
        <div class="hidden md:flex space-x-6 mx-auto">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary">Home</a>
            <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary">Over Ons</a>
            <a href="{{ route('deals') }}" class="text-gray-700 hover:text-primary">Aanbiedingen</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary">Contact</a>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('login') }}" class="border border-primary text-primary px-4 py-2 rounded-md hover:bg-primary hover:text-white transition">Log in</a>
            <a href="{{ route('register') }}" class="px-4 py-2 secondary-color text-white rounded-md hover:bg-blue-700 transition">Registreren</a>
        </div>
    </div>
</nav>

<!-- ✅ HERO SECTIE (GELIJK AAN HOME) -->
<header class="relative bg-cover bg-center h-screen flex items-center justify-center text-white text-center"
        style="background-image: url('{{ asset('img/deals-background.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 container mx-auto">
        <h1 class="text-4xl font-bold">Top Aanbiedingen</h1>
        <p class="mt-4 text-lg">Bekijk onze beste deals en bespaar op je volgende reis!</p>
        <a href="#offers" class="mt-6 inline-block px-6 py-3 bg-white text-primary font-semibold rounded-md hover:bg-gray-200">Bekijk Aanbiedingen</a>
    </div>
</header>

<section id="offers" class="py-16 bg-white text-center">
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-gray-900">Beste Vluchtdeals</h2>

        <!-- ✅ Filters -->
        <form method="GET" action="{{ route('deals') }}" class="mb-6">
            <select name="destination" class="p-2 border rounded">
                <option value="">Bestemming</option>
                <option value="New York">New York</option>
                <option value="Bali">Bali</option>
                <option value="Parijs">Parijs</option>
            </select>
            <select name="price" class="p-2 border rounded">
                <option value="">Sorteer op prijs</option>
                <option value="asc">Laag naar hoog</option>
                <option value="desc">Hoog naar laag</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md">Filter</button>
        </form>

        <!-- ✅ Dynamische aanbiedingen -->
        <div class="mt-8 grid md:grid-cols-3 gap-6 px-6">
            @forelse ($deals as $deal)
                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <img src="{{ asset('img/' . $deal->image) }}" alt="{{ $deal->destination }}" class="rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-primary">{{ $deal->destination }}</h3>
                    <p class="mt-2 text-lg font-bold">Vanaf €{{ number_format($deal->price, 2) }}</p>
                    <p class="text-gray-700">{{ $deal->airline }}</p>
                    <a href="#" class="mt-4 inline-block px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-800">Boek Nu</a>
                </div>
            @empty
                <p class="text-gray-700 mt-4">Er zijn momenteel geen aanbiedingen beschikbaar.</p>
            @endforelse
        </div>
    </div>
</section>



<<<<<<< HEAD
    <!-- ✅ EXTRA SECTIES MET AFBEELDING LINKS/RECHTS -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="{{ asset('img/discount.jpg') }}" alt="Korting" class="rounded-lg shadow-lg w-full">
            </div>
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-900">Exclusieve Korting</h2>
                <p class="mt-4 text-lg text-gray-700">Onze leden ontvangen extra korting op geselecteerde vluchten.</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-900">Last-Minute Deals</h2>
                <p class="mt-4 text-lg text-gray-700">Profiteer van voordelige last-minute tickets en bespaar tot 50%.</p>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('img/last-minute.jpg') }}" alt="Last Minute" class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </section>

    <!-- ✅ FOOTER (EXACT zoals Home) -->
    <footer class="bg-gray-900 text-white py-6 text-center">
        <div class="container mx-auto">
            <p>© 2025 TravelEasy - Alle rechten voorbehouden</p>
            <div class="mt-4">
                <a href="#" class="mx-2 hover:text-secondary">Privacybeleid</a>
                <a href="#" class="mx-2 hover:text-secondary">Algemene Voorwaarden</a>
                <a href="#" class="mx-2 hover:text-secondary">Klantenservice</a>
            </div>
        </div>
    </footer>
=======
<!-- ✅ EXTRA SECTIES MET AFBEELDING LINKS/RECHTS -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <img src="{{ asset('img/discount.jpg') }}" alt="Korting" class="rounded-lg shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-900">Exclusieve Korting</h2>
            <p class="mt-4 text-lg text-gray-700">Onze leden ontvangen extra korting op geselecteerde vluchten.</p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl font-bold text-gray-900">Last-Minute Deals</h2>
            <p class="mt-4 text-lg text-gray-700">Profiteer van voordelige last-minute tickets en bespaar tot 50%.</p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('img/last-minute.jpg') }}" alt="Last Minute" class="rounded-lg shadow-lg w-full">
        </div>
    </div>
</section>

<!-- ✅ FOOTER (EXACT zoals Home) -->
<footer class="bg-gray-900 text-white py-6 text-center">
    <div class="container mx-auto">
        <p>© 2025 TravelEasy - Alle rechten voorbehouden</p>
        <div class="mt-4">
            <a href="#" class="mx-2 hover:text-secondary">Privacybeleid</a>
            <a href="#" class="mx-2 hover:text-secondary">Algemene Voorwaarden</a>
            <a href="#" class="mx-2 hover:text-secondary">Klantenservice</a>
        </div>
    </div>
</footer>
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65

</body>
</html>
