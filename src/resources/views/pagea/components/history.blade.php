<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Random Number</th>
        <th>Result</th>
        <th>Win Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($gameResults as $index => $gameResult)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $gameResult->randomNumber }}</td>
            <td>
                @if ($gameResult->isWin)
                    <span class="text-success">Win</span>
                @else
                    <span class="text-danger">Lose</span>
                @endif
            </td>
            <td>
                {{ $gameResult->isWin ? number_format($gameResult->winAmount, 2) : '0' }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
