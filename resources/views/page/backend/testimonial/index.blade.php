@extends('layout.backend.app')
@php use Illuminate\Support\Facades\Storage; @endphp
@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-md-12">
    <div class="card shadow-sm rounded-3">
      <div class="card-body text-center">
        <h4 class="mb-4 fw-bold">Testimonials</h4>
        <div class="table-responsive">
          <table class="table align-middle text-center">
            <thead class="table-light">
              <tr>
                <th>Photo Profile</th>
                <th>Name</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($testimonials as $testimonial)
              <tr>
                {{-- Foto --}}
                <td>
                  @if($testimonial->photo_profile && Storage::disk('public')->exists($testimonial->photo_profile))
                    <img src="{{ asset('storage/'.$testimonial->photo_profile) }}"
                         alt="Profile"
                         style="width:80px; height:80px; object-fit:cover; border-radius:50%; border:1px solid #ddd;">
                  @else
                    <span class="text-muted">No photo</span>
                  @endif
                </td>

                {{-- Nama --}}
                <td>{{ $testimonial->name }}</td>

                {{-- Deskripsi --}}
                <td style="max-width: 300px; text-align: justify;">
                  {{ Str::limit($testimonial->description, 120, '...') }}
                </td>

                {{-- Rating --}}
                <td class="text-start py-3">
                  @php $stars = $testimonial->rating; @endphp
                  <div>
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $stars)
                        <i class="mdi mdi-star text-warning fs-5"></i>
                      @else
                        <i class="mdi mdi-star-outline text-secondary fs-5"></i>
                      @endif
                    @endfor
                  </div>
                </td>

                {{-- Toggle status --}}
                <td>
                  <form action="{{ route('testimonial.toggleStatus', $testimonial->id) }}" method="POST" class="d-inline">
                    @csrf @method('PATCH')
                    <label class="toggle-switch">
                      <input type="checkbox" onchange="this.form.submit()" {{ $testimonial->is_active ? 'checked':'' }}>
                      <span class="slider"></span>
                    </label>
                  </form>
                </td>

                {{-- Edit & Delete --}}
                <td>
                  <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-warning btn-sm text-white fw-bold">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                  <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm fw-bold">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <a href="{{ route('testimonial.create') }}" class="btn btn-primary mt-3 fw-bold">+ Add Testimonial</a>
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
