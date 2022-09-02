/*===============================================
  Cookie Consent
===============================================*/
const cookieStorage = {
  getItem: (key) => {
    const cookies = document.cookie
      .split(';')
      .map(cookie => cookie.split('='))
      .reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {});
    return cookies[key];
  },
  setItem: (key, value) => {
    document.cookie = `${key}=${value}`;
  },
};
const storageType = cookieStorage;
const consentName = 'cookie_consent';
const ShowConsent = () => !storageType.getItem(consentName);

window.onload = () => {
  const consentPopup = document.getElementById('cookie-consent');
  const acceptBtn = document.getElementById('accept-consent');

  const acceptFn = event => {
    date = new Date();
    date.setTime(date.getTime()+(1000*60*60*24*30)); /* 30 days */
    expires = date.toGMTString();

    document.cookie = consentName+"=accepted; expires="+expires+"; path=/";

    consentPopup.classList.add('consent-hidden');
    
    event.preventDefault();
  }

  acceptBtn.addEventListener('click', acceptFn);

  if (ShowConsent(storageType)) {
    setTimeout(() => {
      consentPopup.classList.remove('consent-hidden');
    }, 2000); /* 2 seconds */
  }
};