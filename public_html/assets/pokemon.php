<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pokemon Encyclopedia</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");

    :root {
      --card-height: 300px;
      --card-width: calc(var(--card-height) / 1.5);
    }

    .heading-font {
      font-family: "Luckiest Guy", cursive;
    }

    .body-font {
      font-family: "Quicksand", sans-serif;
    }

    .custom-logo {
      width: 80px;
    }

    .custom-main {
      margin-top: 120px;
    }

    header,
    footer {
      height: 100px;
    }

    .custom-card-link {
      text-decoration: none;
      color: white;
      text-align: center;
    }

    .custom-card {
      width: var(--card-width);
      height: var(--card-height);
      position: relative;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      padding: 0 36px;
      perspective: 2500px;
    }

    .custom-cover-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .custom-wrapper {
      transition: all 0.5s;
      position: absolute;
      width: 100%;
      z-index: -1;
    }

    .custom-card:hover .custom-wrapper {
      transform: perspective(900px) translateY(-5%) rotateX(25deg);
      box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
    }

    .custom-title {
      transition: transform 0.5s;
    }

    .custom-card:hover .custom-title {
      transform: translate3d(0%, -50px, 100px);
    }

    .custom-character {
      width: 100%;
      opacity: 0;
      transition: all 0.5s;
      position: absolute;
      z-index: -1;
    }

    .custom-card:hover .custom-character {
      opacity: 1;
      transform: translate3d(0%, -30%, 100px);
    }

    body {
      background: #0a0a14 !important;
      background-image:
        radial-gradient(ellipse at 20% 50%, rgba(255, 203, 5, 0.06) 0%, transparent 60%),
        radial-gradient(ellipse at 80% 20%, rgba(238, 28, 37, 0.06) 0%, transparent 50%),
        radial-gradient(ellipse at 60% 80%, rgba(38, 150, 255, 0.05) 0%, transparent 50%) !important;
      min-height: 100vh;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        radial-gradient(1px 1px at 10% 15%, rgba(255, 203, 5, 0.4) 0%, transparent 100%),
        radial-gradient(1px 1px at 30% 70%, rgba(255, 255, 255, 0.2) 0%, transparent 100%),
        radial-gradient(1px 1px at 60% 30%, rgba(238, 28, 37, 0.4) 0%, transparent 100%),
        radial-gradient(1px 1px at 80% 85%, rgba(255, 255, 255, 0.15) 0%, transparent 100%),
        radial-gradient(2px 2px at 50% 50%, rgba(255, 203, 5, 0.2) 0%, transparent 100%),
        radial-gradient(1px 1px at 90% 10%, rgba(255, 255, 255, 0.3) 0%, transparent 100%);
      pointer-events: none;
      z-index: 0;
      animation: twinkle 4s ease-in-out infinite alternate;
    }

    @keyframes twinkle {
      from {
        opacity: 0.6;
      }

      to {
        opacity: 1;
      }
    }

    header {
      background: rgba(10, 10, 20, 0.92) !important;
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(255, 203, 5, 0.18) !important;
      box-shadow: 0 4px 40px rgba(255, 203, 5, 0.08) !important;
    }

    header h2 {
      font-size: 2rem;
      letter-spacing: 4px;
      background: linear-gradient(135deg, #ffcb05, #ff6b35, #ee1c25);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 0 12px rgba(255, 203, 5, 0.5));
    }

    .custom-logo {
      filter: drop-shadow(0 0 10px rgba(255, 203, 5, 0.6));
      transition: transform 0.6s ease;
    }

    .custom-logo:hover {
      transform: rotate(360deg);
    }

    #searchInput {
      background: rgba(255, 255, 255, 0.06) !important;
      border: 1px solid rgba(255, 203, 5, 0.3) !important;
      color: #fff !important;
      border-radius: 30px !important;
      padding: 12px 22px !important;
      font-family: "Quicksand", sans-serif;
      font-weight: 600;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    #searchInput:focus {
      border-color: #ffcb05 !important;
      box-shadow: 0 0 18px rgba(255, 203, 5, 0.25) !important;
      outline: none !important;
      background: rgba(255, 255, 255, 0.09) !important;
    }

    #searchInput::placeholder {
      color: rgba(255, 255, 255, 0.35) !important;
    }

    .btn-success {
      background: linear-gradient(135deg, #ffcb05, #ff8c00) !important;
      border: none !important;
      border-radius: 30px !important;
      color: #111 !important;
      font-family: "Luckiest Guy", cursive !important;
      letter-spacing: 2px !important;
      padding: 10px 24px !important;
      font-size: 0.9rem !important;
      box-shadow: 0 4px 20px rgba(255, 203, 5, 0.35) !important;
      transition: transform 0.2s, box-shadow 0.2s !important;
    }

    .btn-success:hover {
      transform: translateY(-2px) !important;
      box-shadow: 0 8px 30px rgba(255, 203, 5, 0.55) !important;
    }

    .custom-wrapper {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid rgba(255, 203, 5, 0.15);
    }

    .custom-card:hover .custom-wrapper {
      box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.85), 0 0 30px rgba(255, 203, 5, 0.15) !important;
    }

    .custom-title {
      font-family: "Luckiest Guy", cursive;
      letter-spacing: 2px;
      font-size: 1.1rem;
      color: #fff;
      text-shadow: 0 0 14px rgba(255, 203, 5, 0.6), 0 2px 4px rgba(0, 0, 0, 0.8);
    }

    #loader {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 18px;
      padding: 60px 0;
      width: 100%;
    }

    .pokeball-spin {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(180deg, #ee1c25 50%, #fff 50%);
      border: 4px solid #111;
      position: relative;
      animation: spin 0.9s linear infinite;
      box-shadow: 0 0 30px rgba(238, 28, 37, 0.5);
    }

    .pokeball-spin::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 16px;
      height: 16px;
      background: #fff;
      border-radius: 50%;
      border: 4px solid #111;
      z-index: 2;
    }

    .pokeball-spin::after {
      content: '';
      position: absolute;
      top: calc(50% - 2px);
      left: 0;
      right: 0;
      height: 4px;
      background: #111;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    #loader p {
      font-family: "Luckiest Guy", cursive;
      letter-spacing: 3px;
      font-size: 1rem;
      color: #ffcb05;
      text-shadow: 0 0 10px rgba(255, 203, 5, 0.5);
      animation: pulse 1s ease-in-out infinite alternate;
    }

    @keyframes pulse {
      from {
        opacity: 0.5;
      }

      to {
        opacity: 1;
      }
    }

    footer {
      background: rgba(10, 10, 20, 0.92) !important;
      backdrop-filter: blur(14px);
      border-top: 1px solid rgba(255, 203, 5, 0.12) !important;
      color: rgba(255, 255, 255, 0.4) !important;
      font-size: 0.8rem;
      letter-spacing: 2px;
    }

    .modal-content {
      background: rgba(12, 12, 22, 0.97) !important;
      border: 1px solid rgba(255, 203, 5, 0.2) !important;
      border-radius: 20px !important;
      box-shadow: 0 0 60px rgba(255, 203, 5, 0.12), 0 20px 80px rgba(0, 0, 0, 0.8) !important;
      backdrop-filter: blur(20px);
    }

    .modal-header {
      border-bottom: 1px solid rgba(255, 203, 5, 0.12) !important;
      padding: 20px 24px !important;
    }

    #modalTitle {
      font-family: "Luckiest Guy", cursive !important;
      font-size: 1.8rem !important;
      letter-spacing: 3px;
      background: linear-gradient(135deg, #ffcb05, #ff6b35);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    #modalImage {
      filter: drop-shadow(0 0 30px rgba(255, 203, 5, 0.4));
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-12px);
      }
    }

    .modal-body p {
      color: rgba(255, 255, 255, 0.7);
      font-weight: 600;
      letter-spacing: 1px;
    }

    .modal-body span {
      color: #ffcb05;
    }

    #modalTypes .badge {
      font-family: "Luckiest Guy", cursive !important;
      letter-spacing: 2px !important;
      font-size: 0.75rem !important;
      padding: 8px 16px !important;
      border-radius: 20px !important;
      background: linear-gradient(135deg, #22c55e, #16a34a) !important;
      box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4) !important;
    }

    #suggestionBox {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: rgba(12, 12, 24, 0.97);
      border: 1px solid rgba(255, 203, 5, 0.25);
      border-top: none;
      border-radius: 0 0 14px 14px;
      list-style: none;
      margin: 0;
      padding: 6px 0;
      max-height: 220px;
      overflow-y: auto;
      z-index: 9999;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.7);
      display: none;
      backdrop-filter: blur(14px);
    }

    #suggestionBox.open {
      display: block;
    }

    #suggestionBox li {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 16px;
      cursor: pointer;
      font-family: "Quicksand", sans-serif;
      font-weight: 600;
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.8);
      text-transform: capitalize;
      transition: background 0.15s, color 0.15s;
      letter-spacing: 1px;
    }

    #suggestionBox li:hover,
    #suggestionBox li.active {
      background: rgba(255, 203, 5, 0.12);
      color: #ffcb05;
    }

    #suggestionBox li img {
      width: 36px;
      height: 36px;
      object-fit: contain;
      filter: drop-shadow(0 0 4px rgba(255, 203, 5, 0.3));
    }

    #suggestionBox li .sug-id {
      margin-left: auto;
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.3);
      letter-spacing: 2px;
    }

    #suggestionBox::-webkit-scrollbar {
      width: 4px;
    }

    #suggestionBox::-webkit-scrollbar-track {
      background: transparent;
    }

    #suggestionBox::-webkit-scrollbar-thumb {
      background: rgba(255, 203, 5, 0.3);
      border-radius: 4px;
    }

    .stat-row {
      display: flex;
      justify-content: center;
      gap: 24px;
      flex-wrap: wrap;
      margin: 16px 0;
    }

    .stat-box {
      background: rgba(255, 203, 5, 0.06);
      border: 1px solid rgba(255, 203, 5, 0.15);
      border-radius: 12px;
      padding: 12px 20px;
      min-width: 110px;
      text-align: center;
    }

    .stat-box .stat-label {
      font-size: 0.65rem;
      letter-spacing: 2px;
      color: rgba(255, 255, 255, 0.4);
      text-transform: uppercase;
      margin-bottom: 4px;
    }

    .stat-box .stat-value {
      font-family: "Luckiest Guy", cursive;
      font-size: 1.1rem;
      color: #ffcb05;
      letter-spacing: 1px;
    }

    #pokemon-list .col-12 {
      animation: fadeUp 0.5s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body class="body-font bg-dark text-white">
  <header class="fixed-top bg-dark">
    <div class="container d-flex align-items-center justify-content-center">
      <img src="Poké_Ball_icon.png" class="custom-logo" />
      <h2 class="heading-font ms-2">PokeDex</h2>
    </div>
  </header>

  <main class="custom-main">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-6">
          <div class="d-flex" style="position:relative;">
            <div style="position:relative; flex:1;" class="me-2">
              <input id="searchInput" class="form-control" placeholder="Search Pokémon by name or ID"
                oninput="showSuggestions(this.value)" onkeydown="handleKey(event)" autocomplete="off" />
              <ul id="suggestionBox"></ul>
            </div>
            <button class="btn btn-success" onclick="searchPokemon()">Search</button>
          </div>
        </div>
      </div>

      <div class="row" id="pokemon-list">
        <div id="loader">
          <div class="pokeball-spin"></div>
          <p>Loading Pokédex...</p>
        </div>
      </div>
    </div>
  </main>

  <footer class="fixed-bottom bg-dark text-center py-3">
    © 2023 Pokémon Encyclopedia
  </footer>

  <div class="modal fade" id="pokemonModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 id="modalTitle" class="text-capitalize"></h5>
          <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modalImage" class="img-fluid mb-3" style="max-height: 250px" />
          <div class="stat-row">
            <div class="stat-box">
              <div class="stat-label">Pokédex ID</div>
              <div class="stat-value">#<span id="modalId"></span></div>
            </div>
            <div class="stat-box">
              <div class="stat-label">Height</div>
              <div class="stat-value"><span id="modalHeight"></span></div>
            </div>
            <div class="stat-box">
              <div class="stat-label">Weight</div>
              <div class="stat-value"><span id="modalWeight"></span></div>
            </div>
          </div>
          <div id="modalTypes" class="mb-3"></div>
          <p>Abilities: <span id="modalAbilities"></span></p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    let activeIndex = -1;
    let allPokemon = [];
    const pokemonList = document.getElementById("pokemon-list");

    function showSuggestions(val) {
      const box = document.getElementById('suggestionBox');
      activeIndex = -1;
      if (!val || val.length < 1) { box.className = ''; return; }

      const matches = allPokemon
        .filter(p => p.name.startsWith(val.toLowerCase()) || p.id.toString().startsWith(val))
        .slice(0, 8);

      if (!matches.length) { box.className = ''; return; }

      box.innerHTML = matches.map(p => {
        const id = p.id.toString().padStart(3, '0');
        return `<li onclick="selectSuggestion('${p.name}')">
          <img src="https://raw.githubusercontent.com/Purukitto/pokemon-data.json/master/images/pokedex/thumbnails/${id}.png" />
          ${p.name}
          <span class="sug-id">#${id}</span>
        </li>`;
      }).join('');
      box.className = 'open';
    }

    function selectSuggestion(name) {
      document.getElementById('searchInput').value = name;
      document.getElementById('suggestionBox').className = '';
      searchPokemon();
    }

    function handleKey(e) {
      const box = document.getElementById('suggestionBox');
      const items = box.querySelectorAll('li');
      if (!items.length) return;
      if (e.key === 'ArrowDown') {
        activeIndex = Math.min(activeIndex + 1, items.length - 1);
      } else if (e.key === 'ArrowUp') {
        activeIndex = Math.max(activeIndex - 1, 0);
      } else if (e.key === 'Enter' && activeIndex >= 0) {
        items[activeIndex].click(); return;
      } else if (e.key === 'Escape') {
        box.className = ''; return;
      }
      items.forEach((el, i) => el.classList.toggle('active', i === activeIndex));
      if (activeIndex >= 0) items[activeIndex].scrollIntoView({ block: 'nearest' });
    }

    document.addEventListener('click', e => {
      if (!e.target.closest('#searchInput') && !e.target.closest('#suggestionBox')) {
        document.getElementById('suggestionBox').className = '';
      }
    });

    async function loadPokemon() {
      // Step 1: Fetch the list of all 151 Pokémon URLs (single request)
      const res = await fetch("https://pokeapi.co/api/v2/pokemon?limit=151");
      const data = await res.json();

      // ✅ FIX: Fetch all 151 in parallel using Promise.all instead of sequential for-of
      // This fires all requests simultaneously instead of waiting for each one to finish
      const promises = data.results.map(p => fetch(p.url).then(r => r.json()));

      // Step 2: Fetch first 4 in parallel and display them immediately
      const first4 = await Promise.all(promises.slice(0, 4));
      first4.forEach(d => allPokemon.push(d));
      displayPokemon(allPokemon); // ← Cards appear almost instantly now

      // Step 3: Load remaining 147 in parallel in the background (won't block the UI)
      const rest = await Promise.all(promises.slice(4));
      rest.forEach(d => allPokemon.push(d));

      // Sort by ID so the full list is in order when searched
      allPokemon.sort((a, b) => a.id - b.id);
    }

    function displayPokemon(list) {
      pokemonList.innerHTML = "";
      list.forEach((p, i) => {
        const id = p.id.toString().padStart(3, "0");
        const col = document.createElement('div');
        col.className = "col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center";
        col.style.animationDelay = `${i * 0.08}s`;
        col.innerHTML = `
          <a href="#" class="custom-card-link" onclick="openModal(${p.id})">
            <div class="custom-card">
              <div class="custom-wrapper">
                <img src="https://raw.githubusercontent.com/Purukitto/pokemon-data.json/master/images/pokedex/thumbnails/${id}.png" class="custom-cover-image">
              </div>
              <h4 class="custom-title text-capitalize">${p.name}</h4>
              <img src="https://raw.githubusercontent.com/Purukitto/pokemon-data.json/master/images/pokedex/hires/${id}.png" class="custom-character">
            </div>
          </a>`;
        pokemonList.appendChild(col);
      });
    }

    function searchPokemon() {
      const val = searchInput.value.toLowerCase();
      const filtered = allPokemon.filter(
        (p) => p.name.includes(val) || p.id.toString() === val
      );
      displayPokemon(filtered);
    }

    function openModal(id) {
      const p = allPokemon.find((x) => x.id === id);
      new bootstrap.Modal(pokemonModal).show();
      modalTitle.innerText = p.name;
      modalId.innerText = p.id;
      modalImage.src = p.sprites.other["official-artwork"].front_default;
      modalHeight.innerText = p.height / 10 + " m";
      modalWeight.innerText = p.weight / 10 + " kg";
      modalAbilities.innerText = p.abilities.map(a => a.ability.name).join(", ");
      modalTypes.innerHTML = "";
      p.types.forEach(t => {
        modalTypes.innerHTML += `<span class="badge bg-success me-2">${t.type.name}</span>`;
      });
    }

    loadPokemon();
  </script>
</body>

</html>