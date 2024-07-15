<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions</title>
</head>
<body>
    <div>
        <h1>Transaction List</h1>
        <form action="{{ route('transaction') }}" method="GET">
            <div>
                <label for="search">Search:</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </div>
        </form>
        
        @if ($transactions->isEmpty())
            <p>No transactions found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Price</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            {{-- Pagination Links --}}
            {{ $transactions->appends(request()->input())->links() }}
        @endif
    </div>
</body>
</html>
