<template>
  <router-view />
</template>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let a = document.querySelectorAll("a");
    for (let i = 0; i < a.length; i++) {
      const element = a[i];
      element.addEventListener("click", function () {
        document.body.style.overflow = "auto";
      });
    }
  });
</script>
<style lang="scss">
@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Black.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Black.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Black.ttf") format("truetype");
  font-weight: 900;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-ExtraLight.woff2")
      format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-ExtraLight.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-ExtraLight.ttf") format("truetype");
  font-weight: 200;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Bold.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Bold.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Bold.ttf") format("truetype");
  font-weight: bold;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Heavy.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Heavy.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Heavy.ttf") format("truetype");
  font-weight: 800;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-SemiBold.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-SemiBold.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-SemiBold.ttf") format("truetype");
  font-weight: 600;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Thin.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Thin.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Thin.ttf") format("truetype");
  font-weight: 100;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Regular.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Regular.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Regular.ttf") format("truetype");
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: "Mont";
  src: url("./assets/fonts/Mont-ThinItalic/Mont-Light.woff2") format("woff2"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Light.woff") format("woff"),
    url("./assets/fonts/Mont-ThinItalic/Mont-Light.ttf") format("truetype");
  font-weight: 300;
  font-style: normal;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

/* Remove default margin */
body,
h1,
h2,
h3,
h4,
p,
figure,
blockquote,
dl,
dd {
  margin: 0;
}

/* Remove list styles on ul, ol elements with a list role, which suggests default styling will be removed */
ul[role="list"],
li[role="list"],
ol[role="list"] {
  list-style: none;
}
ul,
ol {
  margin: 0;
  padding: 0;
}
li {
  list-style: none;
}
/* Set core root defaults */
html:focus-within {
  scroll-behavior: smooth;
}

/* Set core body defaults */
body {
  min-height: 100vh;
  text-rendering: optimizeSpeed;
  /* line-height: 1.5; */
}

/* A elements that don't have a class get default styles */
a:not([class]) {
  text-decoration-skip-ink: auto;
}

a {
  text-decoration: none;
  outline: none;
}

/* Make images easier to work with */
img,
picture {
  max-width: 100%;
  display: block;
}

/* Inherit fonts for inputs and buttons */
input,
button,
textarea,
select {
  font: inherit;
  outline: none;
}

body {
  font-family: "Mont";
  font-weight: normal;
  background: #f3f6fd;
}
/* Remove all animations and transitions for people that prefer not to see them */
@media (prefers-reduced-motion: reduce) {
  html:focus-within {
    scroll-behavior: auto;
  }
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
//
html::-webkit-scrollbar {
  width: 5px;
}

html::-webkit-scrollbar-track {
  -webkit-box-shadow: 5px 5px 5px -5px rgba(34, 60, 80, 0.2) inset;
  background-color: rgba(3, 0, 135, 0.3);
}

html::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background: linear-gradient(180deg, rgba(3, 0, 135, 0.3), #030087);
}
//
// global styles
h2 {
  font-weight: 700;
  font-size: 36px;
  line-height: 46px;

  color: #222222;

  margin-bottom: 30px;
}

.input-group {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 30px;
  position: relative;
  &:last-of-type {
    margin-bottom: 30px;
  }
  &-wrap {
    display: flex;
  }
  & label {
    font-size: 16px;
    line-height: 20px;
    color: #000;
    font-weight: 700;
    padding: 0 10px;
  }
  & input,
  the-mask {
    margin-top: 5px;
    width: 100%;
    height: 55px;
    border: 1px solid rgba(3, 0, 135, 0.3);
    border-radius: 5px;
    padding: 0 30px;
    font-size: 16px;
    line-height: 20px;
    font-weight: 600;
    color: #000;
  }
  &__pass-icon {
    position: absolute;
    width: 50px;
    right: 0;
    bottom: 0;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    & svg {
      fill: #000;
      fill-opacity: 0.5;
      transition: ease-in-out 0.25s;
    }
  }
  &--password {
    & input {
      padding: 0 60px 0 30px;
    }
  }
  &.active {
    & .input-group__pass-icon svg {
      fill: #030087;
      fill-opacity: 1;
    }
  }
}
.blue-btn {
  width: 100%;
  height: 55px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #030087;
  border-radius: 5px;
  outline: none;
  border: none;
  font-size: 16px;
  line-height: 20px;
  color: #fff;
  font-weight: 700;
  cursor: pointer;
  transition: ease-in-out 0.25s;
  & svg {
    margin-right: 10px;
  }
  &:hover {
    background: #0400c5;
  }
}
.page-glob {
  display: flex;
  height: 100%;
  padding-left: 300px;
}
.wrap-glob {
  max-width: 1220px;
  width: calc(100% - 100px);
  padding: 50px;
  margin: 0 auto;
  box-sizing: content-box;
}
.input-file {
  margin-bottom: 30px;
  & input {
    display: none;
  }
  & label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }
  &__image {
    width: 55px;
    height: 55px;
    margin-right: 15px;
    &--newreport,
    &--settings {
      width: 80px;
      height: 55px;
    }
  }
  &__text {
    font-size: 16px;
    line-height: 20px;
    color: #000;
    font-weight: 600;
  }
}

.menureports .menureports-cont .router-link-active {
  opacity: 0.5;
}
.page-glob {
  transition: ease-in-out 0.25s;
}
.page-glob.hidden {
  padding-left: 150px;
}

.input-file {
  width: fit-content;
}

.close {
  cursor: pointer;
}

#report-error {
  position: fixed;
  bottom: 50px;
  left: 325px;
  padding: 20px;
  background: #c00000;
  border-radius: 10px;
  color: #fff;
  font-weight: 700;
  opacity: 0;
  z-index: -1;
  transition: ease-in-out 0.25s;
}

#save {
  position: fixed;
  bottom: 50px;
  left: 325px;
  padding: 20px;
  background: #1BC000;
  border-radius: 10px;
  color: #fff;
  font-weight: 700;
  opacity: 0;
  z-index: -1;
  transition: ease-in-out 0.25s;
}

#save.active, #report-error.active {
  opacity: 1;
  z-index: 1000;
}

@media (max-width: 1170px) {
  .page-glob {
    padding-left: 0;
  }

  #save {
    left: 25px;
  }

  .wrap-glob {
    padding-top: 100px;
    width: 100%;
  }
}

#graph .elements-wrap {
  align-items: flex-start;
}

.numbered-list__button:hover {
  background: #030087;
  color: #fff;
}

.numbered-list__button:hover circle, .numbered-list__button:hover line {
  stroke: #fff;
  stroke-width: 4;
}
</style>