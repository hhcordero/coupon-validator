@extends('layouts.master')
@section('title', 'Validate')
@section('content')
  <div class="pt-5 pb-2 text-center">
    <h2>Validate Coupon</h2>
    <p class="lead">Provide ticket information below to claim coupon.</p> 
  </div>
  <div class="row">
    <form method="POST" action="/coupon" class="needs-validation">
      @csrf

      <div class="mb-3">
        <label for="ticket_number">Ticket Number</label>
        <input type="text" class="form-control" id="ticket_number" name="ticket_number" placeholder="" value="{{ old('ticket_number') }}" required>
        <div class="invalid-feedback" style="width: 100%;">
          Ticket number is required.
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
        <div class="invalid-feedback">
          Please enter a valid email address for receiving the coupon.
        </div>
      </div>

      <div class="mb-3">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{ old('first_name') }}" required>
        <div class="invalid-feedback">
          First name is required.
        </div>
      </div>

      <div class="mb-3">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="{{ old('last_name') }}" required>
        <div class="invalid-feedback">
          Last name is required.
        </div>
      </div>
      <hr class="mb-4">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Validate</button>

            @foreach (['success', 'danger'] as $status)
                @if (Session::has($status))
                    <div class="mt-4 alert alert-{{ $status }}">{{ Session::get($status) }}</div>
                @endif
            @endforeach

			@if ($errors->any())
				<div class="mt-4 alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
    </form>
  </div>
@endsection
