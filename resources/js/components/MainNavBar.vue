<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand d-flex flex-column justify-content-center ms-2 bg-brat p-2 px-3" href="/">
      <img src="/public/images/logo.webp" alt="Logo" style="width: 50px;">
      <span>Style</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Portafolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Precios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'MainNavBar',
  data() {
    return {
      message: '¡Este es un mensaje desde Vue!',
    };
  },
};
</script>

<style scoped>
.navbar {
  font-family: 'Comic Sans MS', cursive, sans-serif;
  background-color: #ffcc00;
}

.nav-link {
  color: #000 !important;
}

.nav-link:hover {
  color: #ff00ff !important;
}
</style>