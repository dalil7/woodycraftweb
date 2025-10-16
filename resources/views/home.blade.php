<x-app-layout>
    <div class="bg-white text-gray-900 min-h-screen">
        {{-- Section principale --}}
        <section class="max-w-6xl mx-auto text-center py-20 px-6">
            <h1 class="text-4xl font-bold mb-4">Bienvenue sur WoodyCraft</h1>
            <p class="text-lg text-gray-600 mb-10">
                Découvrez nos puzzles 3D en bois, fabriqués avec précision et passion.
            </p>
            <a href="{{ route('puzzles.index') }}" 
               class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">
                Explorer la boutique →
            </a>
        </section>

    
        </section>
    </div>
</x-app-layout>
