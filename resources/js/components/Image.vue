<template>
  <div class="input-group image">
    <label>Изображение</label>
    <div class="input__wrapper" :class="values ? 'loaded' : ''">
      <input name="file" type="file" :id="'input__file-'+screenId + '-' + elementNumber + '-' + elementId" class="input input__file" @change="setImg($event.target)">
      <label :for="'input__file-'+screenId + '-' + elementNumber + '-' + elementId" class="input__file-button">
        <span class="input__file-icon-wrapper">
          <svg width="20" height="20" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M2.94753 0.40624C1.81586 0.702947 0.914068 1.6102 0.624177 2.74371C0.543194 3.06041 0.541016 3.28283 0.541016 11.2568C0.541016 19.2202 0.543279 19.4535 0.623878 19.7686C0.915007 20.907 1.82602 21.8181 2.96432 22.1092C3.27941 22.1898 3.51262 22.1921 11.4754 22.1921C19.4383 22.1921 19.6715 22.1898 19.9866 22.1092C21.1273 21.8175 22.0353 20.9094 22.327 19.7686C22.4076 19.4535 22.4099 19.2202 22.4099 11.2568C22.4099 3.29326 22.4076 3.06003 22.327 2.74491C22.0348 1.60229 21.1296 0.696625 19.9878 0.404574C19.6709 0.323542 19.4526 0.321449 11.4579 0.323755C3.57472 0.326019 3.24131 0.329266 2.94753 0.40624ZM19.3986 1.73305C20.2742 1.8591 20.8946 2.50433 21.0021 3.40047C21.0292 3.62687 21.0408 5.3846 21.0335 8.14556L21.0217 12.5311L19.6122 11.2469C18.837 10.5406 18.1066 9.90162 17.9891 9.82687C17.3681 9.43179 16.6486 9.37831 16.0161 9.68018C15.6802 9.84054 15.7909 9.72738 12.5752 13.1974C11.1834 14.6995 9.99229 15.9667 9.92835 16.0135C9.81332 16.0976 9.81059 16.0976 9.65781 16.0163C9.57294 15.9711 8.72185 15.3139 7.76654 14.5558C6.44552 13.5074 5.97333 13.1563 5.79471 13.0894C5.32658 12.914 4.74287 12.9393 4.28973 13.1545C4.16603 13.2133 3.58429 13.6333 2.99699 14.0879L1.92918 14.9144L1.91747 9.33721C1.90995 5.7775 1.92132 3.62999 1.94882 3.40047C2.00542 2.92812 2.17234 2.57157 2.48166 2.26222C2.75673 1.98708 3.14384 1.78948 3.51296 1.73561C3.88106 1.68192 19.0266 1.67948 19.3986 1.73305ZM7.40596 3.76288C6.77317 3.91619 6.10839 4.3967 5.7552 4.95598C5.25969 5.74064 5.1905 6.78599 5.57999 7.60221C5.84037 8.14778 6.31192 8.62855 6.84112 8.88805C7.30383 9.11492 7.60658 9.17511 8.18298 9.15486C8.77972 9.13393 9.16179 9.01492 9.60544 8.71172C11.56 7.37616 11.0428 4.36449 8.75854 3.78022C8.36955 3.68074 7.77636 3.67313 7.40596 3.76288ZM8.53019 5.18785C9.24439 5.45927 9.59784 6.27574 9.29056 6.94438C9.13936 7.27338 8.95155 7.47163 8.64693 7.62387C8.16774 7.86333 7.60423 7.78525 7.20205 7.42366C6.63316 6.91209 6.5828 6.1247 7.08266 5.55674C7.24843 5.36841 7.48117 5.21749 7.71673 5.14556C7.91953 5.08366 8.30928 5.10391 8.53019 5.18785ZM17.0921 10.9529C17.1908 10.9983 18.0619 11.7594 19.153 12.7535L21.0431 14.4754L21.0417 16.6571C21.041 17.8571 21.0218 18.982 20.9992 19.1569C20.8865 20.0249 20.2429 20.6686 19.3749 20.7813C18.9462 20.8369 4.00471 20.8369 3.57596 20.7813C2.708 20.6686 2.06436 20.0249 1.95173 19.1569C1.92905 18.982 1.90987 18.3647 1.90914 17.7851L1.90782 16.7313L3.32357 15.6342C4.88147 14.4269 4.95472 14.3754 5.11554 14.3752C5.25354 14.375 5.23372 14.3603 7.0974 15.8411C7.94311 16.513 8.75038 17.1314 8.89133 17.2153C9.62048 17.6492 10.3251 17.5787 10.949 17.0096C11.0823 16.888 12.1431 15.7601 13.3063 14.5032C16.2419 11.3312 16.5619 10.9952 16.7077 10.9316C16.8741 10.8589 16.8902 10.8598 17.0921 10.9529Z"
              fill="#030087" />
          </svg>
        </span>
        <span class="input__file-button-text">Добавить изображение</span>
      </label>
      <div class="img__wrapper" :class="values ? 'active' : ''">
        <div class="elements__del">
          <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"
            @click="delImg($event.target)">
            <line x1="1.06066" y1="1" x2="13" y2="12.9393" stroke="#222222" stroke-width="1.5" stroke-linecap="round">
            </line>
            <path d="M1 13.293L13.2929 1.00008" stroke="#222222" stroke-width="1.5" stroke-linecap="round"></path>
          </svg>
        </div>
        <img :src="values ? values[0] : null" >
      </div>
    </div>
  </div>
  <div class="input-group">
    <label>Подпись</label>
    <div class="input-group__wrap">
      <input type="text" placeholder="Подпись к изображению" :value="values ? values[1] : null" />
    </div>
  </div>
