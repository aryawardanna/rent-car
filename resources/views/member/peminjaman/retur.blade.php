@extends('layouts-member.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengembalian Mobil</h3>
                            <a href="#" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('member.peminjaman.storeretur') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="member_id"
                                    value="{{ auth()->guard('members')->user()->id }}">
                                <input type="hidden" class="form-control" name="booking_id" value="{{ $retur->id }}">
                                <div class="form-group row border-bottom pb-4">
                                    <label for="total_date_sewa" class="col-sm-2 col-form-label">Lama Sewa Mobil /
                                        hari</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="total_date_sewa"
                                            value="{{ old('total_date_sewa') }}" id="total_date_sewa">
                                    </div>
                                </div>

                                <div class="form-group row border-bottom pb-4">
                                    <label for="end_date" class="col-sm-2 col-form-label">Tanggal Berakhir Sewa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="end_date"
                                            value="{{ $retur->end_date }}">
                                    </div>
                                </div>

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
