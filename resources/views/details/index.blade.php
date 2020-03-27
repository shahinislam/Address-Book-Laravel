@extends('./layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Contact Details</h1>

            <table class="table table-striped table-success table-hover">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->firstname }} {{ $contact->lastname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $contact->birth }}</td>
                </tr>
                </tbody>
            </table>

            <h1 class="mt-3">Address</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Address Type</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip/PO</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                @forelse($address as $address)
                    <tr>
                        <th>{{ $address->name }}</th>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->state }}</td>
                        <td>{{ $address->zip }}</td>
                        <td>{{ $address->country }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6">No address to show.</td></tr>
                @endforelse
                </tbody>
            </table>

            <h1 class="mt-3">Phone Number</h1>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Phone Type</th>
                    <th>Number</th>
                </tr>
                </thead>
                <tbody>
                @forelse($phone as $phone)
                    <tr>
                        <th>{{ $phone->name }}</th>
                        <td>{{ $phone->number }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2">No Phone Number to Show.</td></tr>
                @endforelse
                </tbody>
            </table>
            <a href="/" class="btn btn-primary">Return Homepage</a>

        </div>
    </div>
@endsection