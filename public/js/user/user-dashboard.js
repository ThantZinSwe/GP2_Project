$(function () {
    $('.dashboard-aside li:first-child').addClass('active');
      $('.dashboard-content .dashboard-blk').hide();
  $('.dashboard-content .dashboard-blk:first').show();
  
    $('.dashboard-aside li').click(function () {
      $('.dashboard-aside li').removeClass('active');
      $(this).addClass('active');
      $('.dashboard-content .dashboard-blk').hide();
      let activeTab = $(this).find('a').attr('href');
      $(activeTab).fadeIn(500);
      return false;
    });
  });
  