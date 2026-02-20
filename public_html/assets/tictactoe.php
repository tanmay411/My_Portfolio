<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tic Tac Toe — Simple</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .board {
            max-width: 420px;
            margin: 30px auto;
        }

        .cell {
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            cursor: pointer;
            user-select: none;
            background: #fff;
            border: 2px solid #dee2e6;
        }

        .row-cell {
            display: flex;
        }

        .cell.disabled {
            cursor: not-allowed;
            opacity: 0.75;
        }

        .cell.win {
            background: linear-gradient(90deg, #ffd54a33, #ffd54a11);
        }

        .status {
            min-height: 2.2rem;
        }

        @media (max-width: 480px) {
            .cell {
                width: 90px;
                height: 90px;
                font-size: 2.4rem;
            }
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="card shadow-sm mx-auto" style="max-width:900px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Tic Tac Toe</h3>
                    <div>
                        <button id="resetBtn" class="btn btn-outline-primary btn-sm me-2">Reset Board</button>
                        <button id="newGameBtn" class="btn btn-primary btn-sm">New Game</button>
                    </div>
                </div>

                <div class="d-flex gap-3 flex-column flex-md-row">
                    <div class="board card p-3">
                        <div id="board" class="board-grid">
                            <!-- grid will be injected -->
                        </div>
                    </div>

                    <div style="min-width:220px;" class="ms-md-2">
                        <div class="mb-2">
                            <div class="fw-semibold">Status</div>
                            <div id="status" class="status text-muted">Click any cell to start. X goes first.</div>
                        </div>

                        <div class="mb-2">
                            <div class="fw-semibold">Score</div>
                            <div id="score" class="small text-muted">X: 0 | O: 0 | Draws: 0</div>
                        </div>

                        <div class="mb-2">
                            <div class="fw-semibold">Controls</div>
                            <div class="small text-muted">Use <strong>Reset Board</strong> to clear current board (keeps
                                score). Use <strong>New Game</strong> to reset board and scores.</div>
                        </div>

                        <div class="mt-3">
                            <label class="form-check">
                                <input id="aiToggle" class="form-check-input" type="checkbox">
                                <span class="form-check-label">Play vs Computer (O)</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Simple Tic Tac Toe
        const BOARD_SIZE = 3;
        const boardEl = document.getElementById('board');
        const statusEl = document.getElementById('status');
        const scoreEl = document.getElementById('score');
        const resetBtn = document.getElementById('resetBtn');
        const newGameBtn = document.getElementById('newGameBtn');
        const aiToggle = document.getElementById('aiToggle');

        let cells = []; // array of 9: '', 'X', 'O'
        let currentPlayer = 'X';
        let running = true;
        let scores = { X: 0, O: 0, D: 0 };

        const winningCombos = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // cols
            [0, 4, 8], [2, 4, 6] // diagonals
        ];

        function createBoard() {
            boardEl.innerHTML = '';
            boardEl.className = '';
            boardEl.style.display = 'grid';
            boardEl.style.gridTemplateColumns = 'repeat(3, 1fr)';
            boardEl.style.gap = '6px';

            cells = Array(9).fill('');
            running = true;
            currentPlayer = 'X';
            statusEl.textContent = 'X to move.';

            for (let i = 0; i < 9; i++) {
                const cell = document.createElement('div');
                cell.className = 'cell rounded text-center';
                cell.dataset.index = i;
                cell.addEventListener('click', onCellClick);
                boardEl.appendChild(cell);
            }
        }

        function onCellClick(e) {
            const idx = Number(e.currentTarget.dataset.index);
            if (!running) return;
            if (cells[idx] !== '') return;

            makeMove(idx, currentPlayer);

            if (aiToggle.checked && running && currentPlayer === 'O') {
                // if it's O's turn and AI is enabled, let AI play
                aiMove();
            }
        }

        function makeMove(idx, player) {
            cells[idx] = player;
            const cellEl = boardEl.querySelector('[data-index="' + idx + '"]');
            cellEl.textContent = player;
            cellEl.classList.add('disabled');

            const winner = checkWinner();
            if (winner) {
                endGame(winner);
            } else if (cells.every(c => c !== '')) {
                endGame('D'); // draw
            } else {
                currentPlayer = (player === 'X') ? 'O' : 'X';
                statusEl.textContent = currentPlayer + ' to move.';
                // If AI is on and it's O's turn and O is the AI, make AI move after small delay
                if (aiToggle.checked && currentPlayer === 'O') {
                    setTimeout(aiMove, 350);
                }
            }
        }

        function checkWinner() {
            for (const combo of winningCombos) {
                const [a, b, c] = combo;
                if (cells[a] && cells[a] === cells[b] && cells[a] === cells[c]) {
                    return cells[a];
                }
            }
            return null;
        }

        function endGame(result) {
            running = false;
            if (result === 'D') {
                statusEl.textContent = "It's a draw!";
                scores.D += 1;
            } else {
                statusEl.textContent = result + ' wins!';
                scores[result] += 1;
                highlightWin(result);
            }
            updateScore();
        }

        function highlightWin(player) {
            for (const combo of winningCombos) {
                const [a, b, c] = combo;
                if (cells[a] && cells[a] === cells[b] && cells[a] === cells[c]) {
                    [a, b, c].forEach(i => boardEl.querySelector('[data-index="' + i + '"]').classList.add('win'));
                }
            }
        }

        function updateScore() {
            scoreEl.textContent = `X: ${scores.X} | O: ${scores.O} | Draws: ${scores.D}`;
        }

        function resetBoard() {
            // clear cells but keep scores
            createBoard();
            updateScore();
        }

        function newGame() {
            scores = { X: 0, O: 0, D: 0 };
            createBoard();
            updateScore();
        }

        function aiMove() {
            if (!running) return;
            // very simple AI: choose winning move, block opponent, else random
            const ai = 'O';
            const human = 'X';

            // try winning move
            for (let i = 0; i < 9; i++) {
                if (cells[i] === '') {
                    cells[i] = ai;
                    if (checkWinner() === ai) { cells[i] = ''; makeMove(i, ai); return; }
                    cells[i] = '';
                }
            }
            // try block
            for (let i = 0; i < 9; i++) {
                if (cells[i] === '') {
                    cells[i] = human;
                    if (checkWinner() === human) { cells[i] = ''; makeMove(i, ai); return; }
                    cells[i] = '';
                }
            }
            // take centre if free
            if (cells[4] === '') { makeMove(4, ai); return; }
            // random corner
            const corners = [0, 2, 6, 8].filter(i => cells[i] === '');
            if (corners.length) { makeMove(corners[Math.floor(Math.random() * corners.length)], ai); return; }
            // any free
            const free = cells.map((v, i) => v === '' ? i : null).filter(v => v !== null);
            if (free.length) makeMove(free[Math.floor(Math.random() * free.length)], ai);
        }

        // wire buttons
        resetBtn.addEventListener('click', () => resetBoard());
        newGameBtn.addEventListener('click', () => newGame());

        // init
        createBoard();
        updateScore();

        // Keyboard support: number keys 1-9 map to cells
        document.addEventListener('keydown', (e) => {
            if (!running) return;
            const map = {
                '1': 6, '2': 7, '3': 8,
                '4': 3, '5': 4, '6': 5,
                '7': 0, '8': 1, '9': 2
            };
            if (e.key in map) {
                const idx = map[e.key];
                // only allow if it's player's turn (X) or AI is off
                if (cells[idx] === '') {
                    // if AI toggle is off or it's X's turn, allow
                    if (!aiToggle.checked || currentPlayer === 'X') {
                        makeMove(idx, currentPlayer);
                    }
                }
            }
        });

    </script>
</body>

</html>