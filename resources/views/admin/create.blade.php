@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Tambah Data Jamaah</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="{{ url('umroh/store') }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- Nama --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="name">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="nama" placeholder="Tulis Nama Sesuai KTP" required/>
              </div>
            </div>

            {{-- NIK --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nik">NIK</label>
              <div class="col-sm-10">
                <input type="text" maxlength="16" pattern="[0-9]*" class="form-control" id="nik" name="nik" placeholder="Tulis NIK Sesuai dengan KTP" required/>
              </div>
            </div>

            {{-- Tempat Lahir --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tulis Tempat lahir Sesuai dengan KTP" required/>
              </div>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required/>
              </div>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="row mb-3">
              <label class="col-form-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="L" required>
                  <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="P">
                  <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                </div>
              </div>
            </div>

            {{-- Alamat --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
              <div class="col-sm-10">
                <textarea id="alamat" class="form-control" placeholder="Tulis Alamat Anda Sesuai KTP" name="alamat" required></textarea>
              </div>
            </div>

            {{-- Provinsi, Kab/Kota, Kecamatan, Kelurahan/Desa --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="provinsi">Provinsi</label>
              <div class="col-sm-10">
               <select class="form-control" name="provinsi" id="provinsi">
                <option value="">Pilih Provinsi...</option>
            </select>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kab_kota">Kab/Kota</label>
              <div class="col-sm-10">
            <select class="form-control"  id="kab_kota" disabled>
                <option value="">Pilih Kota...</option>
            </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kecamatan">Kecamatan</label>
              <div class="col-sm-10">
            <select class="form-control" name="kecamatan" id="kecamatan" disabled>
                <option value="">Pilih Kecamatan...</option>
            </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="kelurahan">Kelurahan/Desa</label>
              <div class="col-sm-10">
              <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                   <option value="">Pilih Desa...</option>
               </select>
              </div>
            </div>

            {{--Calon Jamaah --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="calon_jamaah">Calon Jamaah </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="calon_jamaah" name="calon_jamaah" placeholder="Calon Jamaah" />
              </div>
            </div>


            {{-- No Paspor --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="no_paspor">No Paspor</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_paspor" name="no_paspor" placeholder="Tulis No Paspor" />
              </div>
            </div>


            {{-- Masa Berlaku Paspor --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="masa_berlaku_paspor">Masa Berlaku Paspor</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="masa_berlaku_paspor" name="masa_berlaku_paspor" />
              </div>
            </div>

            {{-- Lampiran --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lampiran_ktp">Lampiran KTP</label>
              <div class="col-sm-10">
                <input type="file" id="lampiran_ktp" name="lampiran_ktp" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lampiran_kk">Lampiran KK</label>
              <div class="col-sm-10">
                <input type="file" id="lampiran_kk" name="lampiran_kk" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lampiran_foto">Lampiran Foto Diri</label>
              <div class="col-sm-10">
                <input type="file" id="lampiran_foto" name="lampiran_foto" class="form-control" required />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lampiran_paspor">Lampiran Paspor</label>
              <div class="col-sm-10">
                <input type="file" id="lampiran_paspor" name="lampiran_paspor" class="form-control" />
              </div>
            </div>

            {{-- No Visa (opsional) --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="no_visa">No Visa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="no_visa" name="no_visa" placeholder="Tulis No Visa (opsional)" />
              </div>
            </div>

            {{-- Berlaku Sampai (opsional) --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="berlaku_sampai">Berlaku Sampai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai" />
              </div>
            </div>

                {{-- Pekerjaan --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pekerjaan">Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tulis Pekerjaan" required/>
              </div>
            </div>

            {{-- Pembimbing --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pembimbing">Pembimbing</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pembimbing" name="pembimbing" placeholder="Tulis Nama Pembimbing" required/>
              </div>
            </div>

            {{-- Keberangkatan --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="keberangkatan">Tanggal Keberangkatan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="keberangkatan" name="keberangkatan" required/>
              </div>
            </div>

            {{-- Paket Dipilih --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="paket">Paket Dipilih</label>
              <div class="col-sm-10">
                <select class="form-select" name="paket" id="paket" required>
                   @foreach($paketList as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->title }}</option>
                   @endforeach
                </select>
              </div>
            </div>

            {{-- Submit Button --}}
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
