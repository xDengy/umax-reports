<template>
  <header>
    <div class="burger" @click="burger">
      <svg
        width="27"
        height="17"
        viewBox="0 0 27 17"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <rect width="27" height="3" rx="1.5" fill="#222222" />
        <rect y="7" width="27" height="3" rx="1.5" fill="#222222" />
        <rect y="14" width="27" height="3" rx="1.5" fill="#222222" />
      </svg>
    </div>
    <img src="../assets/images/logotip.svg" alt="logo" />
  </header>
  <aside class="menureports">
    <div class="closeMenu" @click="burgerHide">
      <svg
        width="15"
        height="15"
        viewBox="0 0 15 15"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <line
          x1="1.06066"
          y1="1"
          x2="13"
          y2="12.9393"
          stroke="#222222"
          stroke-width="1.5"
          stroke-linecap="round"
        />
        <path
          d="M1 13.293L13.2929 1.00008"
          stroke="#222222"
          stroke-width="1.5"
          stroke-linecap="round"
        />
      </svg>
    </div>
    <div class="menureports__logo">
      <img src="../assets/images/logotip.svg" alt="logo" />
    </div>
    <div class="menureports-cont">
      <div class="menureports-buttons">
        <router-link
          to="/newreport"
          class="
            menureports-buttons__button menureports-buttons__button--newrep
          "
        >
          <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M9.00209 0.00914834C6.37427 0.291714 3.99488 1.55089 2.32055 3.54509C1.14391 4.94649 0.412797 6.53547 0.0881988 8.39685C0.0137612 8.82382 0.00268555 9.03144 0.00268555 10.0026C0.00268555 10.9738 0.0137612 11.1814 0.0881988 11.6084C0.456473 13.7202 1.33798 15.4686 2.79825 16.9836C4.29901 18.5405 6.18774 19.5297 8.3943 19.9145C8.82128 19.9889 9.0289 20 10.0001 20C11.2266 20 11.5944 19.9584 12.554 19.7109C16.0051 18.8211 18.8185 16.0079 19.7082 12.5571C19.9558 11.5969 19.9974 11.2293 19.9974 10.0026C19.9974 9.03144 19.9864 8.82382 19.9119 8.39685C19.5275 6.19201 18.5367 4.30039 16.981 2.80079C15.4714 1.34562 13.7077 0.454522 11.6264 0.0953661C11.2499 0.0303995 10.9531 0.0117705 10.1566 0.00316046C9.60773 -0.00278829 9.08819 -8.78735e-05 9.00209 0.00914834ZM11.2133 1.6465C13.1148 1.95365 14.6134 2.71458 15.9508 4.05191C17.1143 5.21552 17.8841 6.58921 18.2325 8.12406C18.5068 9.33276 18.5068 10.6725 18.2325 11.8812C17.7599 13.9633 16.4596 15.8194 14.5909 17.0794C13.8706 17.5651 12.7769 18.0311 11.8786 18.235C10.6699 18.5094 9.33021 18.5094 8.12152 18.235C6.03941 17.7624 4.18333 16.4621 2.92325 14.5934C2.43756 13.8731 1.97157 12.7795 1.76766 11.8812C1.49332 10.6725 1.49332 9.33276 1.76766 8.12406C2.11606 6.58921 2.88579 5.21552 4.04936 4.05191C5.52618 2.57513 7.21191 1.79295 9.39345 1.57238C9.70345 1.54103 10.8493 1.58768 11.2133 1.6465ZM9.64862 5.35516C9.55383 5.40361 9.42241 5.51088 9.35659 5.59358L9.23691 5.74394L9.22591 7.44278L9.21495 9.14161H7.58069C5.9631 9.14161 5.9447 9.14251 5.77411 9.22967C5.67932 9.27812 5.54841 9.38477 5.48321 9.46668C5.38321 9.59243 5.36251 9.65653 5.35077 9.87761C5.33245 10.2212 5.44117 10.4399 5.7145 10.6092L5.904 10.7266L7.56069 10.7387L9.21734 10.7508V12.3861V14.0213L9.30845 14.1939C9.59168 14.7302 10.4085 14.7302 10.6917 14.1939L10.7828 14.0213V12.3861V10.7508L12.4394 10.7387L14.0961 10.7266L14.2856 10.6092C14.559 10.4399 14.6677 10.2212 14.6494 9.87761C14.6376 9.65653 14.6169 9.59243 14.5169 9.46668C14.4517 9.38477 14.3208 9.27812 14.226 9.22967C14.0554 9.14251 14.037 9.14161 12.4194 9.14161H10.7852L10.7742 7.44278L10.7632 5.74394L10.6435 5.59358C10.4879 5.39797 10.2299 5.2671 10.0001 5.2671C9.8915 5.2671 9.75312 5.30177 9.64862 5.35516Z"
              fill="#030087"
            />
          </svg>
          Новый отчёт
        </router-link>
        <router-link
          to="/listreports"
          class="
            menureports-buttons__button menureports-buttons__button--listrep
          "
        >
          <svg
            width="20"
            height="17"
            viewBox="0 0 20 17"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M1.73955 0.91414C1.01739 1.03195 0.378545 1.55208 0.112068 2.23914C0.00481238 2.5157 -0.0326078 3.13402 0.038518 3.45379C0.119028 3.81556 0.307537 4.15195 0.590984 4.43954C1.71562 5.5808 3.62093 5.08874 4.08127 3.53809C4.21375 3.09182 4.14247 2.41416 3.91884 1.99385C3.77937 1.73172 3.31414 1.26457 3.06901 1.14058C2.66646 0.936897 2.14469 0.848019 1.73955 0.91414ZM7.21378 1.63486C6.77905 1.77359 6.43988 2.0816 6.29477 2.46941C6.19983 2.72314 6.18302 3.11114 6.25536 3.37836C6.39096 3.87929 6.84087 4.26479 7.39478 4.35465C7.72096 4.40759 18.498 4.41068 18.82 4.35793C19.3129 4.27719 19.6991 3.99671 19.8985 3.57453C19.9867 3.38771 20 3.30817 20 2.96846C20 2.61342 19.9894 2.5566 19.8852 2.35089C19.7454 2.07495 19.5013 1.84272 19.2053 1.70391L18.9834 1.5999L13.1768 1.59244C8.55805 1.58645 7.3382 1.59513 7.21378 1.63486ZM1.54866 6.47243C0.906456 6.62321 0.271133 7.2301 0.0731229 7.882C-0.0385904 8.24979 -0.0187268 8.91628 0.114062 9.25693C0.302962 9.74156 0.799044 10.2426 1.28543 10.44C1.48348 10.5204 1.63418 10.5496 1.92896 10.5648C2.61954 10.6002 3.07871 10.431 3.53823 9.97144C3.96651 9.54312 4.14336 9.11351 4.14336 8.50134C4.14336 7.89014 3.96639 7.45939 3.54011 7.03315C3.10721 6.60022 2.67799 6.42719 2.05237 6.43333C1.85881 6.43525 1.63214 6.45284 1.54866 6.47243ZM7.32209 7.13489C6.90832 7.21657 6.51804 7.51433 6.33876 7.88517C6.1641 8.24643 6.1639 8.75479 6.33825 9.1175C6.46557 9.38233 6.79164 9.68752 7.06531 9.79798L7.29198 9.88944L12.9781 9.9C16.7207 9.90692 18.7378 9.89691 18.8799 9.87063C19.3232 9.78868 19.7036 9.50476 19.9022 9.10741C19.9879 8.93611 20 8.86107 20 8.50134C20 8.1416 19.9879 8.06656 19.9022 7.89526C19.7051 7.50104 19.3265 7.21638 18.8887 7.13337C18.6324 7.08476 7.56866 7.08621 7.32209 7.13489ZM1.53525 12.0025C0.829152 12.1926 0.240517 12.7819 0.0525945 13.4868C0.0239331 13.5943 0.000237496 13.8419 2.88683e-06 14.0369C-0.000700942 14.5651 0.127239 14.9372 0.443493 15.3269C1.08237 16.1142 2.14304 16.331 3.06733 15.863C3.31394 15.7382 3.77902 15.2716 3.91884 15.0088C4.14247 14.5885 4.21375 13.9108 4.08127 13.4646C3.86926 12.7504 3.29427 12.1835 2.59815 12.0021C2.31564 11.9286 1.80904 11.9287 1.53525 12.0025ZM7.35912 12.6505C6.98038 12.7136 6.64856 12.9281 6.43718 13.2466C5.96605 13.9564 6.23886 14.9345 7.00689 15.2892L7.25288 15.4028H13.1181H18.9834L19.2053 15.2988C19.5013 15.1599 19.7454 14.9277 19.8852 14.6518C19.9894 14.4461 20 14.3893 20 14.0342C20 13.6945 19.9867 13.615 19.8985 13.4281C19.6991 13.006 19.3129 12.7255 18.82 12.6447C18.5307 12.5973 7.64538 12.6029 7.35912 12.6505Z"
              fill="#222222"
            />
          </svg>
          Список отчётов
        </router-link>
        <router-link
          to="/settings"
          class="
            menureports-buttons__button menureports-buttons__button--settings
          "
        >
          <svg
            width="19"
            height="19"
            viewBox="0 0 19 19"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.41007 0.0437877C7.02183 0.163308 6.66475 0.468128 6.49792 0.822377C6.441 0.943197 6.36164 1.26942 6.28832 1.68366C6.22341 2.05039 6.13962 2.41821 6.10216 2.50101C5.93537 2.86934 5.57362 3.11072 5.14372 3.14057C4.90969 3.15681 4.85525 3.14313 4.20715 2.90535C3.534 2.6584 3.51118 2.65294 3.15589 2.65267C2.65014 2.6523 2.4191 2.74284 2.08552 3.07204C1.87145 3.28328 1.72401 3.50901 1.02097 4.70191C0.572138 5.46347 0.173617 6.14949 0.13539 6.22638C-0.0547917 6.6091 -0.0395389 7.12672 0.173808 7.53047C0.312612 7.79318 0.40604 7.88728 1.00671 8.36945C1.64556 8.88232 1.77634 9.0752 1.77634 9.50456C1.77634 9.93392 1.64556 10.1268 1.00671 10.6397C0.406766 11.1213 0.312574 11.216 0.174726 11.4768C0.0202488 11.7691 -0.0338813 12.0926 0.0206693 12.3972C0.0762519 12.7076 0.0607699 12.678 1.02097 14.3072C1.72401 15.5001 1.87145 15.7258 2.08552 15.9371C2.4191 16.2663 2.65014 16.3568 3.15589 16.3564C3.51118 16.3562 3.534 16.3507 4.20715 16.1038C4.85525 15.866 4.90969 15.8523 5.14372 15.8685C5.57362 15.8984 5.93537 16.1398 6.10216 16.5081C6.13962 16.5909 6.22341 16.9587 6.28832 17.3255C6.36271 17.7458 6.44077 18.0654 6.49957 18.1902C6.62144 18.449 6.95742 18.7726 7.23598 18.8995L7.45648 19H9.50164H11.5468L11.7673 18.8995C12.0459 18.7726 12.3819 18.449 12.5037 18.1902C12.5625 18.0654 12.6406 17.7458 12.715 17.3255C12.7799 16.9587 12.8637 16.5909 12.9011 16.5081C13.0679 16.1398 13.4297 15.8984 13.8596 15.8685C14.0936 15.8523 14.148 15.866 14.7961 16.1038C15.4693 16.3507 15.4921 16.3562 15.8474 16.3564C16.3531 16.3568 16.5842 16.2663 16.9178 15.9371C17.1316 15.726 17.2795 15.4998 17.9798 14.3123C18.4272 13.5536 18.8257 12.8676 18.8653 12.7879C19.055 12.4062 19.0408 11.8786 18.8302 11.4799C18.6906 11.2159 18.5977 11.1222 17.9966 10.6397C17.3577 10.1268 17.2269 9.93392 17.2269 9.50456C17.2269 9.09259 17.3656 8.87403 17.8926 8.45497C18.7142 7.80166 18.9008 7.56459 18.9819 7.07123C19.0285 6.78749 18.9835 6.45895 18.8653 6.22125C18.8257 6.14154 18.4272 5.45552 17.9798 4.69678C17.2795 3.50935 17.1316 3.28309 16.9178 3.072C16.5842 2.74284 16.3531 2.6523 15.8474 2.65267C15.4921 2.65294 15.4693 2.6584 14.7961 2.90535C14.148 3.14313 14.0936 3.15681 13.8596 3.14057C13.4297 3.11072 13.0679 2.86934 12.9011 2.50101C12.8637 2.41821 12.78 2.04943 12.7153 1.6815C12.6255 1.17139 12.5701 0.957989 12.4819 0.782686C12.3449 0.510161 12.0614 0.245329 11.7571 0.105629L11.5468 0.0091135L9.55898 0.0016435C7.99063 -0.00422844 7.53717 0.00469096 7.41007 0.0437877ZM11.1812 2.02527C11.2837 2.65576 11.3983 3.03996 11.5752 3.34668C12.0474 4.16518 12.9443 4.67322 13.9169 4.67322C14.3347 4.67322 14.6369 4.60405 15.3356 4.34855L15.8368 4.16526L16.6304 5.50045C17.2888 6.60821 17.4151 6.84345 17.3716 6.88144C17.3427 6.90663 17.1259 7.0819 16.8896 7.27092C16.3376 7.71265 16.1503 7.92229 15.9401 8.33389C15.7399 8.72589 15.6576 9.06691 15.6576 9.50456C15.6576 9.9422 15.7399 10.2832 15.9401 10.6752C16.1503 11.0868 16.3376 11.2965 16.8896 11.7382C17.1259 11.9272 17.3427 12.1025 17.3716 12.1277C17.4151 12.1657 17.2888 12.4009 16.6304 13.5087L15.8368 14.8439L15.3356 14.6606C14.6369 14.4051 14.3347 14.3359 13.9169 14.3359C12.7339 14.3359 11.715 15.0618 11.3605 16.1569C11.3109 16.3102 11.2302 16.6823 11.1812 16.9838L11.0921 17.532H9.50164H7.91119L7.82208 16.9838C7.77308 16.6823 7.69238 16.3102 7.64276 16.1569C7.28831 15.0618 6.2694 14.3359 5.08638 14.3359C4.66855 14.3359 4.36636 14.4051 3.66779 14.6605L3.16667 14.8437L2.37322 13.5084C1.71686 12.4037 1.5888 12.1651 1.63196 12.1275C1.66066 12.1024 1.87741 11.9272 2.11366 11.7382C2.6657 11.2965 2.85302 11.0868 3.06319 10.6752C3.26339 10.2832 3.34569 9.9422 3.34569 9.50456C3.34569 9.06691 3.26339 8.72589 3.06319 8.33389C2.85302 7.92229 2.6657 7.71265 2.11366 7.27092C1.87741 7.0819 1.66066 6.90674 1.63196 6.88166C1.5888 6.84397 1.71678 6.60549 2.37288 5.50127L3.16602 4.16645L3.71436 4.36442C4.48273 4.64185 4.6924 4.68407 5.20106 4.66378C5.94412 4.63412 6.53906 4.36776 7.05509 3.83364C7.48947 3.38403 7.66952 2.95939 7.82182 2.02527L7.91119 1.4771H9.50164H11.0921L11.1812 2.02527ZM8.7371 5.8983C6.95249 6.27049 5.71713 7.74565 5.71713 9.50456C5.71713 11.299 7.02986 12.8214 8.84203 13.1286C11.1696 13.5232 13.2862 11.7972 13.2862 9.50456C13.2862 7.7199 12.0009 6.21728 10.1885 5.88302C9.77363 5.80654 9.14548 5.81312 8.7371 5.8983ZM10.0757 7.42604C10.4639 7.53062 10.6938 7.65828 11.0033 7.94106C11.9132 8.77235 11.9596 10.0889 11.1099 10.9652C10.2506 11.8514 8.90258 11.896 7.99919 11.0681C7.04496 10.1936 7.04526 8.8136 7.99984 7.94106C8.57245 7.41764 9.33883 7.22751 10.0757 7.42604Z"
              fill="#222222"
            />
          </svg>
          Настройки
        </router-link>
      </div>
      <div v-if="window.includes('/reports/')" class="menureports-cont-list">
        <div class="menureports-buttons__button">Список слайдов</div>
        <draggable
          class="menureports-buttons__button menureports-buttons__button--list"
          handle="svg"
          tag="transition-group"
          @end="drag"
        >
          <div
            class="menureports-buttons__elements"
            v-for="(item, index) in currentAr"
            :id="'element-' + index"
            :key="index"
            :sub-id="index"
            @mouseleave="leaveTitle($event.target)"
          >
            <div class="elements__text">
              <svg
                width="15"
                height="12"
                viewBox="0 0 15 12"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  width="15"
                  height="2"
                  rx="1"
                  fill="#030087"
                  fill-opacity="0.3"
                />
                <rect
                  y="5"
                  width="15"
                  height="2"
                  rx="1"
                  fill="#030087"
                  fill-opacity="0.3"
                />
                <rect
                  y="10"
                  width="15"
                  height="2"
                  rx="1"
                  fill="#030087"
                  fill-opacity="0.3"
                />
              </svg>
              <input
                type="text"
                :value="item[0].title"
                @input="setTitle(index, $event.target.value)"
              />
              <a @click="scroll(index)">{{
                item[0].title
              }}</a>
            </div>
            <div class="icons">
              <svg
                width="14"
                height="16"
                viewBox="0 0 14 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                @click="editTitle($event.target.closest('.menureports-buttons__elements'))"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.43785 0.0483159C9.19458 0.0997631 8.82307 0.250573 8.55271 0.407665C8.41928 0.485211 7.45003 1.43552 4.6529 4.23124C1.18643 7.69596 0.923072 7.96663 0.820021 8.17039C0.759197 8.29072 0.69381 8.43841 0.674775 8.49858C0.65574 8.55874 0.499304 9.28301 0.327178 10.1081C0.101228 11.1909 0.0143056 11.6691 0.0146495 11.8271C0.0164623 12.6953 0.590009 13.346 1.46252 13.4698C1.6689 13.499 1.7422 13.4875 3.26045 13.1858C4.13096 13.0128 4.91355 12.8492 4.9995 12.8221C5.43959 12.6837 5.28828 12.8241 9.13526 8.98532C11.1177 7.00714 12.8083 5.30316 12.8921 5.1987C13.6763 4.2222 13.7083 2.76505 12.9685 1.72826C12.7586 1.43414 11.8467 0.53072 11.6357 0.407884C11.356 0.245009 10.9906 0.099263 10.7285 0.0459404C10.4223 -0.0163214 9.73762 -0.0150712 9.43785 0.0483159ZM10.5873 1.74173C10.7399 1.817 10.8809 1.93758 11.2411 2.30099C11.6261 2.68929 11.7172 2.79962 11.8037 2.9825C11.8968 3.17913 11.9071 3.22851 11.9071 3.482C11.9071 3.73408 11.8966 3.7854 11.8063 3.97609C11.7114 4.17641 11.496 4.3998 8.13754 7.78085C5.26577 10.6719 4.55057 11.3763 4.472 11.3907C3.9423 11.4876 1.63949 11.8606 1.63949 11.8495C1.63949 11.8414 1.76658 11.1862 1.92189 10.3933L2.20432 8.95179L5.74292 5.41068C7.68917 3.46309 9.32848 1.84016 9.38584 1.80421C9.72037 1.59455 10.2348 1.56779 10.5873 1.74173ZM0.599229 14.4711C0.354151 14.5292 0.182181 14.6704 0.0912265 14.8882C0.0270268 15.0419 0.0240262 15.3882 0.0856629 15.5357C0.153144 15.6972 0.308768 15.8597 0.467423 15.9342L0.607356 16L6.71042 15.9997L12.8135 15.9994L12.9715 15.9258C13.4784 15.6898 13.5737 15.0258 13.1536 14.6569C12.9004 14.4346 13.4725 14.4534 6.76546 14.448C3.28596 14.4451 0.667242 14.455 0.599229 14.4711Z"
                  fill="#030087"
                />
              </svg>
              <svg
                width="15"
                height="15"
                viewBox="0 0 15 15"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                data-v-59c35ec8=""
                @click="deleteItem($event.target.closest('.menureports-buttons__elements').id.split('-')[1])"
              >
                <line
                  x1="1.06066"
                  y1="1"
                  x2="13"
                  y2="12.9393"
                  stroke="#222222"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  data-v-59c35ec8=""
                ></line>
                <path
                  d="M1 13.293L13.2929 1.00008"
                  stroke="#222222"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  data-v-59c35ec8=""
                ></path>
              </svg>
            </div>
          </div>
        </draggable>
      </div>
      <div class="menureports-cont-bottom">
        <router-link to="/personalrea" class="menureports-user">
          <div class="menureports-user__ava">
            <img :src="this.user?.image" alt="avatar" />
          </div>
          <div class="menureports-user__wrap">
            <div class="menureports-user__name">
              <p>{{ this.user?.name }}</p>
            </div>
            <div class="menureports-user__author"><p>Автор отчета</p></div>
          </div>
        </router-link>
        <div class="menureports-exit" @click="exit">
          <svg
            width="14"
            height="16"
            viewBox="0 0 14 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12.1878 15.937C12.3079 15.904 12.5306 15.8103 12.6828 15.7288C12.9168 15.6035 13.002 15.5349 13.236 15.2828C13.6093 14.881 13.7958 14.527 13.8925 14.0376C13.9541 13.7253 13.9541 2.2753 13.8925 1.96301C13.8041 1.51534 13.6173 1.13895 13.3088 0.786903C12.982 0.414077 12.6264 0.186881 12.1758 0.0632205C11.9508 0.0014682 11.8636 -9.31576e-07 8.3892 -9.31576e-07H4.83288L4.68253 0.0804082C4.39973 0.231664 4.2517 0.575458 4.32268 0.916002C4.36959 1.14098 4.47362 1.29433 4.65507 1.40602L4.80688 1.49946L8.16978 1.49999C10.3434 1.50034 11.5983 1.51196 11.7182 1.53284C11.8202 1.55059 11.956 1.59378 12.0199 1.62878C12.1949 1.72463 12.3795 1.94626 12.4481 2.1428C12.5079 2.3143 12.5081 2.33537 12.5081 8.0003C12.5081 13.6652 12.5079 13.6863 12.4481 13.8578C12.3795 14.0543 12.1949 14.276 12.0199 14.3718C11.956 14.4068 11.8202 14.45 11.7182 14.4678C11.5982 14.4887 10.3488 14.5002 8.18277 14.5003L4.83288 14.5005L4.68253 14.5809C4.39973 14.7322 4.2517 15.076 4.32268 15.4165C4.36959 15.6415 4.47362 15.7949 4.65507 15.9066L4.80688 16L8.38815 15.9986C11.8247 15.9972 11.9782 15.9947 12.1878 15.937ZM5.20956 12.2952C5.59587 12.1631 5.80201 11.6339 5.6198 11.2421C5.59398 11.1865 5.073 10.6031 4.46209 9.94568L3.35138 8.75032L6.18369 8.75032C9.30816 8.75032 9.12615 8.7617 9.33069 8.55341C9.47447 8.407 9.53695 8.23946 9.53695 8.0003C9.53695 7.76113 9.47447 7.59359 9.33069 7.44718C9.12615 7.23889 9.30816 7.25027 6.18369 7.25027H3.35138L4.46209 6.05491C5.073 5.39745 5.592 4.81737 5.61543 4.7658C5.83663 4.27894 5.50392 3.68782 5.00345 3.67851C4.6689 3.67226 4.75776 3.59154 2.83122 5.65208C1.62771 6.93932 1.04189 7.58725 1.00483 7.67216C0.937077 7.82745 0.931516 8.1443 0.993708 8.30599C1.04894 8.44963 4.49007 12.1615 4.65187 12.252C4.80164 12.3358 5.03757 12.3541 5.20956 12.2952Z"
              fill="#030087"
            />
          </svg>
          Выйти
        </div>
        <div class="hide-menu" @click="hideMenu()">
          <svg
            width="7"
            height="8"
            viewBox="0 0 7 8"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M1 4L6.25 7.4641L6.25 0.535898L1 4Z" fill="#403D72" />
          </svg>
        </div>
      </div>
    </div>
  </aside>
  <div class="hide-menu fixed" @click="hideMenu()">
    <svg
      width="7"
      height="8"
      viewBox="0 0 7 8"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M1 4L6.25 7.4641L6.25 0.535898L1 4Z" fill="#403D72" />
    </svg>
  </div>
