@extends('layout.backend.app')
@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-12">
      <div class="card shadow-sm rounded-3">
        <div class="card-body text-center">
          <h4 class="mb-4 fw-bold">Sejarah</h4>
          <div class="table-responsive">
            <table class="table align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sejarahs as $sejarah)
                <tr>
                  {{-- Foto --}}
                  <td>
                    @if($sejarah->photo && \Illuminate\Support\Facades\Storage::disk('public')->exists($sejarah->photo))
                      <img src="{{ asset('storage/'.$sejarah->photo) }}"
                           alt="{{ $sejarah->title }}"
                           style="width:150px; height:100px; object-fit:cover; border-radius:8px; border:1px solid #ddd; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    @else
                      <span class="text-muted">No photo</span>
                    @endif
                  </td>

                  {{-- Title --}}
                  <td class="fw-bold">{{ $sejarah->title }}</td>

                  {{-- Description --}}
                  <td style="max-width: 400px; text-align: justify;">{{ Str::limit($sejarah->description, 150, '...') }}</td>

                  {{-- Toggle status --}}
                  <td>
                    <form action="{{ route('sejarah.toggleStatus', $sejarah->id) }}" method="POST" class="d-inline">
                      @csrf @method('PATCH')
                      <label class="toggle-switch">
                        <input type="checkbox" onchange="this.form.submit()" {{ $sejarah->is_active ? 'checked':'' }}>
                        <span class="slider"></span>
                      </label>
                    </form>
                  </td>

                  {{-- Tombol Edit & Delete --}}
                  <td>
                    <a href="{{ route('sejarah.edit',$sejarah->id) }}" class="btn btn-warning btn-sm text-white fw-bold">Edit</a>
                    <form action="{{ route('sejarah.destroy',$sejarah->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm fw-bold">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{ route('sejarah.create') }}" class="btn btn-primary mt-3 fw-bold">+ Create New</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- CSS custom toggle --}}
<style>
  .toggle-switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 28px;
  }
  .toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #f5a9b1;
    transition: 0.4s;
    border-radius: 34px;
  }
  .slider:before {
    position: absolute;
    content: "";
    height: 22px;
    width: 22px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
  }
  input:checked + .slider {
    background-color: #28a745;
  }
  input:checked + .slider:before {
    transform: translateX(32px);
  }
</style>
@endsection
