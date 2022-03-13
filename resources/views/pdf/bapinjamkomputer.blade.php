@extends('layout.layout')
@include('layout.fortableview')
@section('content')
@include('layout.flashmessage')
{!!Form::open(['route'=>'editbapinjamkomputer','method'=>'get','files'=>true,'enctype'=>'multipart/form-data']) !!}
{{ csrf_field() }}

    {{-- <div class="container"> --}}
        <div class="table table-responsive text-wrap">
            {{-- <a href="/downloadbacomp" class="btn btn-danger">Export PDF</a> --}}
            <div>
            <br>
              <h2>Daftar Berita Acara</h2> 
            </div>
            <table class="table align-middle">
                <thead>
                  <tr>
                    <th style="width:5%" scope="col">No</th>
                    <th scope="col">SNID</th>
                    <th scope="col">Model Komputer</th>
                    <th scope="col">Nama PIC</th>
                    <th scope="col">Jabatan PIC</th>
                    <th scope="col" style="width:10%">Pilih</th>
                    <th scope="col" style="width:10%">Kembali</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($data as $data)
                    <tr>
                        <th scope="row">{{++$no}}</th>
                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{ $data->snid }}</td>
                        <td>{{ $data->modelpc }}</td>
                        <td>{{ $data->nama_pic }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>
                          <input class="form-check-input" type="checkbox" value="{{$data->id}}" id="flexCheckDefault" name="cek_pilih[]">
                          <label class="form-check-label" for="flexCheckDefault">
                             Pilih
                          </label>
                          &nbsp;/
                          <a href="{{url('cetakberitaacara/'.$data->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                          </svg>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('cetakberitaacarakembali',[$data->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                            </svg>
                            </a>
  
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
              </table>
        </div>
        <div class="grid">
          <div class="g-col-6 g-col-md-4">
            <button class="btn btn-primary" type="submit">EDIT</button>
            {{-- <a href="{{ url('/problems/' . $data->id . '/edit') }}" class="btn btn-xs btn-primary">BATAL</a> --}}

            {{-- <button class="btn btn-primary" type="submit">BATAL</button> --}}
          </div>
        </div>
    {{-- </div> --}}
    {!!Form::close()!!}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection