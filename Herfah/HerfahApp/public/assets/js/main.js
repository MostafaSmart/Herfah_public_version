

// احضر العنصر المستهدف والرابط
let targetElement = document.querySelector(".pr-header .main-nav > #other .mega-menu");
let myLink = document.getElementById("other");

// أضف حدث النقر على الرابط
myLink.addEventListener("click", function() {
  // تحقق من حالة العنصر المستهدف
  if (targetElement.style.opacity === "1") {
    // إذا كان العنصر مرئيًا، قم بإخفائه
    targetElement.style.opacity = 0;
    targetElement.style.zIndex = -1;
    targetElement.style.top = "-9999px";
    targetElement.style.transition="opacity 0.8s ease, top 1.2s ease, z-index 0.8s ease";
  } else {
    // إذا كان العنصر مخفيًا، قم بإظهاره
    targetElement.style.opacity = 1;
    targetElement.style.zIndex = 100;
    targetElement.style.top = "calc(100% + 1px)";
    targetElement.style.transition="opacity 0.8s ease, top 0.5s ease, z-index 0.8s ease";
  }
});
// احضر العنصر المستهدف والرابط
let targeticon = document.querySelector(".pr-header .info");
let myList = document.querySelector(".pr-header .user");

// أضف حدث النقر على الرابط
myList.addEventListener("click", function() {
  // تحقق من حالة العنصر المستهدف
  if (targeticon.style.display === "block") {
    // إذا كان العنصر مرئيًا، قم بإخفائه
    targeticon.style.display="none";

    targeticon.style.transition="opacity 0.8s ease, top 1.2s ease, z-index 0.8s ease";
  } else {
    // إذا كان العنصر مخفيًا، قم بإظهاره
    targeticon.style.display="block";
    targeticon.style.zIndex=200;
    targeticon.style.transition="opacity 0.8s ease, top 0.5s ease, z-index 0.8s ease";
  }
});
