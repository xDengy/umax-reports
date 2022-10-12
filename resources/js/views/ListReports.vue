<template>
  <section class="page-glob" id="ListReports">
    <MenuReports />
    <div class="listreports wrap-glob">
      <h2>Список отчётов</h2>
      <div class="listreports-nav">
        <div class="listreports__search">
          <svg
            width="13"
            height="13"
            viewBox="0 0 13 13"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M4.6581 0.0373186C3.76247 0.162623 2.87559 0.525204 2.12734 1.07193C1.85481 1.27106 1.32906 1.77998 1.11928 2.0477C0.793332 2.46369 0.445129 3.08727 0.291942 3.52936C-0.525647 5.88861 0.415464 8.42114 2.59615 9.72998C4.33341 10.7727 6.62758 10.7586 8.34348 9.69476L8.54343 9.5708L8.8718 9.89447C9.05239 10.0725 9.79788 10.819 10.5284 11.5535C12.0365 13.0696 11.9676 13.0146 12.3342 12.9936C12.5575 12.9808 12.6576 12.9399 12.7981 12.804C12.9352 12.6715 13 12.514 13 12.3133C13 12.0634 12.9365 11.9523 12.6041 11.6204C11.5002 10.5183 9.62901 8.63023 9.62901 8.61857C9.62901 8.61078 9.68668 8.53322 9.75715 8.44623C10.1883 7.91398 10.5223 7.2487 10.7091 6.54998C11.126 4.99071 10.7817 3.36391 9.7556 2.04463C9.55034 1.78071 9.0233 1.27221 8.74142 1.06612C7.98298 0.511541 7.11833 0.163004 6.18176 0.0343219C5.83923 -0.0127372 5.00404 -0.0110864 4.6581 0.0373186ZM5.97671 1.4208C6.78526 1.51827 7.57289 1.88743 8.1931 2.45963C9.44545 3.61508 9.78606 5.37097 9.05273 6.89125C8.71774 7.58571 8.11932 8.20883 7.4097 8.60209C6.39273 9.16571 5.15704 9.2613 4.04096 8.86271C2.3942 8.27458 1.30739 6.62891 1.45834 4.95208C1.49171 4.58135 1.54305 4.34006 1.65906 4.00879C2.22304 2.39837 3.84027 1.31774 5.58257 1.3871C5.67651 1.39083 5.85387 1.40599 5.97671 1.4208Z"
              fill="#666666"
            />
          </svg>
          <input type="text" placeholder="поиск" v-model="fioq" />
        </div>
        <div class="listreports__select">
          <p>Сортировка:</p>
          <div class="select">
            <div
              class="select__wrap"
              :class="{ open: activeBrandSurname2 }"
              @click="selectOpenBrandSurname2()"
            >
              <div class="top">
                {{ globalBrandSurname2 || "По дате добавления" }}
                <svg
                  width="8"
                  height="5"
                  viewBox="0 0 8 5"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3.64645 4.35355C3.84171 4.54882 4.15829 4.54882 4.35355 4.35355L7.53553 1.17157C7.7308 0.976311 7.7308 0.659728 7.53553 0.464466C7.34027 0.269204 7.02369 0.269204 6.82843 0.464466L4 3.29289L1.17157 0.464466C0.976311 0.269204 0.659728 0.269204 0.464466 0.464466C0.269204 0.659728 0.269204 0.976311 0.464466 1.17157L3.64645 4.35355ZM3.5 3V4H4.5V3H3.5Z"
                    fill="#222222"
                  />
                </svg>
              </div>
              <div class="bottom">
                <div
                  class="select__item"
                  v-for="(brandSurname2, i) in brandsSurname2"
                  :key="i"
                  @click="chooseBrandSurname2(brandSurname2, i)"
                >
                  {{ brandSurname2.name }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="listreports-buttons">
          <div
            class="listreports-buttons__button listreports-buttons__button--points"
            :class="litstyle === true ? 'active' : ''"
            @click="points"
          >
            <svg
              width="21"
              height="21"
              viewBox="0 0 21 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect
                x="4"
                y="4"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="4"
                y="8.76685"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="4"
                y="13.5332"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="9.05566"
                y="4"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="9.05566"
                y="8.76685"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="9.05566"
                y="13.5332"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="14.1113"
                y="4"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="14.1113"
                y="8.76685"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                x="14.1113"
                y="13.5332"
                width="2.88889"
                height="3.46667"
                rx="0.78125"
                fill="#666666"
              />
              <rect
                class="svg-btn"
                x="0.75"
                y="0.75"
                width="19.5"
                height="19.5"
                rx="4.25"
                stroke="#666666"
                stroke-width="1.5"
              />
            </svg>
          </div>
          <div
            class="listreports-buttons__button listreports-buttons__button--line"
            :class="litstyle === false ? 'active' : ''"
            @click="line"
          >
            <svg
              width="16"
              height="13"
              viewBox="0 0 16 13"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect width="16" height="3" rx="1" fill="#666666" />
              <rect y="5" width="16" height="3" rx="1" fill="#666666" />
              <rect y="10" width="16" height="3" rx="1" fill="#666666" />
            </svg>
          </div>
        </div>
      </div>
      <div class="listreports-cards">
        <div
          class="listreports-card"
          :class="litstyle === true ? 'points' : 'list'"
          v-for="(card, i) in restabels_q"
          :key="i"
        >
          <div class="listreports-card__textblock">
            <div class="listreports-card__data">{{ new Date(card.created_at).toISOString().split('T')[0] }}</div>
            <div class="listreports-card__name">{{ card.title }}</div>
          </div>
          <div class="listreports-card__navblock">
            <div class="listreports-card__button" @click="downloadReport(card.id)">
              <svg
                width="30"
                height="30"
                viewBox="0 0 30 30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M14.5065 5.08141C14.2272 5.18877 13.9434 5.47641 13.8374 5.75976C13.7564 5.97639 13.7559 6.00526 13.7559 10.9068V15.8361L12.554 14.6383C11.1629 13.2519 11.1183 13.22 10.572 13.2234C10.187 13.2257 9.94962 13.3215 9.68538 13.5811C9.42699 13.8349 9.32706 14.0812 9.32417 14.4716C9.31987 15.0553 9.21893 14.9324 11.9116 17.6216C14.1549 19.8621 14.2955 19.9948 14.5094 20.0731C14.6584 20.1276 14.8277 20.1558 15.006 20.1558C15.1843 20.1558 15.3536 20.1276 15.5026 20.0731C15.7165 19.9948 15.8572 19.8621 18.1004 17.6216C20.7931 14.9324 20.6922 15.0553 20.6879 14.4716C20.685 14.0812 20.5851 13.8349 20.3267 13.5811C20.0624 13.3215 19.825 13.2257 19.4401 13.2234C18.8937 13.22 18.8491 13.2519 17.4581 14.6383L16.2561 15.8361V10.9068C16.2561 6.00526 16.2557 5.97639 16.1747 5.75976C15.9984 5.28858 15.5441 4.99609 14.9948 5.00004C14.8097 5.00137 14.6422 5.0293 14.5065 5.08141Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
                <path
                  d="M5.3588 22.8531C5.47627 22.7356 5.62855 22.6321 5.75583 22.5832C5.9612 22.5043 6.01262 22.5038 14.995 22.5018L24.0276 22.4998L24.2454 22.5812C25.2609 22.9612 25.2609 24.5386 24.2454 24.9185L24.0276 25H15.0062H5.9848L5.76697 24.9185C4.95946 24.6164 4.73436 23.4775 5.3588 22.8531Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
                <path
                  d="M5 1H25V-1H5V1ZM29 5V25H31V5H29ZM25 29H5V31H25V29ZM1 25V5H-1V25H1ZM5 29C2.79086 29 1 27.2091 1 25H-1C-1 28.3137 1.68629 31 5 31V29ZM29 25C29 27.2091 27.2091 29 25 29V31C28.3137 31 31 28.3137 31 25H29ZM25 1C27.2091 1 29 2.79086 29 5H31C31 1.68629 28.3137 -1 25 -1V1ZM5 -1C1.68629 -1 -1 1.68629 -1 5H1C1 2.79086 2.79086 1 5 1V-1Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
              </svg>
            </div>
            <router-link :to="'/report/' + card.id" class="listreports-card__button">
              <svg
                width="30"
                height="30"
                viewBox="0 0 30 30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  x="0.5"
                  y="0.5"
                  width="29"
                  height="29"
                  rx="4.5"
                  stroke="#030087"
                  stroke-opacity="0.3"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.4101 5.04379C12.0218 5.16331 11.6647 5.46813 11.4979 5.82238C11.441 5.9432 11.3616 6.26942 11.2883 6.68366C11.2234 7.05039 11.1396 7.41821 11.1022 7.50101C10.9354 7.86934 10.5736 8.11072 10.1437 8.14057C9.90969 8.15681 9.85525 8.14313 9.20715 7.90535C8.534 7.6584 8.51118 7.65294 8.15589 7.65267C7.65014 7.6523 7.4191 7.74284 7.08552 8.07204C6.87145 8.28328 6.72401 8.50901 6.02097 9.70191C5.57214 10.4635 5.17362 11.1495 5.13539 11.2264C4.94521 11.6091 4.96046 12.1267 5.17381 12.5305C5.31261 12.7932 5.40604 12.8873 6.00671 13.3695C6.64556 13.8823 6.77634 14.0752 6.77634 14.5046C6.77634 14.9339 6.64556 15.1268 6.00671 15.6397C5.40677 16.1213 5.31257 16.216 5.17473 16.4768C5.02025 16.7691 4.96612 17.0926 5.02067 17.3972C5.07625 17.7076 5.06077 17.678 6.02097 19.3072C6.72401 20.5001 6.87145 20.7258 7.08552 20.9371C7.4191 21.2663 7.65014 21.3568 8.15589 21.3564C8.51118 21.3562 8.534 21.3507 9.20715 21.1038C9.85525 20.866 9.90969 20.8523 10.1437 20.8685C10.5736 20.8984 10.9354 21.1398 11.1022 21.5081C11.1396 21.5909 11.2234 21.9587 11.2883 22.3255C11.3627 22.7458 11.4408 23.0654 11.4996 23.1902C11.6214 23.449 11.9574 23.7726 12.236 23.8995L12.4565 24H14.5016H16.5468L16.7673 23.8995C17.0459 23.7726 17.3819 23.449 17.5037 23.1902C17.5625 23.0654 17.6406 22.7458 17.715 22.3255C17.7799 21.9587 17.8637 21.5909 17.9011 21.5081C18.0679 21.1398 18.4297 20.8984 18.8596 20.8685C19.0936 20.8523 19.148 20.866 19.7961 21.1038C20.4693 21.3507 20.4921 21.3562 20.8474 21.3564C21.3531 21.3568 21.5842 21.2663 21.9178 20.9371C22.1316 20.726 22.2795 20.4998 22.9798 19.3123C23.4272 18.5536 23.8257 17.8676 23.8653 17.7879C24.055 17.4062 24.0408 16.8786 23.8302 16.4799C23.6906 16.2159 23.5977 16.1222 22.9966 15.6397C22.3577 15.1268 22.2269 14.9339 22.2269 14.5046C22.2269 14.0926 22.3656 13.874 22.8926 13.455C23.7142 12.8017 23.9008 12.5646 23.9819 12.0712C24.0285 11.7875 23.9835 11.459 23.8653 11.2213C23.8257 11.1415 23.4272 10.4555 22.9798 9.69678C22.2795 8.50935 22.1316 8.28309 21.9178 8.072C21.5842 7.74284 21.3531 7.6523 20.8474 7.65267C20.4921 7.65294 20.4693 7.6584 19.7961 7.90535C19.148 8.14313 19.0936 8.15681 18.8596 8.14057C18.4297 8.11072 18.0679 7.86934 17.9011 7.50101C17.8637 7.41821 17.78 7.04943 17.7153 6.6815C17.6255 6.17139 17.5701 5.95799 17.4819 5.78269C17.3449 5.51016 17.0614 5.24533 16.7571 5.10563L16.5468 5.00911L14.559 5.00164C12.9906 4.99577 12.5372 5.00469 12.4101 5.04379ZM16.1812 7.02527C16.2837 7.65576 16.3983 8.03996 16.5752 8.34668C17.0474 9.16518 17.9443 9.67322 18.9169 9.67322C19.3347 9.67322 19.6369 9.60405 20.3356 9.34855L20.8368 9.16526L21.6304 10.5005C22.2888 11.6082 22.4151 11.8435 22.3716 11.8814C22.3427 11.9066 22.1259 12.0819 21.8896 12.2709C21.3376 12.7126 21.1503 12.9223 20.9401 13.3339C20.7399 13.7259 20.6576 14.0669 20.6576 14.5046C20.6576 14.9422 20.7399 15.2832 20.9401 15.6752C21.1503 16.0868 21.3376 16.2965 21.8896 16.7382C22.1259 16.9272 22.3427 17.1025 22.3716 17.1277C22.4151 17.1657 22.2888 17.4009 21.6304 18.5087L20.8368 19.8439L20.3356 19.6606C19.6369 19.4051 19.3347 19.3359 18.9169 19.3359C17.7339 19.3359 16.715 20.0618 16.3605 21.1569C16.3109 21.3102 16.2302 21.6823 16.1812 21.9838L16.0921 22.532H14.5016H12.9112L12.8221 21.9838C12.7731 21.6823 12.6924 21.3102 12.6428 21.1569C12.2883 20.0618 11.2694 19.3359 10.0864 19.3359C9.66855 19.3359 9.36636 19.4051 8.66779 19.6605L8.16667 19.8437L7.37322 18.5084C6.71686 17.4037 6.5888 17.1651 6.63196 17.1275C6.66066 17.1024 6.87741 16.9272 7.11366 16.7382C7.6657 16.2965 7.85302 16.0868 8.06319 15.6752C8.26339 15.2832 8.34569 14.9422 8.34569 14.5046C8.34569 14.0669 8.26339 13.7259 8.06319 13.3339C7.85302 12.9223 7.6657 12.7126 7.11366 12.2709C6.87741 12.0819 6.66066 11.9067 6.63196 11.8817C6.5888 11.844 6.71678 11.6055 7.37288 10.5013L8.16602 9.16645L8.71436 9.36442C9.48273 9.64185 9.6924 9.68407 10.2011 9.66378C10.9441 9.63412 11.5391 9.36776 12.0551 8.83364C12.4895 8.38403 12.6695 7.95939 12.8218 7.02527L12.9112 6.4771H14.5016H16.0921L16.1812 7.02527ZM13.7371 10.8983C11.9525 11.2705 10.7171 12.7457 10.7171 14.5046C10.7171 16.299 12.0299 17.8214 13.842 18.1286C16.1696 18.5232 18.2862 16.7972 18.2862 14.5046C18.2862 12.7199 17.0009 11.2173 15.1885 10.883C14.7736 10.8065 14.1455 10.8131 13.7371 10.8983ZM15.0757 12.426C15.4639 12.5306 15.6938 12.6583 16.0033 12.9411C16.9132 13.7723 16.9596 15.0889 16.1099 15.9652C15.2506 16.8514 13.9026 16.896 12.9992 16.0681C12.045 15.1936 12.0453 13.8136 12.9998 12.9411C13.5724 12.4176 14.3388 12.2275 15.0757 12.426Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
              </svg>
            </router-link>
            <div class="listreports-card__button" @click="deleteReport(card.id, i)">
              <svg
                width="30"
                height="30"
                viewBox="0 0 30 30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  x="0.5"
                  y="0.5"
                  width="29"
                  height="29"
                  rx="4.5"
                  stroke="#030087"
                  stroke-opacity="0.3"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M8.37704 10.9672C8.17251 11.0542 8.00619 11.2122 7.92028 11.4011C7.86287 11.5273 7.85548 12.0895 7.85548 16.3314C7.85548 21.5166 7.85001 21.3821 8.08305 21.9495C8.41414 22.7557 9.20408 23.4852 10.07 23.7846C10.702 24.003 10.6343 24.0001 14.9905 24.0001C19.3466 24.0001 19.2789 24.003 19.9109 23.7846C20.7692 23.4879 21.5678 22.7545 21.8908 21.9662C22.133 21.3752 22.1255 21.556 22.1245 16.3281C22.1237 11.7365 22.1202 11.5201 22.0463 11.3736C21.7572 10.8 20.8631 10.7282 20.4716 11.247L20.3521 11.4053L20.3313 16.2369C20.3086 21.4919 20.3264 21.1057 20.0867 21.5372C19.8792 21.9108 19.3569 22.238 18.8453 22.3149C18.5185 22.3641 11.4624 22.3641 11.1356 22.3149C10.6164 22.2368 10.1046 21.9159 9.89358 21.536C9.65462 21.1059 9.67236 21.4906 9.64966 16.2369L9.62879 11.4053L9.50934 11.247C9.27271 10.9335 8.75645 10.8059 8.37704 10.9672ZM12.7999 12.604C12.6144 12.6968 12.4885 12.8125 12.3995 12.9719C12.3234 13.1082 12.3201 13.2423 12.3201 16.2135V19.3129L12.4172 19.4818C12.4705 19.5747 12.5942 19.7025 12.692 19.7657C12.8547 19.871 12.8987 19.8806 13.2139 19.8806C13.5247 19.8806 13.5748 19.87 13.7305 19.7709C13.8382 19.7024 13.9425 19.5881 14.0085 19.4664L14.1142 19.2716V16.2211V13.1705L14.0085 12.9757C13.9425 12.854 13.8382 12.7398 13.7305 12.6712C13.5833 12.5775 13.5118 12.56 13.2416 12.5514C13.0109 12.5441 12.8911 12.5583 12.7999 12.604ZM16.3883 12.5963C16.205 12.6709 16.0407 12.8263 15.9491 13.0116C15.8717 13.1682 15.8685 13.2937 15.8676 16.2231L15.8667 19.2716L15.9724 19.4664C16.1286 19.7543 16.3418 19.8762 16.7178 19.8927C17.097 19.9092 17.3266 19.8086 17.5253 19.5388L17.6609 19.3547V16.234C17.6609 12.8461 17.6718 13.0155 17.4369 12.7781C17.2185 12.5573 16.7034 12.468 16.3883 12.5963Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
                <path
                  d="M11.5164 6.42282C11.6118 6.25873 11.803 6.10001 11.9874 6.03172C12.0532 6.00739 13.158 5.99628 15.0389 6.00111L17.9874 6.00866L18.1683 6.1253C18.2678 6.18949 18.3962 6.31882 18.4535 6.4127C18.5556 6.57978 18.5581 6.60342 18.5709 7.51272L18.5841 8.44199H20.4508H22.3176L22.5297 8.53905C22.8499 8.68563 22.977 8.878 22.995 9.24342C23.0086 9.51978 23.0025 9.54347 22.8698 9.72353C22.783 9.84148 22.661 9.94629 22.5465 10.0014L22.3625 10.0898H14.9903H7.61816L7.43423 10.0006C7.33309 9.95158 7.19402 9.838 7.12518 9.74821C7.01056 9.59876 7 9.5583 7 9.26886C7 8.98342 7.0116 8.93739 7.11946 8.79446C7.1941 8.69552 7.31849 8.59972 7.45101 8.53905L7.66314 8.44199H9.52987H11.3966L11.4098 7.51272C11.4221 6.63588 11.4281 6.57438 11.5164 6.42282Z"
                  fill="#030087"
                  fill-opacity="0.3"
                />
              </svg>
            </div>
          </div>
        </div>
        <router-link to="/newreport"
          class="listreports-card listreports-card--lost"
          :class="litstyle === true ? 'points' : 'list'"
        >
          <svg
            width="50"
            height="50"
            viewBox="0 0 50 50"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle cx="25" cy="25" r="24" stroke="#030087" stroke-width="2" />
            <line
              x1="25"
              y1="15"
              x2="25"
              y2="35"
              stroke="#030087"
              stroke-width="2"
              stroke-linecap="round"
            />
            <line
              x1="15"
              y1="25"
              x2="35"
              y2="25"
              stroke="#030087"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
        </router-link>
      </div>
    </div>
  </section>
</template>
<script>
import MenuReports from "../components/MenuReports.vue";
export default {
  name: "ListReports",
  components: {
    MenuReports,
},
  data: () => ({
    litstyle: true,
    globalBrandSurname2: null,
    activeBrandSurname2: false,
    user: document.querySelector('meta[name="user"]').getAttribute('value'),
    // поиск
    fioq: "",
    listcards: [],
    brandsSurname2: [
      {
        name: "По названию",
      },
      {
        name: "По дате добавления",
      },
    ],
  }),
  beforeMount() {
    axios.get('/api/getUserReports/' + this.user).then(result => {
      this.listcards = result.data;
    })
    document.querySelector('title').textContent = 'Список отчётов'
  },
  // поиск
  computed: {
    restabels_q() {
      let arr = this.listcards;
      let newArray = [];
      const serach = this.fioq.toLowerCase();
      for (let i in arr) {
        let el = arr[i];
        if (
          el.created_at.toLowerCase().indexOf(serach) != -1 ||
          el.title.toLowerCase().indexOf(serach) != -1
        )
          newArray.push(el);
      }
      return newArray;
    },
  },
  methods: {
    downloadReport(id) {
      axios.get("/api/getPdf/" + id).then((res) => {
        let dom = new DOMParser()
          .parseFromString(res.data, "text/xml")
          .querySelector("html");
        let html = document.createElement("html");
        html.innerHTML = dom.innerHTML;
        html.style.width = "1920px";

        html2pdf().from(html).set({
          filename: 'mypdf.pdf',
          html2canvas: {
            width: 1920,
            enableLinks: true,
            height: html.querySelectorAll('section').length * 2480
          },
          jsPDF: {orientation: 'portrait', unit: 'in', format: 'letter', compressPDF: true}
        }).save();
      });
    },
    deleteReport(id, index) {
      axios.post('/api/deleteReport/' + id).then(result => {
        delete this.listcards[index]
      })
    },
    points() {
      this.litstyle = true;
    },
    line() {
      this.litstyle = false;
    },
    selectOpenBrandSurname2() {
      this.activeBrandSurname2 = !this.activeBrandSurname2;
    },
    chooseBrandSurname2(item, i) {
      this.globalBrandSurname2 = item.name;
      if (i == 0){
        this.sortByKey(this.listcards, "name")
      };
      if (i == 1){
        this.sortByKey(this.listcards, "data")
      };
    },

    sortByKey(array,key){
      return array.sort(function(a,b){
          let x = a[key];
          let y = b[key];
          return((x<y)?-1:((x>y)?1:0));
      })
    },
    generateReport () {
      this.$refs.html2Pdf.generatePdf()
    }
  },
};
</script>
<style lang="scss" scoped>
.select {
  width: 100%;
  height: 45px;
  border-radius: 5px;
  z-index: 2;
  position: relative;

  &__wrap {
    position: absolute;
    width: 100%;
    height: auto;
    max-height: 45px;
    border-radius: 5px;
    top: 0;
    left: 0;

    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    color: #222222;

    overflow: hidden;
    transition: ease-in-out 0.25s;
    cursor: pointer;

    &.open {
      max-height: 1000px;
      & .top svg {
        transform: rotate(-180deg);
      }
    }

    & .top {
      padding: 5px 5px;
      height: 45px;
      display: flex;
      align-items: center;
      justify-content: space-between;

      & svg {
        width: 8px;
        height: 5px;
        transition: ease-in-out 0.25s;
      }
    }

    & .bottom {
      background-color: #f3f6fd;
    }

    & .select__item {
      border-top: 1px solid #6682a291;
      padding: 5px;
      cursor: pointer;
      transition: ease-in-out 0.25s;

      &:hover {
        color: #030087;
      }
    }
  }
}

.listreports {
  background-color: #f3f6fd;
  &__search {
    position: relative;
    max-width: 768px;
    width: 100%;
    height: 35px;
    margin-right: 15%;
    & svg {
      position: absolute;
      left: 15px;
      top: 0;
      bottom: 0;
      margin-bottom: auto;
      margin-top: auto;
      height: 13px;
    }
    & input {
      width: 100%;
      height: 100%;
      background: #ffffff;
      border: 1px solid rgba(3, 0, 135, 0.3);
      border-radius: 5px;
      padding: 10px 10px 10px 40px;
      &::placeholder {
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;

        color: #666666;
      }
    }
  }
  &__select {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    max-width: 265px;
    margin-right: 15px;
    & p {
      font-weight: 700;
      font-size: 14px;
      line-height: 18px;

      color: #666666;
    }
  }
  &-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;

    &__button {
      width: 21px;
      height: 21px;
      cursor: pointer;
      transition: ease-in-out 0.25s;
      &.active {
        & svg {
          & rect {
            fill: #030087;
          }
          & .svg-btn {
            fill: rgba(255, 0, 0, 0);
            stroke: #030087;
          }
        }
      }
      & svg {
        transition: ease-in-out 0.25s;
        & rect {
          transition: ease-in-out 0.25s;
        }
      }
      &:hover {
        & svg {
          transform: scale(1.1);
          // & rect {
          //   fill: #030087;
          // }
          // & .svg-btn {
          //   fill: rgba(255, 0, 0, 0);
          //   stroke: #030087;
          // }
        }
      }
      &:last-child {
        margin-left: 10px;
      }
    }
  }
  &-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    margin-bottom: 30px;
  }
  &-cards {
    width: calc(100% + 30px);
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin: 0 -30px;
  }
  &-card {
    margin: 0 0 30px 30px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid rgba(3, 0, 135, 0.3);
    border-radius: 5px;

    display: flex;
    justify-content: space-between;
    &.points {
      width: calc(25% - 30px);
    }
    &.list {
      width: calc(100% - 30px);
    }
    &__textblock {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    &__data {
      font-weight: 700;
      font-size: 14px;
      line-height: 18px;

      color: #666666;
    }
    &__name {
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #222222;
    }
    &__button {
      cursor: pointer;
      transition: ease-in-out 0.25s;
      &:hover {
        opacity: 0.7;
      }
    }
    &--lost {
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      & svg {
        transition: ease-in-out 0.25s;
      }
      &:hover {
        & svg {
          transform: scale(1.1);
        }
      }
    }
  }
}

