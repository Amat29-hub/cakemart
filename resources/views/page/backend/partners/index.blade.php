@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-12">
      <div class="card shadow-sm rounded-3">
        <div class="card-body text-center">
          <h4 class="mb-4 fw-bold">Partners</h4>
          <div class="table-responsive">
            <table class="table align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($partners as $partner)
                <tr>
                  <td>
                    @if($partner->photo && Storage::disk('public')->exists($partner->photo))
                      <img src="{{ asset('storage/'.$partner->photo) }}" style="width:80px; height:80px; object-fit:cover; border-radius:10px;">
                    @else
                      <span class="text-muted">No photo</span>
                    @endif
                  </td>
                  <td class="fw-bold">{{ $partner->name }}</td>
                  <td style="max-width: 300px; text-align: justify;">{{ Str::limit($partner->description,120,'...') }}</td>
                  <td>
                    <form action="{{ route('partners.toggleStatus',$partner->id) }}" method="POST" class="d-inline">
                      @csrf @method('PATCH')
                      <label class="toggle-switch">
                        <input type="checkbox" onchange="this.form.submit()" {{ $partner->is_active ? 'checked':'' }}>
                        <span class="slider"></span>
                      </label>
                    </form>
                  </td>
                  <td>
                    <a href="{{ route('partners.edit',$partner->id) }}" class="btn btn-warning btn-sm text-white fw-bold">Edit</a>
                    <form action="{{ route('partners.destroy',$partner->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm fw-bold">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{ route('partners.create') }}" class="btn btn-primary mt-3 fw-bold">+ Add Partner</a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .toggle-switch { position: relative; display: inline-block; width: 60px; height: 28px; }
  .toggle-switch input { opacity: 0; width: 0; height: 0; }
  .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #f5a9b1; transition: .4s; border-radius: 34px; }
  .slider:before { position: absolute; content: ""; height: 22px; width: 22px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
  input:checked + .slider { background-color: #28a745; }
  input:checked + .slider:before { transform: translateX(32px); }
</style>
@endsection
