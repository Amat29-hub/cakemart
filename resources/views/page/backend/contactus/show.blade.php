@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-md-8">
    <div class="card shadow-sm rounded-3">
      <div class="card-body text-center">
        <h3 class="mb-4 fw-bold">Detail Contact Us</h3>

        <table class="table table-borderless w-75 mx-auto">
          <tbody>
            <tr>
              <th class="text-end" style="width: 30%;">First Name</th>
              <td class="text-start">{{ $contact->first_name }}</td>
            </tr>
            <tr>
              <th class="text-end">Last Name</th>
              <td class="text-start">{{ $contact->last_name }}</td>
            </tr>
            <tr>
              <th class="text-end">Subject</th>
              <td class="text-start">{{ $contact->subject }}</td>
            </tr>
            <tr>
              <th class="text-end">Description</th>
              <td class="text-start">{{ $contact->description }}</td>
            </tr>
          </tbody>
        </table>

        <div class="mt-4">
          <a href="{{ route('contactus.index') }}" class="btn btn-secondary px-4">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
