export default () => {
  const summary = document.querySelector('.nhsuk-error-summary')
  const summaryLinks = document.querySelectorAll('.nhsuk-error-summary__list a');
  
  if (summary) {
    summary.focus();
    summaryLinks.forEach((summaryLink) => {
      summaryLink.addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector(e.target.hash).focus();
      });
    });
  };
}
