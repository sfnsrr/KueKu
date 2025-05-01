<style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .page-button {
        padding: 8px 16px; /* Ukuran tombol yang lebih kecil */
        background-color: #28a745; /* Ganti dengan warna yang sesuai dengan palet Anda */
        color: white;
        font-size: 14px; /* Ukuran font lebih kecil */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-block;
    }

    .page-button:hover {
        background-color: #218838; /* Warna hijau lebih gelap saat hover */
        transform: scale(1.05);
    }

    .page-button:active {
        background-color: #1e7e34; /* Warna hijau lebih gelap saat diklik */
    }

    .disabled {
        background-color: #e0e0e0;
        color: #b0b0b0;
        pointer-events: none;
        cursor: not-allowed;
    }

    .page-button:focus {
        outline: none;
    }
</style>

<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled page-button">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-button">Previous</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-button">Next</a>
    @else
        <span class="disabled page-button">Next</span>
    @endif
</div>
