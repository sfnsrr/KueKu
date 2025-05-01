@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-edit cake-icon"></i>Edit Kue</h2>
        <a href="{{ route('cakes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mb-4" style="border-radius: 10px; border: none; background: linear-gradient(135deg, #FF9A9E, #FF5252); color: white;">
            <h5><i class="fas fa-exclamation-circle me-2"></i>Oops! Ada kesalahan input:</h5>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card" style="border-top: 5px solid var(--primary-color); border-radius: 15px;">
        <div class="card-body p-4">
            <h4 class="card-title mb-4" style="color: var(--primary-color); font-weight: 600;">
                <i class="fas fa-birthday-cake me-2"></i>{{ $cake->nama }}
            </h4>
            
            <form action="{{ route('cakes.update', $cake->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="nama" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                                <i class="fas fa-tag me-2" style="color: var(--primary-color);"></i>Nama Kue
                            </label>
                            <input type="text" class="form-control form-control-lg" id="nama" name="nama" 
                                value="{{ old('nama', $cake->nama) }}" required
                                style="border-radius: 10px; border: 1px solid #ddd; padding: 12px 15px;">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="jenis" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                                <i class="fas fa-cookie me-2" style="color: var(--primary-color);"></i>Jenis Kue
                            </label>
                            <select class="form-select form-select-lg" id="jenis" name="jenis" required
                                   style="border-radius: 10px; border: 1px solid #ddd; padding: 12px 15px;">
                                <option value="">Pilih Jenis Kue</option>
                                <option value="Kue Basah" {{ old('jenis', $cake->jenis) == 'Kue Basah' ? 'selected' : '' }}>Kue Basah</option>
                                <option value="Kue Kering" {{ old('jenis', $cake->jenis) == 'Kue Kering' ? 'selected' : '' }}>Kue Kering</option>
                                <option value="Pastry" {{ old('jenis', $cake->jenis) == 'Pastry' ? 'selected' : '' }}>Pastry</option>
                                <option value="Roti" {{ old('jenis', $cake->jenis) == 'Roti' ? 'selected' : '' }}>Roti</option>
                                <option value="Cake" {{ old('jenis', $cake->jenis) == 'Cake' ? 'selected' : '' }}>Cake</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                        <i class="fas fa-align-left me-2" style="color: var(--primary-color);"></i>Deskripsi
                    </label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required
                             style="border-radius: 10px; border: 1px solid #ddd; padding: 12px 15px;"
                    >{{ old('deskripsi', $cake->deskripsi) }}</textarea>
                    <small class="text-muted"><i class="fas fa-info-circle me-1"></i>Jelaskan detail dan keunikan kue ini</small>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="harga" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                                <i class="fas fa-money-bill-wave me-2" style="color: var(--primary-color);"></i>Harga (Rp)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background: var(--gradient-dark); color: white; border: none;">Rp</span>
                                <input type="number" class="form-control form-control-lg" id="harga" name="harga" 
                                    value="{{ old('harga', $cake->harga) }}" required min="0"
                                    style="border-radius: 0 10px 10px 0; border: 1px solid #ddd; padding: 12px 15px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="stok" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                                <i class="fas fa-cubes me-2" style="color: var(--primary-color);"></i>Stok
                            </label>
                            <input type="number" class="form-control form-control-lg" id="stok" name="stok" 
                                value="{{ old('stok', $cake->stok) }}" required min="0"
                                style="border-radius: 10px; border: 1px solid #ddd; padding: 12px 15px;">
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="bahan_utama" class="form-label" style="font-weight: 600; color: var(--dark-color);">
                        <i class="fas fa-mortar-pestle me-2" style="color: var(--primary-color);"></i>Bahan Utama
                    </label>
                    <input type="text" class="form-control form-control-lg" id="bahan_utama" name="bahan_utama" 
                        value="{{ old('bahan_utama', $cake->bahan_utama) }}"
                        style="border-radius: 10px; border: 1px solid #ddd; padding: 12px 15px;">
                    <small class="text-muted"><i class="fas fa-info-circle me-1"></i>Contoh: Tepung, gula, coklat, dll</small>
                </div>
                
                <div class="d-flex mt-5">
                    <button type="submit" class="btn btn-primary btn-lg me-2">
                        <i class="fas fa-save me-2"></i> Perbarui Kue
                    </button>
                    <a href="{{ route('cakes.show', $cake->id) }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="card mt-4" style="border-top: 5px solid var(--accent-color); border-radius: 15px;">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0" style="color: var(--accent-color); font-weight: 600;">
                    <i class="fas fa-history me-2"></i>Data Terakhir Diperbarui
                </h5>
                <span class="badge rounded-pill" style="background: var(--gradient-accent); padding: 7px 15px;">
                    {{ $cake->updated_at->format('d M Y, H:i') }}
                </span>
            </div>
            <p class="text-muted mb-0">
                <i class="fas fa-info-circle me-1"></i>ID Kue: {{ $cake->id }}
            </p>
        </div>
    </div>
@endsection