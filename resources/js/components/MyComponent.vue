<template>
    <div>
      <h2>Componente de Vue</h2>
      <p>{{ message }}</p>
    </div>
</template>
  
  <script>
  export default {
    name: 'MyComponent',
    data() {
      return {
        message: '¡Este es un mensaje desde Vue!',
      };
    },
  };
  </script>