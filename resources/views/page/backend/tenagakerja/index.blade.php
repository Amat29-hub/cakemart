@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-12">
      <div class="card shadow-sm rounded-3">
        <div class="card-body text-center">
          <h4 class="mb-4 fw-bold">Tenaga Kerja</h4>
          <div class="table-responsive">
            <table class="table align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tenagakerja as $tk)
                <tr>
                  <td>
                    @if($tk->photo && Storage::disk('public')->exists($tk->photo))
                      <img src="{{ asset('storage/'.$tk->photo) }}" style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
                    @else
                      <span class="text-muted">No photo</span>
                    @endif
                  </td>
                  <td class="fw-bold">{{ $tk->name }}</td>
                  <td>{{ $tk->position }}</td>
                  <td style="max-width: 300px; text-align: justify;">{{ Str::limit($tk->description,120,'...') }}</td>
                  <td>
                    <form action="{{ route('tenagakerja.toggleStatus',$tk->id) }}" method="POST" class="d-inline">
                      @csrf @method('PATCH')
                      <label class="toggle-switch">
                        <input type="checkbox" onchange="this.form.submit()" {{ $tk->is_active ? 'checked':'' }}>
                        <span class="slider"></span>
                      </label>
                    </form>
                  </td>
                  <td>
                    <a href="{{ route('tenagakerja.edit',$tk->id) }}" class="btn btn-warning btn-sm text-white fw-bold">Edit</a>
                    <form action="{{ route('tenagakerja.destroy',$tk->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm fw-bold">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{ route('tenagakerja.create') }}" class="btn btn-primary mt-3 fw-bold">+ Add Tenaga Kerja</a>
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
