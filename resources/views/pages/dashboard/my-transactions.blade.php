<div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Topic</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->discription}}</td>
                    <td>{{number_format($transaction->amount) }}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->status}}</td>
                    <td>
                        <a href="/admin/view-transaction/{{$transaction->id}}"
                           class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $transactions->links() }}
</div>
