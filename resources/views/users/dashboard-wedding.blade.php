@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <h4>Data Wedding Digital</h4>
                    <div class="mb-2 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Url</label>
                        <div class="col-sm-3 p-0">
                            <input type="text" class="form-control" required name="url">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label ps-5">Thema Web</label>
                        <div class="col-sm-3 p-0">
                            <select name="theme" id="" class="form-select">
                                <option value="{{ $getStatus->theme->name_theme }}">{{ $getStatus->theme->name_theme }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Pernikahan</label>
                        <div class="col-sm-3 p-0">
                            <input type="datetime-local" class="form-control" required name="date_count">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label ps-5">Foto Akad</label>
                        <div class="col-sm-3 p-0">
                            <input type="file" class="form-control" required name="image">
                        </div>
                    </div>
                <div class="row ">
                    <div class="col-md-6">
                        <h5 class="text-center">Data Pengantin Pria</h5>
                    <div class="card ">
                            <div class="card-body">
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="name_groom"> 
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Ayah Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="father_groom">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Ibu Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="mother_groom">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Anak Ke</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="child_groom">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Foto Pria</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" required name="photo_groom">
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center">Data Pengantin Wanita</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="name_bride">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Ayah Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required  name="father_bride">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Ibu Pengantin</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="mother_bride">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Anak Ke</label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" required name="child_bride">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Foto Wanita</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" required name="photo_bride">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="staticEmail" class="col-sm-4 col-form-label">Gallery Foto</label>
                        <div class="col-sm-3 p-0">
                            <input type="file" class="form-control" required name="filename[]" multiple>
                        </div>
                <button class="btn btn-secondary mt-3" type="submit">Kirim</button>
            </div>
        </form>

    <!-- /.container-fluid -->
@endsection
