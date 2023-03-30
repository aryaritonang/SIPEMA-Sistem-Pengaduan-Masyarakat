@extends('template.main')

@section('content')

  <div class="container">
    <div class="row align-items-start py-lg-8 py-6">
      <div class="col-lg-6 offset-lg-3 text-center text-lg-start mt-3 mt-lg-0">
        <div class="card bg-light text-black">
          <div class="card-header p-3 fw-bold">Form Pengaduan</div>
          <div class="card-body p-3">
            <form action="{{ url('/main/checkinput') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="umur">Umur</label>
                <input type="text" class="form-control p-3 @error('umur') is-invalid @enderror" id="umur" name="umur" placeholder="Masukkan Umur" value="{{ old('umur') }}">
                <div class="invalid-feedback">
                  @error('umur') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="nik">NIK</label>
                <input type="text" class="form-control p-3 @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Masukkan Nomor Identitas" value="{{ old('nik') }}">
                <div class="invalid-feedback">
                  @error('nik') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="kategori">Kategori Keluhan</label>
                <select name="kategori" id="kategori"class="form-control p-3 @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
                  <option value="" readonly>Pilih Kategori</option>
                  <option value="Pelayanan">Pelayanan</option>
                  <option value="Infrastruktur">Infrastruktur</option>
                  <option value="Lingkungan">Lingkungan</option>
                  <option value="Lain-Lain">Lain-Lain</option>
                </select>
                <div class="invalid-feedback">
                  @error('kategori') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control p-3 @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" placeholder="Masukkan Keluhan Anda">{{ old('keluhan') }}</textarea>
                <div class="invalid-feedback">
                  @error('keluhan') {{ $message }} @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="lampiran">Lampiran</label>
                <input type="file" class="form-control p-3 @error('lampiran') is-invalid @enderror" id="lampiran" name="lampiran" value="{{ old('lampiran') }}" accept="image/png, image/gif, image/jpeg" />
                <div class="invalid-feedback">
                  @error('lampiran') {{ $message }} @enderror
                </div>
              </div>
              <div class="mb-3 form-check">
                <div class="float-end">
                  <input type="checkbox" name="anonim" value=1 class="form-check-input" id="anonim">
                  <label class="form-check-label" for="anonim">Laporkan sebagai anonim</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-end px-3 py-2 rounded-1">Kirim</button>
            </form>
          </div>
          </div>
      </div>
    </div>
  </div>
  <!-- end of .container-->

@endsection