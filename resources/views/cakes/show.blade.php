@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-info-circle cake-icon"></i>Detail Kue</h2>
        <div>
            <a href="{{ route('cakes.edit', $cake->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit Kue
            </a>
            <a href="{{ route('cakes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="border-top: 5px solid var(--primary-color);">
                <div class="card-body">
                    <h3 class="card-title" 
                        style="color: var(--primary-color); font-weight: 700; background: linear-gradient(to right, var(--primary-color), transparent); 
                               padding: 10px; border-radius: 5px; color: white;">
                        {{ $cake->nama }}
                    </h3>
                    <h6 class="card-subtitle mb-4" style="color: var(--dark-color);">
                        <span class="badge rounded-pill" 
                              style="background: var(--gradient-dark); padding: 7px 15px;">
                            ID: {{ $cake->id }}
                        </span>
                    </h6>
                    
                    <div class="p-3 mb-4" 
                         style="background: linear-gradient(to right, #fff5e6, white); border-radius: 10px; border-left: 4px solid var(--secondary-color);">
                        <h6 class="mb-2" style="color: var(--dark-color);"><i class="fas fa-quote-left me-2" style="color: var(--secondary-color);"></i>Deskripsi</h6>
                        <p class="mb-0">{{ $cake->deskripsi }}</p>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3" 
                                 style="background: linear-gradient(135deg, #FFF9C4, #FFECB3); border-radius: 10px; height: 100%;">
                                <h6 class="mb-2" style="color: var(--dark-color);"><i class="fas fa-tag me-2" style="color: var(--primary-color);"></i>Harga</h6>
                                <p class="mb-0 fs-4 fw-bold" style="color: var(--dark-color);">
                                    Rp {{ number_format($cake->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="p-3" 
                                 style="background: linear-gradient(135deg, #C8E6C9, #A5D6A7); border-radius: 10px; height: 100%;">
                                <h6 class="mb-2" style="color: var(--dark-color);"><i class="fas fa-cubes me-2" style="color: var(--primary-color);"></i>Stok</h6>
                                <p class="mb-0 fs-4 fw-bold" style="color: var(--dark-color);">
                                    {{ $cake->stok }} unit
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <div class="p-3" 
                                 style="background: linear-gradient(135deg, #BBDEFB, #90CAF9); border-radius: 10px; height: 100%;">
                                <h6 class="mb-2" style="color: var(--dark-color);"><i class="fas fa-calendar-alt me-2" style="color: var(--primary-color);"></i>Tanggal Dibuat</h6>
                                <p class="mb-0 fw-bold" style="color: var(--dark-color);">
                                    {{ $cake->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="p-3" 
                                 style="background: linear-gradient(135deg, #E1BEE7, #CE93D8); border-radius: 10px; height: 100%;">
                                <h6 class="mb-2" style="color: var(--dark-color);"><i class="fas fa-clock me-2" style="color: var(--primary-color);"></i>Terakhir Diperbarui</h6>
                                <p class="mb-0 fw-bold" style="color: var(--dark-color);">
                                    {{ $cake->updated_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4" style="border-top: 5px solid var(--secondary-color);">
                <div class="card-body">
                    <h5 class="card-title" style="color: var(--dark-color);"><i class="fas fa-utensils me-2" style="color: var(--secondary-color);"></i>Jenis Kue</h5>
                    <div class="p-3 mb-3" style="background-color: #F5F5F5; border-radius: 10px;">
                        <span class="badge" style="background: var(--gradient-secondary); color: var(--dark-color); font-size: 1rem; padding: 8px 15px;">
                            {{ $cake->jenis }}
                        </span>
                    </div>
                    
                    <h5 class="card-title mt-4" style="color: var(--dark-color);"><i class="fas fa-cookie-bite me-2" style="color: var(--secondary-color);"></i>Bahan Utama</h5>
                    <div class="p-3" style="background-color: #F5F5F5; border-radius: 10px;">
                        <p class="mb-0">{{ $cake->bahan_utama ?? 'Tidak ada data' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="card" style="border-top: 5px solid var(--accent-color);">
                <div class="card-body">
                    <h5 class="card-title" style="color: var(--dark-color);"><i class="fas fa-cogs me-2" style="color: var(--accent-color);"></i>Aksi</h5>
                    
                    <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('cakes.edit', $cake->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i> Edit Data Kue
                        </a>
                        
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash-alt me-2"></i> Hapus Kue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: var(--gradient-primary); color: white;">
                    <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kue <strong>{{ $cake->nama }}</strong>?</p>
                    <p class="text-danger"><small><i class="fas fa-info-circle me-1"></i>Tindakan ini tidak dapat dibatalkan.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Batal
                    </button>
                    <form action="{{ route('cakes.destroy', $cake->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt me-1"></i> Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection