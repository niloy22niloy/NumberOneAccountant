@extends('admin.dashboard')

@section('content')
    <div class="container-fluid">
        <h4>Edit Plan - {{ $plan->title }}</h4>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.pricing.update', $plan->id) }}">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Plan Type</label>
                            <input type="text" name="plan_type" value="{{ $plan->plan_type }}" class="form-control"
                                required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Billing Cycle</label>
                            <select name="billing_cycle" class="form-select" required>
                                <option value="Monthly" {{ $plan->billing_cycle == 'Monthly' ? 'selected' : '' }}>Monthly
                                </option>
                                <option value="Annually" {{ $plan->billing_cycle == 'Annually' ? 'selected' : '' }}>Annually
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ $plan->title }}" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" value="{{ $plan->price }}"
                                class="form-control" required>
                        </div>
                    </div>

                    <label class="form-label">Features</label>
                    <div id="features-container">
                        @foreach ($plan->features as $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="{{ $feature }}"
                                    required>
                                <button type="button" class="btn btn-danger remove-feature">−</button>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success add-feature">+ Add Feature</button>
                    </div>
                </div>
            </div>
<!---git-->


            <button type="submit" class="btn btn-primary mt-3">Update Plan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.add-feature', function() {
            let input = `<div class="input-group mb-2">
        <input type="text" name="features[]" class="form-control" placeholder="Enter a feature" required>
        <button type="button" class="btn btn-danger remove-feature">−</button>
    </div>`;
            $('#features-container').append(input);
        });
        $(document).on('click', '.remove-feature', function() {
            $(this).closest('.input-group').remove();
        });
    </script>
@endsection
