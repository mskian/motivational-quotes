function toggleVisibility(element, visibility) {
  if (visibility === 'show') {
    element.classList.remove('hidden');
  } else {
    element.classList.add('hidden');
  }
}

function handleError(errorState, retryButton) {
  toggleVisibility(errorState, 'show');
  toggleVisibility(retryButton, 'show');
}

fetch('quotes.json')
  .then(response => response.json())
  .then(data => {
    const quotes = data.motivational_quotes;
    let currentQuoteIndex = 0;

    const quoteTextElement = document.getElementById('quote-text');
    const quoteNumberElement = document.getElementById('quote-number');
    const loadingState = document.getElementById('loading-state');
    const errorState = document.getElementById('error-state');
    const retryButton = document.getElementById('retry-button');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const paginationButtons = document.getElementById('pagination-buttons');
    const Copy_Quotes = document.getElementById('copyquotes');

    function showQuote(index) {

      toggleVisibility(loadingState, 'show');
      toggleVisibility(quoteTextElement, 'hide');
      toggleVisibility(quoteNumberElement, 'hide');
      toggleVisibility(Copy_Quotes, 'hide');

      setTimeout(() => {
        const quote = quotes[index];
        quoteTextElement.textContent = `${quote.quote}`;
        quoteNumberElement.textContent = `${index + 1}/${quotes.length}`;
        toggleVisibility(loadingState, 'hide');
        toggleVisibility(quoteTextElement, 'show');
        toggleVisibility(quoteNumberElement, 'show');
        toggleVisibility(paginationButtons, 'show');
        toggleVisibility(Copy_Quotes, 'show');
        toggleVisibility(retryButton, 'hide');
      }, 800);
    }

    function nextQuote() {
      currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
      showQuote(currentQuoteIndex);
    }

    function prevQuote() {
      currentQuoteIndex = (currentQuoteIndex - 1 + quotes.length) % quotes.length;
      showQuote(currentQuoteIndex);
    }

    retryButton.addEventListener('click', () => {
      toggleVisibility(errorState, 'hide');
      toggleVisibility(retryButton, 'hide');
      showQuote(currentQuoteIndex);
    });

    showQuote(currentQuoteIndex);

    prevButton.addEventListener('click', prevQuote);
    nextButton.addEventListener('click', nextQuote);
  })
  .catch(() => handleError(document.getElementById('error-state'), document.getElementById('retry-button')));
 
  document.getElementById('copy-button').addEventListener('click', function() {
    const quoteText = document.getElementById('quote-text').textContent;
  
    navigator.clipboard.writeText(quoteText).then(() => {
      showAlert("📋✅ Copied");
    }).catch(err => {
      console.error('Failed to copy text: ', err);
      showAlert("❌ Failed to copy.");
    });
  });
  
  function showAlert(message) {
    const alertBox = document.createElement('div');
    alertBox.classList.add('notification', 'custom-notification');
    alertBox.textContent = message;
    document.body.appendChild(alertBox);
    setTimeout(() => {
      alertBox.classList.add('fade-out');
      setTimeout(() => alertBox.remove(), 500);
    }, 3000);
  }
