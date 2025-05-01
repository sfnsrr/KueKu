@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-list cake-icon"></i>Katalog Kue</h2>
        <a href="{{ route('cakes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Tambah Kue Baru
        </a>
    </div>

    @if($cakes->isEmpty())
        <div class="alert alert-info" style="background: linear-gradient(135deg, #64B5F6, #42A5F5); color: white; border: none; border-radius: 10px; box-shadow: 0 4px 10px rgba(66, 165, 245, 0.3);">
            <i class="fas fa-info-circle me-2"></i> Belum ada data kue. Silakan tambahkan kue baru untuk memulai.
        </div>
    @else
        <div class="table-responsive card">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center" width="60">ID</th>
                        <th>Nama Kue</th>
                        <th>Deskripsi</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center" width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cakes as $cake)
                    <tr>
                        <td class="text-center">{{ $cake->id }}</td>
                        <td class="fw-bold">{{ $cake->nama }}</td>
                        <td>{{ Str::limit($cake->deskripsi, 50) }}</td>
                        <td class="text-end">Rp {{ number_format($cake->harga, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if($cake->stok > 10)
                                <span class="badge" style="background: linear-gradient(135deg, #66BB6A, #4CAF50); padding: 5px 8px;">{{ $cake->stok }}</span>
                            @elseif($cake->stok > 0)
                                <span class="badge" style="background: linear-gradient(135deg, #FFCA28, #FFA000); padding: 5px 8px; color: #5D4037;">{{ $cake->stok }}</span>
                            @else
                                <span class="badge" style="background: linear-gradient(135deg, #EF5350, #E53935); padding: 5px 8px;">{{ $cake->stok }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('cakes.show', $cake->id) }}" class="btn btn-sm" style="background: linear-gradient(135deg, #26C6DA, #00ACC1); color: white; border-radius: 20px;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cakes.edit', $cake->id) }}" class="btn btn-sm btn-warning" style="border-radius: 20px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cakes.destroy', $cake->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kue {{ $cake->nama }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 20px;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
        <div class="mt-4 row align-items-center">
            <div class="col-md-6 text-muted">
                <p class="mb-0">
                    Menampilkan <strong>{{ $cakes->firstItem() }}</strong> sampai <strong>{{ $cakes->lastItem() }}</strong>
                    dari total <strong>{{ $cakes->total() }}</strong> kue
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-10 mt-md-0">
                <!-- Pagination -->
                {{ $cakes->onEachSide(1)->links('pagination.custom') }}
            </div>
        </div>
    @endif
@endsection

