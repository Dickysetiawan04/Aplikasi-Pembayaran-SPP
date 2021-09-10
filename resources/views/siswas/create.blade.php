@extends('template')
 

@section('title')
<div class="float-left">
    <h2><b>Tabel Siswa</b></h2>
</div>
@endsection

@section('body')
<div class="container">
    <div class="row mt-3 mb-5">
        <div class="col-lg-12 margin-tb">
            <div>
                <a class="btn btn-outline-primary" style="width: 200px;" href="{{ route('siswas.index') }}"> Back</a>
            </div>
            <div class="float-left mt-4">
                <h2><b>Create new Student data !</b></h2>
                <hr>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
 
<form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 
     <div class="row container">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="number" name="nisn" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan NISN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="text" name="name" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Nama">
                </div>
            </div>
            <div class="input-group col-xs-12 col-sm-12 col-md-12" style="width: 630px;">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input custom-file-input" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="number" name="no_telpon" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan No. Telepon">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 300px;">
                    <select class="custom-select form-control-border border-width-2" id="tingkat" name="tingkat">
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 300px;">
                    <select class="custom-select form-control-border border-width-2" id="jurusan" name="jurusan">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="RPL">RPL</option>
                        <option value="MM">MM</option>
                        <option value="TEI">TEI</option>
                        <option value="BC">BC</option>
                        <option value="TKJ">TKJ</option>
                      </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="text" name="kelas" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Kelas">
                </div>
            </div>
            <input type="hidden" name="role" value="siswa">
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 300px;">
                    <select class="custom-select form-control-border border-width-2" id="role" name="role">
                        <option value="siswa">Siswa</option>
                      </select>
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="email" name="email" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="width: 600px;">
                    <input type="password" name="password" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Masukkan Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Create</button>
            </div>
        </div>
    </div>
 
</form>
@endsection

@section('coba2')
    
@endsection