 /* Particleground demo */
document.addEventListener('DOMContentLoaded', function () {
  particleground(document.getElementById('particles'), {
    dotColor: '#8df',
    lineColor: '#111',
    lineWidth: 0.6,
    curvedLines: false,
    parallaxMultiplier: 100
  });
  var intro = document.getElementById('intro');
  intro.style.marginTop = - intro.offsetHeight / 1.4 + 'px';
}, false);



$(document).ready(function(){
  function moveMarker() {
    var activeNav = $('.active');
    var activewidth = $(activeNav).width();
    var activePadLeft = parseFloat($(activeNav).css('padding-left'));
    var activePadRight = parseFloat($(activeNav).css('padding-right'));
    var totalWidth = activewidth + activePadLeft + activePadRight;

    var precedingAnchorWidth = anchorWidthCounter();

    // TODO:
    // Find the total widths of all of the anchors
    // to the left of the active anchor.

    var activeMarker = $('.active-marker');
    $(activeMarker).css('display','block');

    $(activeMarker).css('width', totalWidth);

    $(activeMarker).css('left', precedingAnchorWidth);

    // TODO:
    // Using the calculated total widths of preceding anchors,
    // Set the left: css value to that number.
  }
  moveMarker();

  function anchorWidthCounter() {
    var anchorWidths = 0;
    var a;
    var aWidth;
    var aPadLeft;
    var aPadRight;
    var aTotalWidth;
    $('.sidenav a').each(function(index, elem) {
      var activeTest = $(elem).hasClass('active');
      if(activeTest) {
        // Break out of the each function.
        return false;
      }

      a = $(elem).find('a');
      aWidth = a.width();
      aPadLeft = parseFloat(a.css('padding-left'));
      aPadRight = parseFloat(a.css('padding-right'));
      aTotalWidth = aWidth + aPadLeft + aPadRight;

      anchorWidths = anchorWidths + aTotalWidth;
    });

    return anchorWidths;
  }

  $('.sidenava').click(function(e) {
    e.preventDefault();
    $('.sidenav a').removeClass('active');
    $(this).parents('a').addClass('active');
    moveMarker();
  });
});
