<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Rajdhani:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --x-color: #00f0ff;
            --o-color: #ff4d6d;
            --bg: #0a0a12;
            --card: #12121e;
            --border: #1e1e32;
            --glow-x: 0 0 18px #00f0ff88;
            --glow-o: 0 0 18px #ff4d6d88;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 28px;
            overflow: hidden;
        }

        /* animated background grid */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 240, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 240, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        h1 {
            font-family: 'Orbitron', monospace;
            font-size: 2rem;
            letter-spacing: 6px;
            color: #fff;
            text-transform: uppercase;
            text-shadow: 0 0 20px #00f0ff66;
        }

        /* Turn indicator */
        #status {
            font-family: 'Orbitron', monospace;
            font-size: 0.85rem;
            letter-spacing: 3px;
            color: #aaa;
            height: 24px;
            transition: color 0.3s;
        }

        #status.x {
            color: var(--x-color);
            text-shadow: var(--glow-x);
        }

        #status.o {
            color: var(--o-color);
            text-shadow: var(--glow-o);
        }

        .container {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 0 60px #00f0ff0a, 0 20px 60px #00000088;
        }

        /* ---- YOUR ORIGINAL GRID CODE (unchanged) ---- */
        .row {
            display: flex;
        }

        .col {
            height: 65px;
            width: 65px;
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            cursor: pointer;
        }

        /* ---- END ORIGINAL ---- */

        /* Design layered on top without touching original */
        .col {
            border-color: #1e1e38 !important;
            border-radius: 8px;
            margin: 3px;
            background: #0d0d1a;
            font-family: 'Orbitron', monospace;
            font-weight: 900;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
            user-select: none;
        }

        .col:hover:not(.taken) {
            background: #16162a;
            transform: scale(1.06);
        }

        .col.x-mark {
            color: var(--x-color);
            text-shadow: var(--glow-x);
        }

        .col.o-mark {
            color: var(--o-color);
            text-shadow: var(--glow-o);
        }

        .col.taken {
            cursor: not-allowed;
        }

        .col.winner-cell {
            background: #1a1a2e;
            animation: pulse 0.6s ease infinite alternate;
        }

        @keyframes pulse {
            from {
                box-shadow: none;
            }

            to {
                box-shadow: 0 0 22px #00f0ffaa;
            }
        }

        /* Buttons */
        .btn-row {
            display: flex;
            gap: 14px;
            justify-content: center;
        }

        .btn {
            font-family: 'Orbitron', monospace;
            font-size: 0.7rem;
            letter-spacing: 3px;
            padding: 12px 28px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            transition: transform 0.15s, box-shadow 0.2s, opacity 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: scale(0.97);
        }

        #startBtn {
            background: var(--x-color);
            color: #000;
            box-shadow: 0 0 20px #00f0ff55;
        }

        #startBtn:hover {
            box-shadow: 0 0 30px #00f0ffaa;
        }

        #startBtn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            transform: none;
        }

        #resetBtn {
            background: transparent;
            color: var(--o-color);
            border: 1px solid var(--o-color);
            box-shadow: 0 0 12px #ff4d6d33;
        }

        #resetBtn:hover {
            box-shadow: 0 0 24px #ff4d6d77;
            background: #ff4d6d11;
        }
    </style>
</head>

<body>

    <h1>Tic Tac Toe</h1>
    <div id="status">PRESS START TO PLAY</div>

    <div class="container">
        <div class="grid">
            <div class="row">
                <div onclick="handleClick(this)" id="0" class="col"></div>
                <div onclick="handleClick(this)" id="1" class="col"></div>
                <div onclick="handleClick(this)" id="2" class="col"></div>
            </div>
            <div class="row">
                <div onclick="handleClick(this)" id="3" class="col"></div>
                <div onclick="handleClick(this)" id="4" class="col"></div>
                <div onclick="handleClick(this)" id="5" class="col"></div>
            </div>
            <div class="row">
                <div onclick="handleClick(this)" id="6" class="col"></div>
                <div onclick="handleClick(this)" id="7" class="col"></div>
                <div onclick="handleClick(this)" id="8" class="col"></div>
            </div>
        </div>
    </div>

    <div class="btn-row">
        <button class="btn" id="startBtn" onclick="startGame()">▶ Start</button>
        <button class="btn" id="resetBtn" onclick="resetGame()">↺ Reset</button>
    </div>

    <script>
        let currentPlayer = 'X';
        let arr = Array(9).fill(null);
        let gameActive = false;

        console.log(arr);

        // Update status bar
        function updateStatus(msg, cls) {
            const s = document.getElementById('status');
            s.textContent = msg;
            s.className = cls || '';
        }

        function startGame() {
            gameActive = true;
            document.getElementById('startBtn').disabled = true;
            updateStatus("PLAYER X'S TURN", 'x');
        }

        function resetGame() {
            currentPlayer = 'X';
            arr = Array(9).fill(null);
            gameActive = false;
            document.getElementById('startBtn').disabled = false;
            updateStatus('PRESS START TO PLAY');
            document.querySelectorAll('.col').forEach(el => {
                el.innerText = '';
                el.className = 'col';
            });
        }

        function checkWinner() {
            const wins = [
                [0, 1, 2], [3, 4, 5], [6, 7, 8],
                [0, 3, 6], [1, 4, 7], [2, 5, 8],
                [0, 4, 8], [2, 4, 6]
            ];

            for (let combo of wins) {
                const [a, b, c] = combo;
                if (arr[a] !== null && arr[a] === arr[b] && arr[b] === arr[c]) {
                    // highlight winning cells
                    combo.forEach(i => document.getElementById(String(i)).classList.add('winner-cell'));
                    updateStatus(`🏆 PLAYER ${currentPlayer} WINS!`, currentPlayer === 'X' ? 'x' : 'o');
                    gameActive = false;
                    document.getElementById('startBtn').disabled = false;
                    return true;
                }
            }

            if (!arr.some(e => e === null)) {
                updateStatus("IT'S A DRAW!");
                gameActive = false;
                document.getElementById('startBtn').disabled = false;
                return true;
            }

            return false;
        }

        function handleClick(el) {
            if (!gameActive) return;
            const id = Number(el.id);
            if (arr[id] !== null) return;
            arr[id] = currentPlayer;
            el.innerText = currentPlayer;
            el.classList.add(currentPlayer === 'X' ? 'x-mark' : 'o-mark', 'taken');

            if (!checkWinner()) {
                currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
                updateStatus(`PLAYER ${currentPlayer}'S TURN`, currentPlayer === 'X' ? 'x' : 'o');
            }
        }
    </script>
</body>

</html>