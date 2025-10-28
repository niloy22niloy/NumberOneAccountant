@extends('admin.dashboard')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Add Pricing Plan</h3>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.pricing.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Plan Type</label>
                            <input type="text" name="plan_type" class="form-control" placeholder="Basic, Premium"
                                required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Billing Cycle</label>
                            <select name="billing_cycle" class="form-select" required>
                                <option value="Monthly">Monthly</option>
                                <option value="Annually">Annually</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Choose The Pricing"
                                required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div id="features-container">
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" placeholder="Enter a feature"
                                    required>
                                <button type="button" class="btn btn-success add-feature">+</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Plan</button>
                </form>
            </div>
        </div>

        {{-- Active Plans --}}
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Active Plans</div>
            <div class="card-body">
                @if ($activePlans->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Type</th>
                                <th>Billing</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activePlans as $plan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plan->plan_type }}</td>
                                    <td>{{ $plan->billing_cycle }}</td>
                                    <td>{{ $plan->title }}</td>
                                    <td>${{ $plan->price }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($plan->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pricing.edit', $plan->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.pricing.destroy', $plan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Deactivate this plan?')">Deactivate</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No active plans.</p>
                @endif
            </div>
        </div>

        {{-- Inactive Plans --}}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Inactive Plans</div>
            <div class="card-body">
                @if ($inactivePlans->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan Type</th>
                                <th>Billing</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inactivePlans as $plan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plan->plan_type }}</td>
                                    <td>{{ $plan->billing_cycle }}</td>
                                    <td>{{ $plan->title }}</td>
                                    <td>${{ $plan->price }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($plan->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pricing.edit', $plan->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.pricing.activate', $plan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-success"
                                                onclick="return confirm('Activate this plan?')">Activate</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No inactive plans.</p>
                @endif
            </div>
        </div>
    </div>
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            // Add new feature input
            $(document).on('click', '.add-feature', function() {
                let newInput = `
            <div class="input-group mb-2">
                <input type="text" name="features[]" class="form-control" placeholder="Enter a feature" required>
                <button type="button" class="btn btn-danger remove-feature">−</button>
            </div>
        `;
                $('#features-container').append(newInput);
            });

            // Remove feature input
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.input-group').remove();
            });

        });
    </script>
@endsection
@endsection
