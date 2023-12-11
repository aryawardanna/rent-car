@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.bookings.update', $booking->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ $booking->nama_lengkap }}" id="nama_lengkap">
                                    </div>
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat_lengkap"
                                            value="{{ $booking->alamat_lengkap }}" id="alamat_lengkap">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="pintu" class="col-sm-2 col-form-label">Nomor WA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nomer_wa"
                                            value="{{ $booking->nomer_wa }}" id="pintu">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="price_awal" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="price_awal"
                                            value="{{ $booking->price_awal }}" id="price_awal">
                                    </div>
                                </div>
                                {{-- <div class="form-group row border-bottom pb-4">
                                    <label for="total_pay" class="col-sm-2 col-form-label">Total Price</label>
                                    <div class="col-sm-10">

                                        <input type="number" class="form-control" name="total_pay"
                                            value="{{ $booking->total_pay }}" id="total_pay">
                                    </div>
                                </div> --}}
                                <div class="form-group row border-bottom pb-4">
                                    <label for="start_date" class="col-sm-2 col-form-label">Tanggal Awal</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="start_date"
                                            value="{{ $booking->start_date }}" id="start_date">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" name="end_date"
                                            value="{{ $booking->end_date }}" id="end_date">
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
