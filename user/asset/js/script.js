"use strict";
const DOM = {
   timeline: "timeline",
   timelineStepper: "timeline__stepper",
   timelineStep: "timeline__step",
   timelineStepTitle: "timeline__step-title",
   timelineStepActive: "is-active",
   timelineStepActiveMarker: "timeline__step-active-marker",
   timelineSlidesContainer: "timeline__slides",
   timelineSlide: "timeline__slide",
   timelineSlideActive: "is-active",
};
const STEP_ACTIVE_MARKEP_CUSTOM_PROPS = {
   width: "--slide-width",
   posX: "--slide-pos-x",
   posY: "--slide-pos-y",
};
const SLIDES_CONTAINER_CUSTOM_PROPS = {
   height: "--slides-container-height",
};
const timeline = document.querySelector(`.${DOM.timeline}`);
const timelineStepper = timeline === null || timeline === void 0 ? void 0 : timeline.querySelector(`.${DOM.timelineStepper}`);
const timelineStepTitle = timeline === null || timeline === void 0 ? void 0 : timeline.querySelector(`.${DOM.timelineStepTitle}`);
const timelineSlidesContainer = timeline === null || timeline === void 0 ? void 0 : timeline.querySelector(`.${DOM.timelineSlidesContainer}`);
const timelineSlides = timeline && Array.from(timeline.querySelectorAll(`.${DOM.timelineSlide}`));
window.addEventListener("load", () => {
   createStepActiveMarker();
   activateCurrentSlide();
});
window.addEventListener("resize", () => {
   recalcStepActiveMarkerProps();
});
timeline === null || timeline === void 0 ? void 0 : timeline.addEventListener("click", (event) => {
   const { target } = event;
   if (!target ||
      !(target instanceof Element) ||
      !target.closest(`.${DOM.timelineStep}`)) {
      return;
   }
   const currentStep = target.closest(`.${DOM.timelineStep}`);
   if (!currentStep) {
      return;
   }
   deactivateSteps();
   activateCurrentStep(currentStep);
   recalcStepActiveMarkerProps();
   deactivateSlides();
   activateCurrentSlide();
});
function deactivateSteps() {
   const steps = document.querySelectorAll(`.${DOM.timelineStep}`);
   steps === null || steps === void 0 ? void 0 : steps.forEach((elem) => elem.classList.remove(`${DOM.timelineStepActive}`));
}
function activateCurrentStep(currentStep) {
   currentStep === null || currentStep === void 0 ? void 0 : currentStep.classList.add(`${DOM.timelineStepActive}`);
}
function deactivateSlides() {
   timelineSlides === null || timelineSlides === void 0 ? void 0 : timelineSlides.forEach((elem) => elem.classList.remove(`${DOM.timelineSlideActive}`));
}
function activateCurrentSlide() {
   const currentSlide = getCurrentSlide();
   if (!currentSlide) {
      return;
   }
   const currentSlideHeight = getCurrentSlideHeight(currentSlide);
   setSlideContainerHeight(currentSlideHeight);
   currentSlide.classList.add(`${DOM.timelineSlideActive}`);
}
function createStepActiveMarker() {
   const stepActiveMarker = document.createElement("div");
   stepActiveMarker.classList.add(`${DOM.timelineStepActiveMarker}`);
   timelineStepper === null || timelineStepper === void 0 ? void 0 : timelineStepper.appendChild(stepActiveMarker);
   const positionProps = getStepActiveMarkerProps();
   if (!positionProps) {
      return;
   }
   setStepActiveMarkerProps(Object.assign({ stepActiveMarker }, positionProps));
}
function recalcStepActiveMarkerProps() {
   const stepActiveMarker = timeline === null || timeline === void 0 ? void 0 : timeline.querySelector(`.${DOM.timelineStepActiveMarker}`);
   const stepActiveMarkerProps = getStepActiveMarkerProps();
   if (!stepActiveMarkerProps) {
      return;
   }
   setStepActiveMarkerProps(Object.assign({ stepActiveMarker }, stepActiveMarkerProps));
}
function setStepActiveMarkerProps({ stepActiveMarker, posX, posY, width, }) {
   stepActiveMarker.style.setProperty(`${STEP_ACTIVE_MARKEP_CUSTOM_PROPS.width}`, `${width}px`);
   stepActiveMarker.style.setProperty(`${STEP_ACTIVE_MARKEP_CUSTOM_PROPS.posX}`, `${posX}px`);
   if (typeof posY === "number") {
      stepActiveMarker.style.setProperty(`${STEP_ACTIVE_MARKEP_CUSTOM_PROPS.posY}`, `${posY}px`);
   }
}
function getStepActiveMarkerProps() {
   const { currentStep } = getCurrentStep();
   if (!currentStep) {
      return null;
   }
   const width = getElementWidth(currentStep);
   const posX = getStepActiveMarkerPosX(currentStep);
   const posY = getStepActiveMarkerPosY();
   if (typeof posX !== "number" || typeof posY !== "number") {
      return null;
   }
   return { posX, posY, width };
}
function getCurrentStep() {
   const timelineSteps = Array.from(document.querySelectorAll(`.${DOM.timelineStep}`));
   const currentStep = timelineSteps.find((element) => element.classList.contains(`${DOM.timelineStepActive}`));
   const currentStepIndex = currentStep &&
      timelineSteps.findIndex((element) => element.classList.contains(`${DOM.timelineStepActive}`));
   return { currentStep, currentStepIndex };
}
function getCurrentSlide() {
   const { currentStepIndex } = getCurrentStep();
   if (typeof currentStepIndex !== "number" || !timelineSlides) {
      return null;
   }
   return timelineSlides[currentStepIndex];
}
function setSlideContainerHeight(height) {
   timelineSlidesContainer === null || timelineSlidesContainer === void 0 ? void 0 : timelineSlidesContainer.style.setProperty(`${SLIDES_CONTAINER_CUSTOM_PROPS.height}`, `${height}px`);
}
function getCurrentSlideHeight(currentSlide) {
   return currentSlide.clientHeight;
}
function getStepActiveMarkerPosY() {
   const timelineTitlePosY = timelineStepTitle === null || timelineStepTitle === void 0 ? void 0 : timelineStepTitle.getBoundingClientRect().top;
   const timelineStepperPosY = timelineStepper === null || timelineStepper === void 0 ? void 0 : timelineStepper.getBoundingClientRect().top;
   if (!timelineTitlePosY || !timelineStepperPosY) {
      return null;
   }
   return timelineTitlePosY - timelineStepperPosY;
}
function getStepActiveMarkerPosX(currentStep) {
   const timelineStepperPosX = timelineStepper === null || timelineStepper === void 0 ? void 0 : timelineStepper.getBoundingClientRect().left;
   const currentStepPosX = currentStep.getBoundingClientRect().left;
   if (!timelineStepperPosX) {
      return null;
   }
   return currentStepPosX - timelineStepperPosX;
}
function getElementWidth(elem) {
   return elem.clientWidth;
}


