<template>
  <nav class="navbar navbar-expand-lg navbar-light profundity bg-secondary p-3">
    <a class="navbar-brand d-flex flex-column justify-content-center ms-2 bg-brat p-2 px-3" href="/">
      <img :src="logoUrl" alt="Logo" style="width: 50px;">
      <span class="text-center">Style</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/categories">Categorias</a>
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
      <form class="d-flex" @submit.prevent="searchProducts" >
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" v-model="searchQuery">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
</template>

<script>
export default {
  props: {
    logoUrl: {
      type: String,
      required: true
    }
  },
  name: 'MainNavBar',
  data() {
    return {
      message: '¡Este es un mensaje desde Vue!',
    };
  },
  methods: {
    searchProducts() {
      window.location.href = `/products/search?query=${this.searchQuery}`;
    }
  }
};
</script>

<style scoped>
.navbar {
  font-family: var(--comic-font);
  font-weight: 700;
  font-size: 1.2rem;
}

.nav-link {
  color: #000 !important;
}

.nav-link:hover {
  color: #ff00ff !important;
}
</style>