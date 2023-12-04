document.addEventListener('DOMContentLoaded', function () {
  let dropdownBtns = document.querySelectorAll('.dropdown-btn');

  dropdownBtns.forEach(function (dropdownBtn) {
    dropdownBtn.addEventListener('click', function (event) {
      event.preventDefault();
      let dropdownContent = this.nextElementSibling;
      this.parentElement.classList.toggle('active');
      if (this.parentElement.classList.contains('active')) {
        dropdownContent.style.maxHeight = dropdownContent.scrollHeight + 'px';
      } else {
        dropdownContent.style.maxHeight = '0';
      }
    });
  });

  document.querySelector('.toggle-menu').addEventListener('click', function () {
    document.querySelector('.menu').classList.toggle('active');
  });
});
