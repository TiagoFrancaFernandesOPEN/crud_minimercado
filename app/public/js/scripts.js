var key = 'p', value = 'start', here = window.location.href;
function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, '$1' + key + "=" + value + '$2');
  } else {
    return uri + separator + key + "=" + value;
  }
}
var goToStart = updateQueryStringParameter(here, key, value);
jQuery(document).ready(function () {
  jQuery('.go.btnGoToStart').on('click', function () {
    window.location.href = goToStart;
  });
});