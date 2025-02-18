<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TravelEasy - Over Ons</title>
    
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

    <!-- ✅ HERO SECTIE (EXACT zoals Home, maar andere afbeelding en tekst) -->
    <header class="relative bg-cover bg-center h-screen flex items-center justify-center text-white text-center"
        style="background-image: url('{{ asset('img/young-woman-traveler-taking-a-beautiful-landscape-2023-11-27-05-25-49-utc.jpg') }}');"> 
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 container mx-auto">
            <h1 class="text-4xl font-bold">Over TravelEasy</h1>
            <p class="mt-4 text-lg">Ontdek wie wij zijn en hoe wij jou helpen met de beste reisdeals.</p>
            <a href="{{ route('deals') }}" class="mt-6 inline-block px-6 py-3 bg-white text-primary font-semibold rounded-md hover:bg-gray-200">Bekijk Aanbiedingen</a>
        </div>
    </header>

    <!-- ✅ USP-SECTIE (EXACT zoals Home) -->
    <section class="py-16 bg-white text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-gray-900">Waarom kiezen voor TravelEasy?</h2>
            <div class="mt-8 grid md:grid-cols-3 gap-6 px-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <span class="material-icons text-primary text-5xl mx-auto mb-4">check_circle</span>
                    <h3 class="text-xl font-semibold text-primary">Betrouwbaar</h3>
                    <p class="mt-2">Wij werken samen met top luchtvaartmaatschappijen en garanderen de beste service.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <span class="material-icons text-primary text-5xl mx-auto mb-4">flight</span>
                    <h3 class="text-xl font-semibold text-primary">Eenvoudig Boeken</h3>
                    <p class="mt-2">Een snelle en gebruiksvriendelijke interface voor het boeken van jouw reis.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <span class="material-icons text-primary text-5xl mx-auto mb-4">support_agent</span>
                    <h3 class="text-xl font-semibold text-primary">24/7 Klantenservice</h3>
                    <p class="mt-2">Altijd beschikbaar om jouw vragen en verzoeken te beantwoorden.</p>
                </div>
            </div>
        </div>
    </section>

    
    </section>
        <!-- ✅ Sectie 1: Afbeelding links, tekst rechts -->
        <section class="py-16 bg-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
            <!-- Afbeelding -->
            <div class="md:w-1/2">
                <img src="{{ asset('img/camera-hat-and-sunglasses-on-the-beach-2023-11-27-05-22-57-utc.jpg') }}" alt="Onze Missie" class="rounded-lg shadow-lg w-full">
            </div>
            <!-- Tekst -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-900">Onze Missie</h2>
                <p class="mt-4 text-lg text-gray-700">Bij TravelEasy streven we ernaar om reizen toegankelijk, betaalbaar en moeiteloos te maken. Wij geloven dat iedereen de kans moet krijgen om nieuwe bestemmingen te ontdekken.</p>
            </div>
        </div>
    </section>

    <!-- ✅ Sectie 2: Afbeelding rechts, tekst links -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-12">
            <!-- Tekst -->
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-900">Onze Werkwijze</h2>
                <p class="mt-4 text-lg text-gray-700">Wij werken samen met luchtvaartmaatschappijen en reisorganisaties om de beste deals voor jou te vinden. Dankzij geavanceerde technologie kunnen wij prijzen vergelijken en exclusieve kortingen aanbieden.</p>
            </div>
            <!-- Afbeelding -->
            <div class="md:w-1/2">
                <img src="{{ asset('img/closeup-shot-of-a-man-with-backpack-taking-picture-2025-02-02-11-47-45-utc.jpeg') }}" alt="Onze Missie" class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </section>


    <!-- ✅ FOOTER (EXACT zoals Home) -->
    <footer id="contact" class="bg-gray-900 text-white py-6 text-center">
        <div class="container mx-auto">
            <p>© 2025 TravelEasy - Alle rechten voorbehouden</p>
            <div class="mt-4">
                <a href="#" class="mx-2 hover:text-secondary">Privacybeleid</a>
                <a href="#" class="mx-2 hover:text-secondary">Algemene Voorwaarden</a>
                <a href="#" class="mx-2 hover:text-secondary">Klantenservice</a>
            </div>
        </div>
    </footer>

</body>
</html>
