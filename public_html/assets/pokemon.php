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

    /* CARD ANIMATION (UNCHANGED) */
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
  </style>
</head>

<body class="body-font bg-dark text-white">
  <!-- HEADER -->
  <header class="fixed-top bg-dark">
    <div class="container d-flex align-items-center justify-content-center">
      <img src="Poké_Ball_icon.png" class="custom-logo" />
      <h2 class="heading-font ms-2">PokeDex</h2>
    </div>
  </header>

  <!-- MAIN -->
  <main class="custom-main">
    <div class="container">
      <!-- SEARCH -->
      <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-6">
          <div class="d-flex">
            <input id="searchInput" class="form-control me-2" placeholder="Search Pokémon by name or ID" />
            <button class="btn btn-success" onclick="searchPokemon()">
              Search
            </button>
          </div>
        </div>
      </div>

      <!-- POKEMON CARDS -->
      <div class="row" id="pokemon-list"></div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="fixed-bottom bg-dark text-center py-3">
    © 2023 Pokémon Encyclopedia
  </footer>

  <!-- MODAL -->
  <div class="modal fade" id="pokemonModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 id="modalTitle" class="text-capitalize"></h5>
          <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <img id="modalImage" class="img-fluid mb-3" style="max-height: 250px" />
          <p>ID: <span id="modalId"></span></p>
          <div id="modalTypes" class="mb-3"></div>
          <p>Height: <span id="modalHeight"></span></p>
          <p>Weight: <span id="modalWeight"></span></p>
          <p>Abilities: <span id="modalAbilities"></span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const pokemonList = document.getElementById("pokemon-list");
    let allPokemon = [];

    async function loadPokemon() {
      const res = await fetch("https://pokeapi.co/api/v2/pokemon?limit=151");
      const data = await res.json();

      for (let p of data.results) {
        const r = await fetch(p.url);
        const d = await r.json();
        allPokemon.push(d);
      }

      //  FIRST 4 LANING
      displayPokemon(allPokemon.slice(0, 4));
    }

    function displayPokemon(list) {
      pokemonList.innerHTML = "";
      list.forEach((p) => {
        const id = p.id.toString().padStart(3, "0");
        pokemonList.innerHTML += `
            <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
              <a href="#" class="custom-card-link" onclick="openModal(${p.id})">
                <div class="custom-card">
                  <div class="custom-wrapper">
                    <img src="https://raw.githubusercontent.com/Purukitto/pokemon-data.json/master/images/pokedex/thumbnails/${id}.png" class="custom-cover-image">
                  </div>
                  <h4 class="custom-title text-capitalize">${p.name}</h4>
                  <img src="https://raw.githubusercontent.com/Purukitto/pokemon-data.json/master/images/pokedex/hires/${id}.png" class="custom-character">
                </div>
              </a>
            </div>
          `;
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