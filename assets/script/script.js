const allCheckbox = document.querySelectorAll(".myCheckbox");

  allCheckbox.forEach((element) => {
    element.addEventListener("change", function () {
      let onlyCheckedItems = document.querySelectorAll(
        ".myCheckbox:checked"
      );
      //   Nous avons définit le nombre max de checkbox à 3
      if (onlyCheckedItems.length > 3) {
        this.checked = false;
      }
    });
  });





  