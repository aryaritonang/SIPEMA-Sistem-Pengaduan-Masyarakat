@extends('template.main-white')

@section('content')

<div class="container">
  <div class="border-bottom border-dark py-7">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Umur</th>
          <th scope="col">NIK</th>
          <th scope="col">Kategori</th>
          <th scope="col">Keluhan</th>
          <th scope="col">Lampiran</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @foreach ($complaint as $details)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            @if( strtolower($details->status->name) != 'anonymous')
            <td>{{ $details->status->name }}</td>
            <td>{{ $details->age }}</td>
            <td>{{ $details->nik }}</td>
            @else
            <td>Anonim</td>
            <td><div class="bg-danger d-block">&nbsp;</div></td>
            <td><div class="bg-danger d-block">&nbsp;</div></td>
            @endif
            <td>{{ $details->complaint_category }}</td>
            <td>{{ $details->complaint_contents }}</td>
            <td><img src="{{ asset($details->attachment) }}" alt="" width="150px"></td>
            <td>
              @if($details->status->complaint_status == 1) 
                <span class="badge bg-success">Sudah</span>
              @else
                <span class="badge bg-danger">Belum</span>
              @endif
            </td>
            <td>
              @if($details->status->complaint_status == 1) 
                <a class="btn btn-danger px-2 py-1" href="{{ route('main.assignUndone') }}?id={{ $details->status->id }}"><span style="font-size: 0.85em">Tandai Belum</span></a>
                <a class="btn btn-danger px-2 py-1" href="{{ route('main.deleteComplaint') }}?id={{ $details->id }}&user={{ $details->id_user }}"><span style="font-size: 0.85em">Hapus</span></a>
                @else
                <a class="btn btn-success px-2 py-1 text-white" href="{{ route('main.assignDone') }}?id={{ $details->status->id }}"><span style="font-size: 0.85em">Tandai Sudah</span></a>
                <a class="btn btn-danger px-2 py-1" href="{{ route('main.deleteComplaint') }}?id={{ $details->id }}&user={{ $details->id_user }}"><span style="font-size: 0.85em">Hapus</span></a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div><!-- end of .container-->

@endsection