@extends('layouts-member.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mobil</h3>
                            {{-- <a href="{{ route('member.cars.create') }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-plus"></i> Tambah </a> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tanggal Awal</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Harga Sewa</th>
                                            <th>Harga / hari</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $booking->nama_lengkap }}</td>
                                                <td>{{ $booking->start_date }}</td>
                                                <td>{{ $booking->end_date }}</td>
                                                <td>Rp{{ number_format($booking->total_pay, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($booking->price_awal, 0, ',', '.') }}</td>

                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('member.peminjaman.retur', ['bookingId' => $booking->id]) }}"
                                                            class="btn btn-sm btn-primary">
                                                            Pengembalian Mobil
                                                        </a>
                                                        {{-- <form onclick="return confirm('are you sure !')"
                                                            action="{{ route('member.cars.destroy', $bookings) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kosong !</td>
                                            </tr>
                                        @endforelse
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('style-alt')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $("#data-table").DataTable();
    </script>
@endpush
