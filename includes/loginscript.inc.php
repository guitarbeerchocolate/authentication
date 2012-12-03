<script>
(function()
{
  $('input:text:visible:first').focus();  

  $('form#login').submit(function()
  {
    thisForm = $(this);
    thisUsername = thisForm.find('#username');
    thisPassword = thisForm.find('#password');
    thisForm.hide();
    $('img').show();  
    $.post('posthandler.class.php',
    {
      method:'login',
      username:thisUsername.val(),
      password:thisPassword.val()
    }, function(data)
    {
      $('img').hide(),
      thisForm.show(),       
      window.location.replace(data)
    });
    return false;
  });
})();
</script>