    // Get the current page URL
    var currentUrl = window.location.href;
    // Iterate through each menu item and check if the href matches the current URL
    document.querySelectorAll('.menu-item').forEach(function(item) {
      var link = item.querySelector('a');
      if (link && link.href === currentUrl) {
        item.classList.add('active');
      }
    });