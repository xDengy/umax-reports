<template>
  <section class="reports page-glob">
    <MenuReports ref="menuList" />
    <div class="reports wrap-glob">
      <div class="reports__title">
        <h2>Отчёт по SEO продвижению</h2>
        <div class="reports__icons">
          <a href="#" class="reports__icon" @click="generateReport()">
            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M9.41406 0.637928C6.50414 0.858279 3.34836 2.75816 0.677266 5.89769C0.0764843 6.60387 0 6.72883 0 7.00445C0 7.28008 0.0764843 7.40504 0.677266 8.11121C2.8784 10.6984 5.52129 12.5209 7.9575 13.1317C8.66027 13.3079 9.25895 13.381 10 13.381C10.7583 13.381 11.361 13.3053 12.0879 13.1188C14.5159 12.4957 17.1343 10.6834 19.3227 8.11121C19.9235 7.40504 20 7.28008 20 7.00445C20 6.72883 19.9235 6.60387 19.3227 5.89769C17.1216 3.31055 14.4787 1.48797 12.0425 0.877186C11.2018 0.666404 10.2192 0.576951 9.41406 0.637928ZM11.0742 2.06265C13.1173 2.42496 15.2046 3.64961 17.2293 5.67375C17.8962 6.34051 18.4375 6.93668 18.4375 7.00445C18.4375 7.12676 16.8439 8.76535 16.1914 9.31398C14.4586 10.771 12.7611 11.6427 11.0547 11.952C10.5968 12.035 9.49766 12.0448 9.04297 11.97C7.15621 11.6594 5.21348 10.6067 3.31164 8.86437C2.63559 8.24496 1.5625 7.10394 1.5625 7.00445C1.5625 6.88215 3.15609 5.24355 3.80859 4.69492C5.70992 3.09625 7.59316 2.19066 9.43359 1.99C9.73555 1.95707 10.7264 2.00094 11.0742 2.06265ZM9.49891 3.06344C8.40141 3.19094 7.32484 3.85797 6.69719 4.79941C5.64809 6.37301 5.85617 8.47328 7.19367 9.81078C8.74359 11.3607 11.2564 11.3607 12.8063 9.81078C14.3563 8.26086 14.3563 5.74805 12.8063 4.19812C12.1689 3.5607 11.3449 3.16312 10.4492 3.06086C10.0528 3.01558 9.90758 3.01597 9.49891 3.06344ZM10.5273 4.44566C11.2847 4.60371 11.9766 5.13984 12.3194 5.83426C12.7157 6.63726 12.7157 7.37164 12.3194 8.17465C12.0639 8.69215 11.6877 9.06836 11.1702 9.32383C10.3672 9.72019 9.63281 9.72019 8.8298 9.32383C7.96375 8.89629 7.38418 7.96644 7.38418 7.00445C7.38418 6.61781 7.47941 6.24191 7.68062 5.83426C8.19805 4.78605 9.38469 4.20726 10.5273 4.44566Z" />
            </svg>
          </a>
          <a href="#" class="reports__icon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <mask id="mask0_539_914" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20"
                height="20">
                <rect width="20" height="20" fill="url(#pattern0)" />
              </mask>
              <g mask="url(#mask0_539_914)">
                <rect width="20" height="20" />
              </g>
              <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_539_914" transform="scale(0.00195312)" />
                </pattern>
                <image id="image0_539_914" width="512" height="512"
                  xlink:href="data:image/png;base64,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yEyGnv92zlUFK3tVlj3535LkiiRXJrkq0+M+b0pyd2FN0N1xSU5O8pQkz0pyfpKXJjmpsKaH8sgkP57ksupCmMf+4te2+FTqx/JQr2uTvCnJo9b31oEZPSrJJUn2pv7z41CvT67vrW9c9ViWaz8AM9id6fex1WN58OuOJD8bq0QwquOS/FySb6f+8+Tg191JHr3G971J1WNZrv0AzOCi1I/jwa+98WsE2BbPS/K11H+uHPx66Vrf8eZUj+NK/ApgGV5cXcBB/jjTg4iuqS4EmMUfJnlupnuMLMX51QUwj6ET0EJclfpx3J/pm/+pa36vQI0nZfqlUfXnzP5MXzS2QfU4lms/ACvanenOWNXjeEcs+8O2e16mn+JVf97cm+X+UuFIVI/jSpwCqHdmlnEvg38ey/6w7f4wyb+pLiLT3HNmdRHdCQD1lvA/wd4k76guAtiIX07yl9VFZBmffa0JAPXOqC4gyaXZvsd0Aod2W5J/WV1ElvHZ15oAUO+s4v3fkuQ3imsANuu9SW4trsEKQDEBoN4Ti/d/RaYLAIE+bk/y0eIanlS8//YEgHrVV8JeWbx/oEb1//vbcjfAYQkA9aoDwFXF+wdqVN8Y6MTi/bcnANSr/p/gq8X7B2pcX7x/KwDFBIB61SsAtxTvH6hxc/H+q7/8tDfHDWiq78a3hJvorML4AVV8/qxm6PGzAgAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADQkAANCQAAAADc0RAO6aYRur2FW8fwD6eUTx/r+z6gbmCAC3zrCNVTy6eP8A9LO7eP+3rbqBOQLAykWs6LTi/QPQz/cX7/+WVTewDSsAzyrePwD9PLN4/4tYAagOAOcX7x+Afi4o3v8iVgD+YoZtrOJlSU4orgGAPk5I8pLiGv7vqhuYIwDsmWEbqzgxyauLawCgj5/MNPdUunbVDcwRAFYuYgY/n+S46iIA2Hq7kry1uogIAH/tqUn+SXURAGy9f5r6XwAky5h78+gk+5LsL359O8nz1vxe16F63IC+fP4cmRckuTP143ZvkpPW/F4P21WpH5D9SW5I8uQ1v9e5VY8Z0JfPn8P3fZkuvKses/1JPj/HG5rrWQBXzrSdVf3NJL+X5EnVhQCwNZ6c5GNJnlhdyAGzzLlzBYBPzrSdOfxgpnR0XnUhAAzv+Uk+k+QZ1YUcZClfupNM90S+O/XLIge/7kzyL7L8ewRUjxPQl8+fB7cryS9kGef8D37dnQWd/7/Pf0v9wBzqdUOSf5DlBoHq8QH68vnzQCckeUuS61I/Pod6zfbtf8dcG0ryU0n+04zbm9ttSa7IdLriC0m+muSm1D/OuPp/gjl7ABhL98+fXUlOzvRQubOTvDjJham/yc9DuSTJu+fY0JyDvzvTt+3jZ9wmADC5M8kTMn15XdlcFwEmyc1JPjLj9gCA7/pQZpr8k3kDQJK8Z+btAQCT9865sbnPv+xIcnWSp8+8XQDo7MuZfoq4b64Nzr0CsD/J22beJgB0968y4+SfrOcKzGOTfCXTA3oAgNX8SZKzMj0DYDZzrwAkU4GXrmG7ANDRv87Mk3+yvt9gHpvks0metabtA0AHn0/y3KwhAKxjBSCZCv3pzHy+AgAa2ZfkH2YNk3+yvgCQTA9P+LU1bh8AttllSf5gXRtf920YT0myJ8nj1rwfANgmN2a68O8b69rBOlcAkukNXJz6+00DwCj2J3lz1jj5J9PFeuv2vzM9J+D5G9gXAIzu3yf51XXvZFNPYjou0+OChQAAeHCfSfLD2cCTajf5KManZHpjp25wnwAwiq8nOTfJn21iZ+u+BuBgf5rpOcu3bnCfADCCW5O8JBua/JPNBoBkujnQK5J8Z8P7BYCluivJ38t005+N2cRFgPf31Uz3NX5lNnsKAgCWZl+S1yb58KZ3XBEAkuSaA6+XJ9lZVAMAVLoryeuSvL9i59XfwM9P8jtJHl1cBwBs0m2Zlv1/v6qA6gCQJM9J8tEkj68uBAA24K+SvDTJ5yqL2PRFgIfyuSTnJPmf1YUAwJr9r0z3xCmd/JO6awDu75Yk7810+8PzsoyVCQCYy/5Md/d7TdZ8i9/DtcSJ9qIk744HCAGwHW5M8qYkH6ku5GBLWQE42LVJ3pXk+Ex3RFpiSAGAh7M/yfsy/eLtj4treYClT67PSfLOTEEAAEbxhSQ/kwVf37aEiwAfyucyXSxxSaanCgLAku1N8sYMcHH70lcADnZMpp9N/GKSZ9eWAgDf45okb09yeZJ7ims5LCMFgPvsSPKjSS7OdMHg8bXlANDUt5P8bqZfsX0s0zn/YYwYAA62O9OdlF6b5IfitsIArNc9Sf57kv+c5LeT3FxbztEbPQAc7IRM1wv8yIHX2Vn+NQ4ALN/1ST5x4PXxJDfVljOPbQoA93dSkjOTnJHkrAP/flKSEw+8Tj7wd1dVgQCUuivTPflvOvD3tiR/nulCvj2Zfpa+N8mtVQUCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAJv1/wH2+CVbghmaVAAAAABJRU5ErkJggg==" />
              </defs>
            </svg>
          </a>
          <a href="#" class="reports__icon">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M8.60243 0.0651318C8.37894 0.151015 8.15195 0.381132 8.06713 0.607811C8.00231 0.781109 8.00194 0.804205 8.00194 4.72547V8.66886L7.0404 7.71061C5.92754 6.6015 5.89188 6.57603 5.45481 6.57872C5.14684 6.58059 4.95691 6.65723 4.74552 6.86487C4.53881 7.06789 4.45886 7.26497 4.45655 7.57729C4.45311 8.04421 4.37236 7.94589 6.52651 10.0973C8.32113 11.8897 8.43364 11.9959 8.60475 12.0585C8.72395 12.102 8.8594 12.1246 9.00204 12.1246C9.14468 12.1246 9.28013 12.102 9.39933 12.0585C9.57044 11.9959 9.68295 11.8897 11.4776 10.0973C13.6317 7.94589 13.551 8.04421 13.5475 7.57729C13.5452 7.26497 13.4653 7.06789 13.2586 6.86487C13.0472 6.65723 12.8572 6.58059 12.5493 6.57872C12.1122 6.57603 12.0765 6.6015 10.9637 7.71061L10.0021 8.66886V4.72547C10.0021 0.804205 10.0018 0.781109 9.93694 0.607811C9.7959 0.230867 9.43249 -0.00312503 8.99304 3.15394e-05C8.84496 0.00109415 8.71098 0.0234401 8.60243 0.0651318ZM1.60174 14.0665C1.49991 14.1057 1.37809 14.1885 1.28411 14.2825C0.78456 14.782 0.964641 15.6931 1.61064 15.9348L1.78491 16H9.00204H16.2192L16.3934 15.9348C17.2058 15.6309 17.2058 14.3689 16.3934 14.065L16.2192 13.9998L8.99304 14.0014C1.80716 14.0031 1.76603 14.0034 1.60174 14.0665Z" />
            </svg>
          </a>
        </div>
      </div>
      <Screen v-for="(item, i) in this.current" :key="i" @screenClose="screenDelete(i)" @screenDown="screenDown"
        @screenUp="screenUp" @setTitle="setTitle" :title="item.title" :screenNumber="i + 1" :screens="current.length"
        :types="typeof item" />
      <div class="reports__add">
        <div class="reports__add-title">Добавить экран</div>
        <div class="reports__add-btn" @click="addSreen()">
          <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse opacity="0.5" cx="20.0444" cy="20" rx="20.0444" ry="20" fill="#030087" />
            <path
              d="M28.0624 19.1228V20.7018H20.8999V28H19.1894V20.7018H12.0269V19.1228H19.1894V12H20.8999V19.1228H28.0624Z"
              fill="white" />
          </svg>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import MenuReports from "../components/MenuReports.vue";
