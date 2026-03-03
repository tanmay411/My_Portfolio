<?php
// registration.php - Form success page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Sent — Tanmay Srivastava</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Quicksand:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --cyan: #0dcaf0;
            --cyan-dim: rgba(13, 202, 240, 0.15);
            --cyan-glow: rgba(13, 202, 240, 0.35);
            --bg: #07080f;
            --card-bg: rgba(13, 18, 30, 0.95);
            --text: rgba(255, 255, 255, 0.85);
            --text-dim: rgba(255, 255, 255, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-color: var(--bg);
            background-image:
                radial-gradient(ellipse at 20% 30%, rgba(13, 202, 240, 0.07) 0%, transparent 55%),
                radial-gradient(ellipse at 80% 70%, rgba(102, 126, 234, 0.06) 0%, transparent 50%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Quicksand', sans-serif;
            overflow: hidden;
        }

        /* Subtle starfield */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(1px 1px at 15% 20%, rgba(13, 202, 240, 0.5) 0%, transparent 100%),
                radial-gradient(1px 1px at 40% 60%, rgba(255, 255, 255, 0.2) 0%, transparent 100%),
                radial-gradient(1px 1px at 65% 15%, rgba(255, 255, 255, 0.25) 0%, transparent 100%),
                radial-gradient(1px 1px at 80% 80%, rgba(13, 202, 240, 0.3) 0%, transparent 100%),
                radial-gradient(1px 1px at 90% 35%, rgba(255, 255, 255, 0.15) 0%, transparent 100%),
                radial-gradient(2px 2px at 55% 90%, rgba(13, 202, 240, 0.2) 0%, transparent 100%),
                radial-gradient(1px 1px at 25% 85%, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
            pointer-events: none;
            z-index: 0;
            animation: twinkle 5s ease-in-out infinite alternate;
        }

        @keyframes twinkle {
            from {
                opacity: 0.5;
            }

            to {
                opacity: 1;
            }
        }

        /* Card */
        .success-card {
            position: relative;
            z-index: 1;
            background: var(--card-bg);
            border: 1px solid rgba(13, 202, 240, 0.18);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            max-width: 480px;
            width: 90%;
            text-align: center;
            box-shadow:
                0 0 60px rgba(13, 202, 240, 0.08),
                0 30px 80px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(20px);
            animation: cardIn 0.7s cubic-bezier(0.23, 1, 0.32, 1) both;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Top glow line */
        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--cyan), transparent);
            border-radius: 50%;
        }

        /* Check circle */
        .check-wrap {
            width: 88px;
            height: 88px;
            margin: 0 auto 1.8rem;
            position: relative;
            animation: popIn 0.6s 0.3s cubic-bezier(0.23, 1, 0.32, 1) both;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.4);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .check-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: var(--cyan-dim);
            border: 2px solid var(--cyan);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 30px var(--cyan-glow), inset 0 0 20px rgba(13, 202, 240, 0.05);
            animation: pulsate 2.5s 1s ease-in-out infinite;
        }

        @keyframes pulsate {

            0%,
            100% {
                box-shadow: 0 0 30px var(--cyan-glow), inset 0 0 20px rgba(13, 202, 240, 0.05);
            }

            50% {
                box-shadow: 0 0 50px rgba(13, 202, 240, 0.55), inset 0 0 30px rgba(13, 202, 240, 0.1);
            }
        }

        /* SVG checkmark draw animation */
        .check-svg {
            width: 38px;
            height: 38px;
        }

        .check-svg path {
            stroke: var(--cyan);
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
            stroke-dasharray: 60;
            stroke-dashoffset: 60;
            animation: drawCheck 0.5s 0.6s ease forwards;
        }

        @keyframes drawCheck {
            to {
                stroke-dashoffset: 0;
            }
        }

        /* Heading */
        .success-title {
            font-family: 'Luckiest Guy', cursive;
            font-size: 2rem;
            letter-spacing: 3px;
            background: linear-gradient(135deg, #0dcaf0, #5eead4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
            animation: fadeUp 0.5s 0.5s ease both;
        }

        /* Subtext */
        .success-msg {
            color: var(--text);
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.7;
            margin-bottom: 0.5rem;
            animation: fadeUp 0.5s 0.65s ease both;
        }

        .success-sub {
            color: var(--text-dim);
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-bottom: 2rem;
            animation: fadeUp 0.5s 0.75s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(13, 202, 240, 0.2), transparent);
            margin-bottom: 1.8rem;
            animation: fadeUp 0.5s 0.8s ease both;
        }

        /* Back button */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #0dcaf0, #0891b2);
            color: #07080f;
            font-family: 'Luckiest Guy', cursive;
            font-size: 0.95rem;
            letter-spacing: 2px;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(13, 202, 240, 0.35);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            animation: fadeUp 0.5s 0.9s ease both;
        }

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(13, 202, 240, 0.55);
            color: #07080f;
        }

        .btn-back:active {
            transform: scale(0.96);
        }

        .btn-back svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        /* Bottom label */
        .brand-label {
            margin-top: 1.8rem;
            font-size: 0.72rem;
            color: var(--text-dim);
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: fadeUp 0.5s 1s ease both;
        }

        .brand-label span {
            color: var(--cyan);
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <div class="success-card">

        <!-- Animated checkmark -->
        <div class="check-wrap">
            <div class="check-circle">
                <svg class="check-svg" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 20 L16 28 L30 12" />
                </svg>
            </div>
        </div>

        <h1 class="success-title">Message Sent!</h1>

        <p class="success-msg">Your form has been successfully submitted.</p>
        <p class="success-sub">I'll get back to you as soon as possible. Thank you for reaching out!</p>

        <div class="divider"></div>

        <a href="index.php" class="btn-back">
            <svg viewBox="0 0 24 24">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            Back to Portfolio
        </a>

        <p class="brand-label">Tanmay <span>Srivastava</span> &mdash; Portfolio</p>

    </div>

</body>

</html>