$(function () {
   $('.add').on('click', function () {
      let username = $(this).data('val');
      let prodId = $(this).data('id');
      $.ajax({
         url: '../controller/CountController.php',
         method: 'post',
         dataType: 'json',
         data: {
            username,
            prodId,
            action: 'add',
         },
         success: function (data) {
            console.log(data);
         }
      })
   })
   $('.minus').on('click', function () {
      let username = $(this).data('val');
      let prodId = $(this).data('id');
      $.ajax({
         url: '../controller/CountController.php',
         method: 'post',
         dataType: 'json',
         data: {
            username,
            prodId,
            action: 'minus',
         },
         success: function (data) {
            location.reload();
         }
      })
   })
   $('.plus').on('click', function () {
      let username = $(this).data('val');
      let prodId = $(this).data('id');
      $.ajax({
         url: '../controller/CountController.php',
         method: 'post',
         dataType: 'json',
         data: {
            username,
            prodId,
            action: 'plus',
         },
         success: function (data) {
            location.reload();
         }
      })
   })
   $('.count').on('change', function () {
      let username = $(this).data('val');
      let prodId = $(this).data('id');
      let value = $(this).val();
      if (value <= 0) {
         value = 1
      }
      $.ajax({
         url: '../controller/CountController.php',
         method: 'post',
         dataType: 'json',
         data: {
            username,
            prodId,
            value,
            action: 'count',
         },
         success: function (data) {
            location.reload();
         }
      })
   })
   $('.create-order').on('click', function () {
      let ids = $('input[type="checkbox"]:checked').map(function () {
         return this.id;
      }).get();
      let values = $('input[type="checkbox"]:checked').map(function () {
         return this.value;
      }).get();
      let username = $(this).data('val');
      $.ajax({
         url: '../controller/OrderController.php',
         method: "POST",
         data: {
            ids,
            values,
            username,
            action: 'create-order',
         },
         success: function (data) {
            location.href = 'order.php';
         }
      })
   })
   $('.remove').on('click', function () {
      let id = $(this).data("id");
      $.ajax({
         url: '../controller/OrderController.php',
         method: 'post',
         data: {
            id,
            action: 'remove',
         },
         success: function () {
            location.reload();
         }
      })
   })
   $('.send_order').on('click', function () {
      let username = $(this).data('val');
      $.ajax({
         url: '../controller/OrderController.php',
         method: 'post',
         data: {
            username,
            action: 'send_order',
         },
         success: function (data) {
            location.reload();
         }
      })
   })
})