import Screen from "../components/Screen.vue";
import html2Pdf from 'html2pdf.js';
export default {
  name: "Reports",
  components: {
    MenuReports,
    Screen
  },
  data: () => ({
    current: [],
  }),
  methods: {
    screenDelete(i, current = this.current) {
      current.splice(i, 1)
      for (let j = 0; j < current.length; j++) {
        current[j] = {
          id: j,
          title: current[j].title
        };
      }
      if (typeof this.$refs !== 'undefined')
        this.$refs.menuList.updateAr(this.current)
    },
    setTitle(el) {
      this.current[el.id].title = el.title
    },
    addSreen() {
      this.current.push({
        id: this.current.length,
        title: (this.current.length + 1) + ' экран'
      });
      this.$refs.menuList.updateAr(this.current)
    },
    screenDown(res) {
      if (res) {
        this.current = this.array_move(this.current, res.newIndex, res.oldIndex)
        this.$refs.menuList.updateAr(this.current)

        this.changeWrap(res);
      }
    },
    screenUp(res) {
      if (res) {
        this.current = this.array_move(this.current, res.newIndex, res.oldIndex)
        this.$refs.menuList.updateAr(this.current)

        this.changeWrap(res);
      }
    },
    changeWrap(res) {
      let screens = document.querySelectorAll('.screen .screen__wrap');
      let curScreen = screens[res.newIndex].innerHTML
      let subScreen = screens[res.oldIndex].innerHTML
      screens[res.oldIndex].innerHTML = curScreen
      screens[res.newIndex].innerHTML = subScreen
    },
    array_move(arr, old_index, new_index) {
      while (old_index < 0) {
        old_index += arr.length;
      }
      while (new_index < 0) {
        new_index += arr.length;
      }
      if (new_index >= arr.length) {
        var k = new_index - arr.length + 1;
        while (k--) {
          arr.push(undefined);
        }
      }
      arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
      return arr;
    },
    generateReport() {
      let screens = document.querySelectorAll('.screen');
      let arr = [];
      for (let i = 0; i < screens.length; i++) {
        let screenTitle = screens[i].querySelector('.screen__top-title span').textContent;
        let elementRow = screens[i].querySelectorAll('.screen__elements');
        arr.push({ 
          title: screenTitle
        })
        for (let j = 0; j < elementRow.length; j++) {
          let elementItem = elementRow[j].querySelectorAll('.elements-item')
          arr[i].count = elementItem.length
          arr[i].elements = [];
          for (let z = 0; z < elementItem.length; z++) {
            let inputValue = elementItem[z].querySelectorAll('input');
            let type = elementItem[z].id
            arr[i].elements[z] = {
              type: type,
              value: []
            }
            for (let v = 0; v < inputValue.length; v++) {
              arr[i].elements[z].value.push(inputValue[v].value)
            }
          }
        }
      }
      console.log(arr);
      // html2Pdf(res)
    },

  },
};
</script>

<style lang="scss" scoped>
.reports {
  & h2 {
    margin-bottom: 0;
  }

  &__title {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  &__icons {
    display: flex;
    align-items: center;
  }

  &__icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border: 1px solid #030087;
    border-radius: 5px;
    transition: ease-in-out 0.25s;
    margin-right: 15px;

    &:last-of-type {
      margin-right: 0;
    }

    &:hover {
      background: #030087;

      & svg {
        fill: #fff;
      }
    }

    & svg {
      fill: #030087;
      transition: ease-in-out 0.25s;
    }
  }

  &__add {
    margin-top: 25px;
    cursor: pointer;

    &-title {
      font-size: 14px;
      line-height: 18px;
      color: #222222;
      font-weight: 600;
    }

    &-btn {
      width: 100%;
      height: 80px;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 1px dashed #030087;
      border-radius: 7px;
      margin-top: 10px;
    }
  }
}

@media(max-width: 1170px) {
  .page-glob {
    padding-left: 0;
  }

  .reports__title {
    flex-direction: column;

    & h2 {
      font-size: 24px;
      line-height: 31px;
    }

    & .reports__icons {
      width: 100%;
      margin-top: 30px;
    }

    & .reports__icon {
      width: 33.33333%;
    }
  }
}
</style>