</template>
<script>
import { VueDraggableNext } from "vue-draggable-next";
export default {
  name: "MenuReports",
  data: () => ({
    currentAr: [],
    userId: document.querySelector('meta[name="user"]').getAttribute("value"),
    user: null,
    window: window.location.pathname
  }),
  beforeMount() {
    axios.get("/api/user/" + this.userId).then((result) => {
      this.user = result.data;
    });
  },
  methods: {
    setTitle(id, title) {
      this.$emit('setTitle', {id, title})
    },
    scroll(id) {
      if(id == 0) {
        document.body.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      } else {
        document.querySelector('.screen[sub-id="' + id + '"] .screenElement-scroll').scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    },
    hideMenu() {
      let menureports = document.querySelector(".menureports");
      menureports.classList.toggle("hiddenWidth");
      document.querySelector(".page-glob").classList.toggle("hidden");
      setTimeout(() => {
        if (menureports.classList.contains("hidden"))
          menureports.classList.toggle("hidden");
        else menureports.classList.toggle("hidden");
      }, 250);
    },
    editTitle(elem) {
      elem
        .querySelector(".elements__text")
        .classList.toggle("active");
    },
    leaveTitle(elem) {
      if (
        elem
          .querySelector(".elements__text")
          .classList.contains("active")
      ) {
        elem
          .querySelector(".elements__text")
          .classList.remove("active");
      }
    },
    updateAr(ar) {
      this.currentAr = ar;
      // this.$.parent.data.current = ar;
    },
    drag(res) {
      // this.$.parent.type.methods.changeWrap(res.moved);
      this.$emit('drag', res)
    },
    deleteItem(index) {
      this.$emit('deleteItem', index)
    },
    exit() {
      axios.post("/exit").then((responce) => {
        window.location.href = window.location.origin;
      });
    },
    burger() {
      document.querySelector("aside").classList.add("active");
      document.body.style.overflow = "hidden";
    },
    burgerHide() {
      document.querySelector("aside").classList.remove("active");
      document.body.style.overflow = "auto";
    },
  },
  components: {
    draggable: VueDraggableNext,
  },
};
</script>
<style lang="scss" scoped>
.menureports {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 300px;
  padding: 30px 30px 110px;
  background: #ffffff;
  transition: ease-in-out 0.25s;
  z-index: 1;

  &__logo {
    width: 120px;
  }
  &-cont {
    height: 100%;
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  &-buttons {
    &__button {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-bottom: 10px;
      padding: 13px 30px;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #222222;
      cursor: pointer;

      transition: ease-in-out 0.25s;
      &:hover {
        opacity: 0.8;
        & svg {
          margin-right: 10px;
          transition: ease-in-out 0.25s;
          &:hover {
            opacity: 0.8;
          }
        }
      }
      & svg {
        margin-right: 10px;
      }
      &--newrep {
        padding: 13px;
        justify-content: center;
        color: #030087;
        border: 1.5px solid #030087;
        border-radius: 7px;
        transition: ease-in-out 0.25s;
        & svg {
          & path {
            transition: ease-in-out 0.25s;
          }
        }
        &:hover {
          background-color: #030087;
          color: #ffffff;
          & svg {
            & path {
              fill: #fff;
            }
          }
        }
      }
    }
  }
  &-user {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    margin-bottom: 30px;
    &__ava {
      height: 50px;
      width: 50px;
      border-radius: 50%;
      margin-right: 10px;
      display: flex;
      flex-shrink: 0;

      & img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
      }
    }
    &__name {
      display: flex;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      // margin-bottom: 10px;
      color: #222222;
      & p {
        margin-right: 5px;
      }
    }
    &__author {
      font-weight: 600;
      font-size: 14px;
      line-height: 18px;
      color: #222222;
    }
  }
  &-exit {
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;

    color: #030087;
    display: flex;
    align-items: center;

    cursor: pointer;

    transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.25s;
    &:hover {
      opacity: 0.8;
      & svg {
        margin-right: 10px;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.25s;
        &:hover {
          opacity: 0.8;
        }
      }
    }
    & svg {
      margin-right: 13px;
    }
  }
}

// .menureports.hidden {
//   left: -5%;
//   width: 150px;
//   padding: 10px 10px 110px;
// }

.hide-menu {
  position: absolute;
  right: -15px;
  top: calc(50% - 31.5px);
  cursor: pointer;
  padding: 20px 10px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #000;
}

.menureports.hiddenWidth .hide-menu {
  transform: rotate(180deg);
}

.hide-menu.fixed {
  position: fixed;
  left: -7.5px;
  z-index: 0;
  width: fit-content;
  transform: rotate(180deg);
}
.menureports-buttons__button--list {
  flex-direction: column;
  max-height: calc(39px * 7);
  overflow: auto;
}
.menureports-buttons__button--list .menureports-buttons__elements {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 600;
  font-size: 14px;
  line-height: 18px;
  margin-bottom: 20px;
}
.menureports-buttons__button--list
  .menureports-buttons__elements
  .elements__text {
  display: flex;
  align-items: center;
  width: fit-content;
}
.menureports-buttons__button--list .menureports-buttons__elements:last-of-type {
  margin-bottom: 0;
}
.elements__text a {
  color: inherit;
  text-decoration: none;
  user-select: none;
}
.elements__text input {
  display: none;
}
.elements__text.active input {
  display: block;
  width: 75%;
}
.elements__text.active a {
  display: none;
}
.menureports-buttons__elements svg {
  min-width: 14px;
  min-height: 16px;
}
.elements__text input {
  background: transparent;
  outline: none;
  border: 1px solid rgba(3, 0, 135, 0.3);
  border-radius: 5px;
  padding: 5px 10px;
}
@media (max-width: 1170px) {
  .hide-menu {
    display: none;
  }
}

.icons {
  display: flex;
  align-items: center;
  margin-left: 10px;
}

.elements__text a {
  word-break: break-word;
}
.menureports {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 300px;
  padding: 30px 30px 110px;
  background: #ffffff;
  transition: ease-in-out 0.25s;
  z-index: 1;

  &__logo {
    width: 120px;
  }

  &-cont {
    height: 100%;
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  &-buttons {
    &__button {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-bottom: 10px;
      padding: 13px 30px;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #222222;
      cursor: pointer;

      transition: ease-in-out 0.25s;

      &:hover {
        opacity: 0.8;

        & svg {
          margin-right: 10px;
          transition: ease-in-out 0.25s;

          &:hover {
            opacity: 0.8;
          }
        }
      }

      & svg {
        margin-right: 10px;
        display: flex;
        flex-shrink: 0;
      }

      &--newrep {
        padding: 13px;
        justify-content: center;
        color: #030087;
        border: 1.5px solid #030087;
        border-radius: 7px;
        transition: ease-in-out 0.25s;

        & svg {
          & path {
            transition: ease-in-out 0.25s;
          }
        }

        &:hover {
          background-color: #030087;
          color: #ffffff;

          & svg {
            & path {
              fill: #fff;
            }
          }
        }
      }
    }
  }

  &-user {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    margin-bottom: 30px;

    &__ava {
      height: 50px;
      width: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }

    &__name {
      display: flex;
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      // margin-bottom: 10px;
      color: #222222;

      & p {
        margin-right: 5px;
      }
    }

    &__author {
      font-weight: 600;
      font-size: 14px;
      line-height: 18px;
      color: #222222;
    }
  }

  &-exit {
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;

    color: #030087;
    display: flex;
    align-items: center;

    cursor: pointer;

    transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.25s;

    &:hover {
      opacity: 0.8;

      & svg {
        margin-right: 10px;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 0.25s;

        &:hover {
          opacity: 0.8;
        }
      }
    }

    & svg {
      margin-right: 13px;
    }
  }
}

.menureports.hiddenWidth {
  left: 0%;
  width: 150px;
  padding: 10px 10px 110px;
}

.hide-menu {
  position: absolute;
  right: -15px;
  top: calc(50% - 31.5px);
  cursor: pointer;
  padding: 20px 10px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #000;
}

.menureports.hiddenWidth .hide-menu {
  transform: rotate(180deg);
}

.hidden .menureports-cont {
  align-items: center;
  justify-content: flex-end;
}

.hidden .menureports-buttons,
.hidden .menureports-cont-list,
.hidden .menureports-user {
  display: none;
}

.hide-menu.fixed {
  position: fixed;
  left: -7.5px;
  z-index: 0;
  width: fit-content;
  transform: rotate(180deg);
}

.menureports-buttons__button--list {
  flex-direction: column;
  max-height: calc(39px * 7);
  overflow: auto;
}

.menureports-buttons__button--list .menureports-buttons__elements {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 600;
  font-size: 14px;
  line-height: 18px;
  margin-bottom: 20px;
}

.menureports-buttons__button--list
  .menureports-buttons__elements
  .elements__text {
  display: flex;
  align-items: center;
  width: fit-content;
}

.menureports-buttons__button--list .menureports-buttons__elements:last-of-type {
  margin-bottom: 0;
}

.elements__text a {
  color: inherit;
  text-decoration: none;
  user-select: none;
}

.elements__text input {
  display: none;
}

.elements__text.active input {
  display: block;
  width: 75%;
}

.elements__text.active a {
  display: none;
}

.menureports-buttons__elements svg {
  min-width: 14px;
  min-height: 16px;
}

.elements__text input {
  background: transparent;
  outline: none;
  border: 1px solid rgba(3, 0, 135, 0.3);
  border-radius: 5px;
  padding: 5px 10px;
}

header,
.closeMenu {
  display: none;
}

@media (max-width: 1170px) {
  .hide-menu {
    display: none;
  }

  header {
    position: absolute;
    display: flex;
    align-items: center;
    padding: 20px;
    width: 100%;
    z-index: 10000;
  }

  header .burger {
    margin-right: 50px;
  }

  header img {
    width: 150px;
  }

  .menureports {
    top: -100%;
    width: 100%;
    z-index: 100000;
  }

  .closeMenu {
    position: absolute;
    right: 30px;
    display: block;
  }

  .menureports.active {
    top: 0;
  }
}
</style>
