@extends('template.main-white')

@section('content')

<div class="container">
  <div class="border-bottom border-dark py-7">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Umur</th>
          <th scope="col">NIK</th>
          <th scope="col">Kategori</th>
          <th scope="col">Keluhan</th>
          <th scope="col">Lampiran</th>
          <th scope="col">Anonim</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @foreach ($history as $complaint)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $complaint->age }}</td>
            <td>{{ $complaint->nik }}</td>
            <td>{{ $complaint->complaint_category }}</td>
            <td>{{ $complaint->complaint_contents }}</td>
            <td><img src="{{ asset($complaint->attachment) }}" alt="" width="150px"></td>
            <td>{{ strtolower($complaint->status->name) == 'anonymous' ? 'Iya' : 'Tidak' }}</td>
            <td>
              @if($complaint->status->complaint_status == 1) 
                <span class="badge bg-success">Sudah</span>
              @else
                <span class="badge bg-danger">Belum</span>
              @endif
            </td>
            <td>
              @if($complaint->status->complaint_status != 1) 
                <a class="btn btn-danger px-2 py-1" href="{{ route('main.deleteComplaint') }}?id={{ $complaint->id }}">hapus</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div><!-- end of .container-->

@endsection