.select {
  width: 100%;
  height: 45px;
  border-radius: 5px;
  z-index: 2;
  position: relative;

  &__wrap {
    position: absolute;
    width: 100%;
    height: auto;
    max-height: 45px;
    border-radius: 5px;
    top: 0;
    left: 0;

    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    color: #222222;

    overflow: hidden;
    transition: ease-in-out 0.25s;
    cursor: pointer;

    &.open {
      max-height: 1000px;
      & .top svg {
        transform: rotate(-180deg);
      }
    }

    & .top {
      padding: 5px 5px;
      height: 45px;
      display: flex;
      align-items: center;
      justify-content: space-between;

      & svg {
        width: 8px;
        height: 5px;
        transition: ease-in-out 0.25s;
      }
    }

    & .bottom {
      background-color: #f3f6fd;
    }

    & .select__item {
      border-top: 1px solid #6682a291;
      padding: 5px;
      cursor: pointer;
      transition: ease-in-out 0.25s;

      &:hover {
        color: #030087;
      }
    }
  }
}

.listreports {
  background-color: #f3f6fd;
  &__search {
    position: relative;
    max-width: 768px;
    width: 100%;
    height: 35px;
    margin-right: 15%;
    & svg {
      position: absolute;
      left: 15px;
      top: 0;
      bottom: 0;
      margin-bottom: auto;
      margin-top: auto;
      height: 13px;
    }
    & input {
      width: 100%;
      height: 100%;
      background: #ffffff;
      border: 1px solid rgba(3, 0, 135, 0.3);
      border-radius: 5px;
      padding: 10px 10px 10px 40px;
      &::placeholder {
        font-weight: 700;
        font-size: 14px;
        line-height: 18px;

        color: #666666;
      }
    }
  }
  &__select {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    max-width: 265px;
    margin-right: 15px;
    & p {
      font-weight: 700;
      font-size: 14px;
      line-height: 18px;

      color: #666666;
    }
  }
  &-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;

    &__button {
      width: 21px;
      height: 21px;
      cursor: pointer;
      transition: ease-in-out 0.25s;
      &.active {
        & svg {
          & rect {
            fill: #030087;
          }
          & .svg-btn {
            fill: rgba(255, 0, 0, 0);
            stroke: #030087;
          }
        }
      }
      & svg {
        transition: ease-in-out 0.25s;
        & rect {
          transition: ease-in-out 0.25s;
        }
      }
      &:hover {
        & svg {
          transform: scale(1.1);
          // & rect {
          //   fill: #030087;
          // }
          // & .svg-btn {
          //   fill: rgba(255, 0, 0, 0);
          //   stroke: #030087;
          // }
        }
      }
      &:last-child {
        margin-left: 10px;
      }
    }
  }
  &-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    margin-bottom: 30px;
  }
  &-cards {
    width: calc(100% + 30px);
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin: 0 -30px;
  }
  &-card {
    margin: 0 0 30px 30px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid rgba(3, 0, 135, 0.3);
    border-radius: 5px;

    display: flex;
    justify-content: space-between;
    &.points {
      width: calc(25% - 30px);
    }
    &.list {
      width: calc(100% - 30px);
    }
    &__textblock {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      margin-right: 10px;
    }
    &__data {
      font-weight: 700;
      font-size: 14px;
      line-height: 18px;

      color: #666666;
    }
    &__name {
      font-weight: 700;
      font-size: 16px;
      line-height: 20px;
      color: #222222;
      word-break: break-all;
    }
    &__button {
      cursor: pointer;
      transition: ease-in-out 0.25s;
      &:hover {
        opacity: 0.7;
      }
    }
    &--lost {
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      & svg {
        transition: ease-in-out 0.25s;
      }
      &:hover {
        & svg {
          transform: scale(1.1);
        }
      }
    }
  }
}

@media(max-width: 830px) {
  .listreports {
    padding: 100px 20px 20px 20px;
  }

  .listreports-buttons {
    display: none;
  }

  .listreports-card.points {
    width: 100%;
  }
}

@media(max-width: 670px) {
  .listreports-nav {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
  }

  .listreports__search {
    margin-right: 0;
  }
}

@media(max-width: 380px) {
  .listreports h2 {
    font-size: 34px;
    margin-bottom: 20px;
  }
}
</style>
