@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Pengembalian <b>{{ $returns->members->name }}</b></h3>
                            <a href="{{ route('admin.pengembalian.index') }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.pengembalian.update', $returns->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row border-bottom pb-4">
                                    <label for="total_date_sewa" class="col-sm-2 col-form-label">Lama Sewa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="total_date_sewa"
                                            value="{{ $returns->total_date_sewa }}" id="total_date_sewa">
                                    </div>
                                </div>


                                <div class="form-group row border-bottom pb-4">
                                    <label for="no_plat" class="col-sm-2 col-form-label">No plat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_plat"
                                            value="{{ $returns->no_plat }}" id="no_plat">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="total_pay" class="col-sm-2 col-form-label">Total Pay Peminjaman</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="total_pay"
                                            value="{{ $returns->total_pay }}" id="total_pay">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="bayar" class="col-sm-2 col-form-label">Member Bayar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="bayar"
                                            value="{{ $returns->bayar }}" id="bayar">
                                    </div>
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="end_date"
                                            value="{{ $returns->end_date }}" id="end_date">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="status" class="col-sm-2 col-form-label">Status Pembayaran</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status" id="status">
                                            <option value="Lunas" {{ $returns->status == 'Lunas' ? 'selected' : null }}>
                                                Belum Bayar</option>
                                            <option value="Belum Bayar"
                                                {{ $returns->status == 'Lunas' ? 'selected' : null }}>Lunas</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- {{ dd($booking) }} --}}
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@push('script-alt')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('input[name="start_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        $('input[name="end_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            // autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    </script>
@endpush
