<x-layout>
    <x-slot name="title">FAMILY PAGE</x-slot>
    <div class="card-header bg-white">
        @include('store')
    </div>
    <div class="card-body bg-white">
        <div class="table-responsive">
            <table class="table table-light text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Keturunan</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($families as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>
                                @php
                                    $parent = App\Models\Family::find($item->parent_id);
                                @endphp
                                @if ($parent)
                                    {{ $parent->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="fw-bold btn btn-info text-white btn-sm"
                                        href="{{ route('family.show', $item->id) }}" role="button">Lihat</a>
                                    <form action="{{ route('family.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fw-bold btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layout>
