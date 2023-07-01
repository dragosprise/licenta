function changeLanguage() {
    var langSelector = document.getElementById('langSelector');
    var selectedLang = langSelector.value;
    
    // Redirect to the language route or URL
    
    window.location.href = '/language/' + selectedLang;
  }