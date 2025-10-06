@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-12">
      <div class="card shadow-sm rounded-3">
        <div class="card-body text-center">
          <h4 class="mb-4 fw-bold">Contact Us</h4>
          <div class="table-responsive">
            <table class="table align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Subject</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contacts as $contact)
                <tr>
                  <td>{{ $contact->first_name }}</td>
                  <td>{{ $contact->last_name }}</td>
                  <td>{{ $contact->subject }}</td>
                  <td style="max-width:250px;text-align:justify;">{{ Str::limit($contact->description,80) }}</td>
                  <td>
                    @if($contact->is_seen)
                      <span class="badge bg-success">Sudah Dilihat</span>
                    @else
                      <span class="badge bg-danger">Belum Dilihat</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('contactus.show',$contact->id) }}" class="btn btn-warning btn-sm text-white fw-bold">Show</a>
                    <form action="{{ route('contactus.destroy',$contact->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm fw-bold">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
