<x-layout>
    <x-slot name="title">SHOW PAGE</x-slot>
    <div class="card-header bg-white">
        @include('update')
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm col-sm-4">
                <p>Nama</p>
                <p>Jenis Kelamin</p>
                <p>Keturunan</p>
            </div>
            <div class="col-sm">
                <p class="fw-bold">: {{ $person->name }}</p>
                <p class="fw-bold">: {{ $person->gender }}</p>
                <p class="fw-bold">: 
                    @php
                        $parent = App\Models\Family::find($person->parent_id);
                    @endphp
                    @if ($parent)
                        {{ $parent->name }}
                    @else
                        -
                    @endif
                </p>

            </div>
        </div>
</x-layout>
