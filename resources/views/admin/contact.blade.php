@extends('admin.dashboard')

@section('content')
    <div class="container-fluid mt-4">
        <h3 class="mb-4">Contact Submissions</h3>

        <div class="card">
            <div class="card-header">
                <h3>Contacts </h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="mb-3 p-3 rounded"
                        style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="contactsTable" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $contact->full_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->contact_number }}</td>
                                <td>{{ $contact->company ?? '—' }}</td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                <td>{{ $contact->created_at->format('d M, Y h:i A') }}</td>
                                <td>
                                    <div class="mb-3">
                                        <a href="{{ route('admin.contact_delete', $contact->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    {{-- DataTables CSS & JS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contactsTable').DataTable({
                pageLength: 10,

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search contacts..."
                }
            });
        });
    </script>
@endsection
