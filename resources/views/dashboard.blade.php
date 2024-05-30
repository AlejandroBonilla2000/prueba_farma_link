<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Medicamentos</h2>
                    </div>

                    <div class="mt-8">
                        @foreach($medications as $medication)
                            <div class="border-b border-gray-200 py-4">
                                <h3 class="text-lg font-semibold">{{ $medication->name }}</h3>
                                <a href="#" class="text-blue-600 hover:text-blue-800 toggle-detail">Ver detalles</a>
                                <div class="hidden medication-details">
                                    <p class="text-gray-600">{{ $medication->description }}</p>
                                    <p class="text-gray-600">Precio: ${{ $medication->price }}</p>
                                </div>
                               
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleDetailLinks = document.querySelectorAll('.toggle-detail');
            toggleDetailLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const detailContainer = this.nextElementSibling;
                    detailContainer.classList.toggle('hidden');
                });
            });

            const toggleEditButtons = document.querySelectorAll('.toggle-edit');
            toggleEditButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const editForm = this.parentNode.nextElementSibling;
                    editForm.classList.toggle('hidden');
                });
            });
        });
    </script>
</x-app-layout>
