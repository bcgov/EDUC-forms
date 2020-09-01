<template>
  <div>
    <header>
      <div class="container">
        <div class="banner">
          <a class="navbar-brand" href="https://www2.gov.bc.ca">
            <img
              class="img-fluid d-none d-md-block"
              src="../assets/images/bcid-logo-rev-en.svg"
              width="181"
              height="44"
              alt="B.C. Government Logo"
            />
            <img
              class="img-fluid d-md-none"
              src="../assets/images/bcid-logo-rev-en.svg"
              width="200"
              height="44"
              alt="B.C. Government Logo"
            />
          </a>
        </div>   
      </div>
    </header>
  </div>
</template>

<script>
export default {
  
};
</script>
<style scoped>
.navbar,
.nav {
  z-index: 100;
}
#navbar {
  z-index: 100;
}
header {
  z-index: 100;
  background-color: #036;
  border-bottom: 2px solid #fcba19;
  padding: 0 30px 0 30px;
  color: #fff;
  display: flex;
  height: 65px;
  top: 0;
  position: fixed;
  width: 100%;
  -webkit-box-shadow: 0 6px 8px -4px #b3b1b3;
  -moz-box-shadow: 0 6px 8px -4px #b3b1b3;
  box-shadow: 0 6px 8px -4px #b3b1b3;
}

header h1 {
  font-family: ‘BCSans’, ‘Noto Sans’, Verdana, Arial, sans-serif;
  font-weight: normal; /* 400 */
  margin: 5px 5px 0 18px;
  visibility: hidden;
}

header .banner {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: 0 10px 0 0;
  /* border-style: dotted;
    border-width: 1px;
    border-color: lightgrey; */
}

header .other {
  display: flex;
  align-items: center;
  flex-grow: 1;
  /* border-style: dotted;
    border-width: 1px;
    border-color: lightgrey; */
}

header a [class^="fas fa-"] {
  color: white;
  font-size: 1.4em;
  font-style: bold;
  line-height: 1;
  /* border-style: solid;
    border-width: 1px;
    border-color: #fcba19; */
  padding: 5px;
  -webkit-font-smoothing: antialiased;
}

header .nav-btn {
  display: block;
  width: auto;
  margin: 0 0 0 auto;
  cursor: pointer;
}

.navigation-main {
  display: none;
  position: fixed;
  top: 65px;
  color: #fcba19;
  background-color: #38598a;
  width: 100%;
  -webkit-box-shadow: 0 6px 8px -4px #b3b1b3;
  -moz-box-shadow: 0 6px 8px -4px #b3b1b3;
  box-shadow: 0 6px 8px -4px #b3b1b3;
}

.navigation-main .container {
  padding: 10px 0 10px 0;
}

.navigation-main .container ul {
  display: flex;
  flex-direction: column;
  margin: 0;
  color: #fff;
  list-style: none;
  margin-left: -25px;
  /* border-style: dotted;
    border-width: 1px;
    border-color: red; */
}

.navigation-main .container ul li {
  margin: 5px 0;
}

.navigation-main .container ul li a {
  display: flex;
  font-size: 0.813em;
  font-weight: normal; /* 400 */
  color: #fff;
  padding: 0 15px 0 15px;
  text-decoration: none;
  /* border-style: dotted;
    border-width: 1px;
    border-color: green; */
}

.navigation-main .container ul li a:hover {
  text-decoration: underline;
}

.navigation-main .container ul .active {
  text-decoration: underline;
  font-weight: bold;
}

:focus {
  outline: 4px solid #3b99fc;
  outline-offset: 1px;
}

/*
    These are sample media queries only. Media queries are quite subjective
    but, in general, should be made for the three different classes of screen
    size: phone, tablet, full. 
  */

@media screen and (min-width: 768px) {
  .navigation-main {
    display: block;
    margin-bottom: 100px;
  }
  .burgernav {
    display: none;
  }

  .navigation-main .container ul {
    flex-direction: row;
  }

  .navigation-main .container ul li {
    margin: 0;
  }

  .navigation-main .container ul li a {
    border-right: 1px solid #9b9b9b;
  }

  header .nav-btn {
    display: none;
    width: auto;
    margin: 0 0 0 auto;
    cursor: pointer;
  }
}

@media screen and (min-width: 768px) and (max-width: 899px) {
  header h1 {
    font-size: calc(7px + 2.2vw);
    visibility: visible;
  }
}

@media screen and (min-width: 900px) {
  header h1 {
    font-size: 2em;
    visibility: visible;
  }
}
</style>
