<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }

        .header-title {
            font-size: 2rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 1rem;
            text-align: center;
            padding: 1rem;
        }

        .content-container {
            padding: 3rem 0;
            background-color: #f7fafc;
        }

        .card-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .card {
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2d3748;
        }

        .medications-list {
            margin-top: 2rem;
        }

        .medication-card {
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 0;
        }

        .medication-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: #4a5568;
        }

        .toggle-detail {
            color: #3182ce;
            text-decoration: none;
            cursor: pointer;
        }

        .toggle-detail:hover {
            color: #2b6cb0;
        }

        .medication-details {
            margin-top: 0.5rem;
            color: #718096;
        }

        .delete-form {
            margin-top: 0.5rem;
        }

        .delete-button {
            color: #e53e3e;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            color: #c53030;
        }

        .new-medication-form-container {
            margin-top: 2rem;
        }

        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
        }

        .new-medication-form {
            margin-top: 1rem;
        }

        .form-group {
            margin-top: 1rem;
        }

        .form-label {
            display: block;
            font-size: 1rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.25rem;
            font-size: 1rem;
            color: #4a5568;
        }

        .submit-button {
            background-color: #3182ce;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #2b6cb0;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="header-title">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="content-container">
            <div class="card-container">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="section-title">Medicamentos</h2>
                        </div>

                        <div class="medications-list">
                            @foreach($medications as $medication)
                                <div class="medication-card">
                                    <h3 class="medication-name">{{ $medication->name }}</h3>
                                    <a href="#" class="toggle-detail">Ver detalles</a>
                                    <div class="medication-details hidden">
                                        <p class="medication-description">{{ $medication->description }}</p>
                                        <p class="medication-price">Precio: ${{ $medication->price }}</p>
                                    </div>
                                    <form action="{{ route('medications.destroy', $medication) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Eliminar</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="new-medication-form-container">
                            <h3 class="form-title">Agregar Nuevo Medicamento</h3>
                            <form action="{{ route('medications.store') }}" method="POST" class="new-medication-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-input" required>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-label">Descripción</label>
                                    <textarea id="description" name="description" class="form-input" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="form-label">Precio</label>
                                    <input type="number" id="price" name="price" class="form-input" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-button">Agregar</button>
                                </div>
                            </form>
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
            });
        </script>
    </x-app-layout>
</body>
</html>