</template>

<script>
export default {
  name: "Image",
  props: ["values", 'elementId', 'screenId', 'elementNumber'],
  methods: {
    setImg(el) {
      var elem = el.parentNode;
      elem.classList.remove('loaded');
      if (el.files && el.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          let img = elem.querySelector('img')
          img.src = e.target.result
          img.parentNode.classList.add('active')
          elem.classList.add('loaded')
        };
        reader.readAsDataURL(el.files[0]);
      }
    },
    delImg(el) {
      var parent = el.closest('.input__wrapper')
      var image = el.closest('.img__wrapper')
      var elem = parent.querySelector('input');
      elem.value = null
      image.querySelector('img').src = null
      image.classList.remove('active')
      parent.classList.remove('loaded')
    },
  }
}
</script>

<style>
.input-group.image label {
  display: flex;
  align-items: center;
}
.input__wrapper {
  width: 100%;
  position: relative;
  text-align: center;
  border: 1px solid rgba(3, 0, 135, 0.3);
  border-radius: 5px;
  height: 45px;
  display: flex;
  align-items: center;
  padding: 0 10px;
}

.img__wrapper {
  position: relative;
  display: none;
}

.img__wrapper.active {
  display: flex;
  align-items: center;
  justify-content: center;
  width: fit-content;
  margin: 20px auto 0;
  padding: 35px;
}

.input__wrapper.loaded {
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  padding: 20px 0;
}

.input__file {
  opacity: 0;
  visibility: hidden;
  position: absolute;
}

.input-group .input__file {
  width: 0;
}

.input__file-icon-wrapper {
  margin-right: 15px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}

.input__file-button-text {
  line-height: 1;
  margin-top: 1px;
}

.input__file-button {
  color: #030087;
  font-size: 16px;
  font-weight: 600;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: center;
  cursor: pointer;
  margin: 0 auto;
}

.elements__del {
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 2;
  cursor: pointer;
}

.input-group.image .close {
  margin-left: 10px;
  height: 15px;
}
</style>