@extends('visitor.layout.app')

@section('content')
    @include('visitor.components.navbar_custom')

    <div class="container mt-5">
        <br>
        <br>
        <h3>Booking History</h3>

        @if ($bookings->count() > 0)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Destinasi</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $b)
                        <tr>
                            {{-- Nama user --}}
                            <td>{{ $b->name }}</td>

                            {{-- Destinasi + Image --}}
                            <td>
                                @if ($b->tripSchedule && $b->tripSchedule->destination)
                                    <img src="{{ asset('images/destinations/' . ($b->tripSchedule->destination->image ?? 'default.jpg')) }}"
                                        width="60" style="border-radius:8px;">
                                    <br>
                                    {{ $b->tripSchedule->destination->name }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $b->qty }}</td>

                            <td>Rp {{ number_format($b->total_price) }}</td>

                            <td>
                                <span
                                    class="badge
                                {{ $b->status == 'paid' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $b->status }}
                                </span>
                            </td>

                            <td>{{ $b->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Belum ada reservasi.</p>
        @endif
    </div>
@endsection
