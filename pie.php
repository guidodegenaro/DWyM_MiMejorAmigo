</main>
  
  <script>
    const btnMenu = document.getElementById('btn-menu');
    const navEnlaces = document.getElementById('nav-enlaces');

    btnMenu.addEventListener('click', () => {
        navEnlaces.classList.toggle('activo');
    });
  </script>
</body>
</html>