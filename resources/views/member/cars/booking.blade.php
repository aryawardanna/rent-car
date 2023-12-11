@extends('layouts-member.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sewa Mobil <b>{{ $car->nama_mobil }}</b></h3>
                            <a href="{{ route('admin.cars.index') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('member.cars.storebooking') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="member_id"
                                    value="{{ auth()->guard('members')->user()->id }}">
                                <input type="hidden" class="form-control" name="car_id" value="{{ $car->id }}">
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ auth()->guard('members')->user()->name }}" id="nama_lengkap">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat_lengkap"
                                            value="{{ auth()->guard('members')->user()->address }}" id="alamat_lengkap">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nomer_wa" class="col-sm-2 col-form-label">Nomor Wa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nomer_wa"
                                            value="{{ auth()->guard('members')->user()->phone }}" id="nomer_wa">
                                    </div>
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="price" class="col-sm-2 col-form-label">Harga Sewa / hari</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" readonly name="price_awal"
                                            value="{{ $car->price }}" id="price">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="start_date" class="col-sm-2 col-form-label">Tanggal Awal Sewa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control datetimepicker-input" name="start_date"
                                            value="" id="start_date">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Berakhir Sewa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="end_date" value=""
                                            id="datepicker">
                                    </div>
                                </div>

                                {{-- {{ dd($car) }} --}}
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
