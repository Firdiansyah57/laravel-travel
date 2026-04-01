@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <div class="container mt-5">
        <br><br>
        <div class="d-flex justify-content-between align-items-center">
            <h3>Booking History</h3>
            <span class="badge badge-info">Ngrok Active: {{ request()->getHost() }}</span>
        </div>

        @if ($bookings->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Booking</th>
                            <th>Destinasi</th>
                            <th>Qty</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Tanggal Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $b)
                            <tr>
                                <td><small class="text-muted">#{{ $b->id }}</small></td>

                                {{-- Destinasi + Image --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if ($b->tripSchedule && $b->tripSchedule->destination)
                                            <img src="{{ asset('images/destinations/' . ($b->tripSchedule->destination->image ?? 'default.jpg')) }}"
                                                width="60" height="45" style="border-radius:8px; object-fit: cover;"
                                                class="mr-3">
                                            <div>
                                                <strong>{{ $b->tripSchedule->destination->title }}</strong><br>
                                                <small class="text-muted">{{ $b->name }}</small>
                                            </div>
                                        @else
                                            <span class="text-muted">Data destinasi tidak ditemukan</span>
                                        @endif
                                    </div>
                                </td>

                                <td>{{ $b->qty }} Pax</td>

                                <td>
                                    <span class="font-weight-bold">Rp
                                        {{ number_format($b->total_price, 0, ',', '.') }}</span>
                                </td>

                                <td>
                                    @if ($b->status == 'paid')
                                        <span class="badge badge-success px-3 py-2">
                                            <i class="fa fa-check-circle"></i> LUNAS
                                        </span>
                                    @elseif($b->status == 'pending')
                                        <span class="badge badge-warning px-3 py-2 text-dark">
                                            <i class="fa fa-clock"></i> PENDING
                                        </span>
                                    @elseif($b->status == 'cancelled')
                                        <span class="badge badge-danger px-3 py-2">
                                            <i class="fa fa-times-circle"></i> BATAL
                                        </span>
                                    @else
                                        <span class="badge badge-secondary px-3 py-2">
                                            {{ strtoupper($b->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>{{ $b->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="100" class="mb-3 opacity-50">
                <p class="text-muted">Belum ada riwayat reservasi.</p>
                <a href="{{ route('destinations.index') }}" class="btn btn-primary">Cari Destinasi Sekarang</a>
            </div>
        @endif
    </div>
@endsection
