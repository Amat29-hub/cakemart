@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="row justify-content-center w-100">
    <div class="col-md-12">
      <div class="card shadow-sm rounded-3">
        <div class="card-body text-center">
          <h4 class="mb-4 fw-bold">Media Social</h4>
          <div class="table-responsive">
            <table class="table align-middle text-center">
              <thead class="table-light">
                <tr>
                  <th>Photo</th>
                  <th>Name Account</th>
                  <th>Media Social</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mediasocials as $media)
                <tr>
                  {{-- Foto --}}
                  <td>
                    @if($media->photo)
                      <img src="{{ asset('storage/'.$media->photo) }}"
                           alt="{{ $media->nameaccount }}"
                           style="width:80px; height:80px; object-fit:cover; border-radius:50%; border:1px solid #ddd;">
                    @else
                      <span class="text-muted">No photo</span>
                    @endif
                  </td>

                  <td class="fw-bold">{{ $media->nameaccount }}</td>
                  <td>{{ $media->namemediasocial }}</td>
                  <td><a href="{{ $media->link }}" target="_blank">{{ $media->link }}</a></td>

                  {{-- Toggle --}}
                  <td>
                    <form action="{{ route('mediasocial.toggleStatus',$media->id) }}" method="POST" class="d-inline">
                      @csrf @method('PATCH')
                      <label class="toggle-switch">
                        <input type="checkbox" onchange="this.form.submit()" {{ $media->is_active ? 'checked':'' }}>
                        <span class="slider"></span>
                      </label>
                    </form>
                  </td>

                  {{-- Edit & Delete --}}
                  <td>
                    <a href="{{ route('mediasocial.edit',$media->id) }}" class="btn btn-warning btn-sm text-white fw-bold">
                      Edit
                    </a>
                    <form action="{{ route('mediasocial.destroy',$media->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button class="btn btn-danger btn-sm fw-bold">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="{{ route('mediasocial.create') }}" class="btn btn-primary mt-3 fw-bold">+ Add Media Social</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- CSS toggle --}}
<style>
  .toggle-switch { position: relative; display: inline-block; width: 60px; height: 28px; }
  .toggle-switch input { opacity: 0; width: 0; height: 0; }
  .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #f5a9b1; transition: .4s; border-radius: 34px; }
  .slider:before { position: absolute; content: ""; height: 22px; width: 22px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%; }
  input:checked + .slider { background-color: #28a745; }
  input:checked + .slider:before { transform: translateX(32px); }
</style>
@endsection
