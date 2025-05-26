
    <div class="game-result card p-3 mb-3">
        <h3>Game Result</h3>
        <p><strong>Random Number:</strong> {{ $gameResult->randomNumber }}</p>
        <p>
            <strong>Result:</strong>
            @if ($gameResult->isWin)
                <span class="text-success">Win</span>
            @else
                <span class="text-danger">Lose</span>
            @endif
        </p>
        <p>
            <strong>Win Amount:</strong>
            {{ $gameResult->isWin ? number_format($gameResult->winAmount, 2) : '0' }}
        </p>
    </div>
