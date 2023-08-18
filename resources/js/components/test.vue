<template>
    <div>
      <select v-model="selectedOption" @change="handleOptionChange">
        <option value="" disabled selected>Выберите опцию</option>
        <option value="option1">Опция 1</option>
        <option value="option2">Опция 2</option>
        <option value="option3">Опция 3</option>
      </select>
  
      <div v-if="isPopupOpen" class="popup-form">
        <!-- Ваша всплывающая форма здесь -->
        <button @click="closePopupForm">Закрыть</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        selectedOption: "",
        isPopupOpen: false,
      };
    },
    methods: {
      handleOptionChange() {
        if (this.selectedOption === "option1") {
          this.isPopupOpen = true;
        } else {
          this.isPopupOpen = false;
        }
      },
      closePopupForm() {
        this.isPopupOpen = false;
      },
    },
  };
  </script>
  
  <style>
  .popup-form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
  }
  </style>