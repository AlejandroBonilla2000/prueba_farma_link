<div>
    <h1 class="text-2xl font-bold mb-4">Lista de Medicamentos</h1>
    <ul>
        @foreach($medications as $medication)
            <li>
                <a href="{{ route('medication.details', ['medication' => $medication->id]) }}">
                    {{ $medication->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
